<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function viewMyPage()
    {
        return view('mypage.mypage');
    }

    public function viewBankDetails(Request $request)
    {
        $bankAccount = BankAccount::where('user_id', Auth::id())->first();
        if ($request->isMethod('get')) {
            $data = compact('bankAccount');
            return view('mypage.bank.bankDetails')->with($data);
        } else {
            $bankAccount = BankAccount::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'bank_name' => $request['bank_name'],
                    'account_type' => $request['account_type'],
                    'branch_code' => $request['branch_code'],
                    'account_number' => $request['account_number'],
                    // 'swift_code' => $request['swift_code'],
                    'account_name' => $request['account_name'],
                ]
            );

            return redirect()->route('view-bank-details');
        }
    }

    public function personalInfo(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $bankAccount = BankAccount::where('user_id', Auth::id())->first();
        if ($request->isMethod('get')) {
            $data = compact('bankAccount');
            return view('mypage.setting.personal_info')->with($data);
        } else {
            $user->first_name = $request['first_name'];
            $user->DOB = $request['dob'];
            $user->phone = $request['phone'];
            $user->save();

            return redirect()->route('view-personal-info');
        }
    }

    public function identityVerification(Request $request)
    {
        return view('mypage.setting.identityVerification');
    }

    public function identityVerificationDocument($id, Request $request)
    {
        if ($request->isMethod('get')) {
            return view('mypage.setting.identityVerificationDocument');
        } else {
            if($request['document-1-delete'] == true){
                $request->validate([
                    'image1' => 'required',
                ]);
            }
            if($request['document-2-delete'] == true){
                $request->validate([
                    'image2' => 'required',
                ]);
            }
            if($request['document-3-delete'] == true){
                $request->validate([
                    'image3' => 'required'
                ]);
            }
            $user = User::where('id', $id)->first();
            if (!empty($request->file('image1'))) {
                $image = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image1')->getClientOriginalExtension();
                $request->file('image1')->storeAs('uploads', $image, 'public');

                $user->document = $image;
            }
            if($request['document_type'] == "driving_license"){
                $request->validate([
                    'image2' => 'required',
                ]);
                if (!empty($request->file('image2'))) {
                    $image2 = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image2')->getClientOriginalExtension();
                    $request->file('image2')->storeAs('uploads', $image2, 'public');
    
                    $user->document_two = $image2;
                }
            } else {
                $user->document_two = null;
            }
            if (!empty($request->file('image3'))) {
                $image3 = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image3')->getClientOriginalExtension();
                $request->file('image3')->storeAs('uploads', $image3, 'public');

                $user->residence_certificate = $image3;
            }
            $user->document_type = $request['document_type'];
            $user->save();

            return redirect()->route('identity-verification-confirm');
        }
    }

    public function identityVerificationConfirm()
    {
        return view('mypage.setting.identitySubmit');
    }

    public function viewPasswordDetails(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('mypage.setting.passwordDetails');
        } else {
            $request->validate([
                'email' => 'required',
                'old_password' => 'required',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password',
            ]);

            $user = User::where('id', Auth::id())->first();
            if ($request['email'] == Auth::user()->email && Hash::check($request['old_password'], Auth::user()->password)) {
                $user->password = Hash::make($request['new_password']);
                $user->save();

                return redirect()->route('view-password-details')->with('successMsg', 'Your password has been changed.');
            } else {
                return view('mypage.setting.passwordDetails');
            }
        }
    }

    public function updateMyPage(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        if (!empty($request->file('image'))) {
            $profile_picture = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $profile_picture, 'public');

            $user->profile_picture = $profile_picture;
        } elseif($request['delete-image-confirmation'] == true) {
            $user->profile_picture = null;
        }
        $user->display_name = $request['display_name'];
        $user->introduction = $request['introduction'];
        $user->save();
        return redirect()->route('view-my-page');
    }

    public function changeBaseCurrency(Request $request)
    {
        if (Auth::user()) {
            $user = User::where('id', Auth::id())->first();
            $user->base_currency = $request['base_currency'];
            $user->save();
        } else {
            Session::put('base_currency', $request['base_currency']);
        }
        Session::forget('convertedCurrency');

        return redirect()->back();
    }
}
