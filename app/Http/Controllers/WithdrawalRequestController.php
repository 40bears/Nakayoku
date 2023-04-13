<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\User;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawalRequestController extends Controller
{
    public function withdrawalRequest(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('mypage.bank.withdrawalRequests');
        } else {
            $request->validate([
                'amount' => 'required',
            ]);
            if (showConvertedPriceToUsd($request['amount']) <= Auth::user()->balance && showConvertedPriceToUsd($request['amount']) >= 8 && $request['amount'] != null) {
                $bankDetails = BankAccount::where('user_id', Auth::id())->first();
                if ($bankDetails) {
                    $name = Auth::user()->first_name;
                    $amount = $request['amount'] . ' ' . showCurrencySymbol();
                    $base_currency = Auth::user()->base_currency;
                    $data = [
                        "name" => "$name",
                        "amount" => "$amount",
                        "bank_name" => "$bankDetails->bank_name",
                        "account_type" => "$bankDetails->account_type",
                        "branch_code" => "$bankDetails->branch_code",
                        "account_number" => "$bankDetails->account_number",
                        "swift_code" => "$bankDetails->swift_code",
                        "account_name" => "$bankDetails->account_name",
                        "base_currency" => "$base_currency"
                    ];

                    $user['to'] = env("MAIL_FROM_ADDRESS");
                    Mail::send('mypage.bank.withdrawalMail', $data, function ($messages) use ($user) {
                        $messages->to($user['to']);
                        $messages->subject('Withdrawal Request through mail');
                    });

                    $withdrawalRequest = new WithdrawalRequest();
                    $withdrawalRequest->user_id = Auth::id();
                    $withdrawalRequest->amount = (showConvertedPriceToUsd($request['amount']) + 2);
                    $withdrawalRequest->save();

                    $user = User::where('id', Auth::id())->first();
                    $user->balance = $user->balance - (showConvertedPriceToUsd($request['amount']) + 2);
                    $user->save();

                    return redirect()->route('withdrawal-request-history');
                } else {
                    return redirect()->route('view-bank-details');
                }
            } else {
                return redirect()->route('withdrawal-request')->withErrors(['error' => 'Requested amout is less than the minimum transfer or more than the account balance']);
            }
        }
    }

    public function withdrawalRequestHistory()
    {
        $withdrawalRequests = WithdrawalRequest::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        $data = compact('withdrawalRequests');
        return view('mypage.bank.withdrawalRequestHistory')->with($data);
    }
}
