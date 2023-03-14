<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\ForgetPassword;
use App\Models\Game;
use App\Models\Pages;
use App\Models\Product;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request['email'];
        $data = compact('email');
        return view('auth.loginPassword')->with($data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            $id = Auth::id();

            if (Session::has('previous_route')) {
                return Redirect::to(Session::get('previous_route'));
                Session::forget('previous_route');
            } else {
                return redirect()->intended('/');
            }
        }
        return redirect()->route('login')->with('msg', 'Your ID or password do not match');
    }

    public function signupView()
    {
        return view('auth.signup1');
    }

    public function signupEnterEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        $otp = rand(100000, 999999);
        $mailid = ForgetPassword::where('email', $request['email'])->first();
        if ($mailid) {
            $mailid->token = $otp;
            $mailid->save();
        } else {
            $forgetPassword = new ForgetPassword;
            $forgetPassword->email = $request['email'];
            $forgetPassword->token = $otp;
            $forgetPassword->save();
        }

        $emailData = $request['email'];
        $data = [
            "otp" => "$otp",
            "email" => "$emailData",
        ];

        $user['to'] = $request['email'];
        Mail::send('email_verification', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Email confirmation');
        });

        return redirect()->route('signup2')->with(['emailData' => $emailData]);
    }

    public function signUpCheckMail()
    {
        return view('auth.signupMailSent');
    }

    public function signupVerifyEmail(Request $request)
    {
        $email = $request->email;
        $otp = $request->token;

        $data = compact('email');

        $forgetPassword = ForgetPassword::where('email', $email)->first();
        if ($otp == $forgetPassword->token) {
            return view('admin.kyc.viewKycForm')->with($data);
        } else {
            return view('auth.signup1');
        }
    }

    public function userKyc(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'document_type' => 'required',
            'document' => 'required',
            'document3' => 'required'
        ]);
        if (!empty($request->file('document'))) {
            $image = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('document')->getClientOriginalExtension();
            $request->file('document')->storeAs('uploads', $image, 'public');

            Session::put('document', $image);
        }
        if (!empty($request->file('document2'))) {
            $image2 = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('document2')->getClientOriginalExtension();
            $request->file('document2')->storeAs('uploads', $image2, 'public');

            Session::put('document_two', $image2);
        }
        if (!empty($request->file('document3'))) {
            $image3 = Carbon::now()->format('Y') . '/' . Carbon::now()->format('M') . '/' . uniqid() . '.' . $request->file('document3')->getClientOriginalExtension();
            $request->file('document3')->storeAs('uploads', $image3, 'public');

            Session::put('residence_certificate', $image3);
        }
        Session::put('email', $request['email']);
        Session::put('document_type', $request['document_type']);

        return redirect()->route('store-password-view');
    }

    public function storePasswordView()
    {
        return view('auth.setPassword');
    }

    public function storePassword(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'password' => 'required',
            'document_type' => 'required',
            'document' => 'required',
            'residence_certificate' => 'required',
        ]);

        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->DOB = $request['dob'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->document = $request['document'];
        $user->document_two = $request['document_two'];
        $user->residence_certificate = $request['residence_certificate'];
        $user->document_type = $request['document_type'];
        $user->save();

        Session::forget('document');
        Session::forget('document_two');
        Session::forget('document_type');
        Session::forget('email');

        return redirect()->route('login');
    }

    public function dashboard()
    {
        $devices = Device::with('games')->get();
        $games = Game::with('products')->get();
        $pages = Pages::orderBy('created_at', 'asc')->get();
        $data = compact('pages', 'games', 'devices');

        return view('dashboard')->with($data);
    }

    public function dashboardSearch(Request $request)
    {
        if ($request['top_page_search']) {
            $search = $request['top_page_search'];
            $devices = Device::with(['games' => function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            }])->get();
            $games = Game::where('name', 'LIKE', "%$search%")->get();
            $products = Product::with('games')->get();
            $pages = Pages::orderBy('created_at', 'asc')->get();
            $data = compact('pages', 'products', 'devices', 'games');
            return view('dashboard')->with($data);
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('');
    }

    public function forgotPasswordView()
    {
        return view('auth.forgotPassword');
    }

    public function forgotPasswordLink(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request['email'])->first();
        if ($user) {
            $otp = rand(100000, 999999);
            $mailid = ForgetPassword::where('email', $request['email'])->first();
            if ($mailid) {
                $mailid->token = $otp;
                $mailid->save();
            } else {
                $forgetPassword = new ForgetPassword;
                $forgetPassword->email = $request['email'];
                $forgetPassword->token = $otp;
                $forgetPassword->save();
            }

            $emailData = $request['email'];
            $data = [
                "otp" => "$otp",
                "email" => "$emailData",
            ];

            $user['to'] = $request['email'];
            Mail::send('forgot_password', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Change Password');
            });

            return redirect()->route('forgot-password-mail-sent')->with(['emailData' => $emailData]);
        } else {
            return redirect()->route('forgot-password')->with('msg', 'This email ID is not registered');
        }
    }

    public function forgotPasswordCheckMail()
    {
        return view('auth.forgotPasswordMailSent');
    }

    public function forgotPasswordConfirmation(Request $request)
    {
        $email = $request->email;
        $otp = $request->token;

        $data = compact('email');

        $forgetPassword = ForgetPassword::where('email', $email)->first();
        if ($otp == $forgetPassword->token) {
            return view('auth.changePassword')->with($data);
        } else {
            return view('auth.forgotPassword');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $user = User::where('email', $request['email'])->first();
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect()->route('login')->with('successMsg', 'Your password is changed successfully..!');;
    }
}
