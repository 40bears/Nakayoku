<?php

namespace App\Http\Controllers;

use App\Models\FelisBankAccount;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function viewFelisBankAccounts()
    {
        $bankAccounts = FelisBankAccount::get();
        $data = compact('bankAccounts');
        return view('admin.felisBankAccountsList')->with($data);
    }

    public function addFelisBankAccount(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.addFelisBankAccount');
        } else {

            $request->validate([
                'bank_name' => 'required',
                // 'swift_code' => 'required',
                'branch_name' => 'required',
                'account_type' => 'required',
                'branch_code' => 'required',
                'account_number' => 'required',
                'account_name' => 'required',
            ]);

            $bankAccount = new FelisBankAccount();
            $bankAccount->bank_name = $request['bank_name'];
            $bankAccount->japanese_bank_name = $request['japanese_bank_name'];
            // $bankAccount->swift_code = $request['swift_code'];
            $bankAccount->branch_name = $request['branch_name'];
            $bankAccount->japanese_branch_name = $request['japanese_branch_name'];
            $bankAccount->account_type = $request['account_type'];
            $bankAccount->branch_code = $request['branch_code'];
            $bankAccount->account_number = $request['account_number'];
            $bankAccount->account_name = $request['account_name'];
            $bankAccount->japanese_account_name = $request['japanese_account_name'];
            $bankAccount->save();

            return redirect()->route('cii-bank-accounts');
        }
    }

    public function editFelisBankAccount($id, Request $request)
    {
        if ($request['felis_bank']) {
            return redirect()->route('edit-felis-bank-account', ['id' => $request['felis_bank']]);
        }
        $bankAccount = FelisBankAccount::where('id', $id)->first();
        $felisBankAccounts = FelisBankAccount::get();
        $data = compact('bankAccount', 'felisBankAccounts');
        return view('admin.editFelisBankAccount')->with($data);
    }

    public function updateFelisBankAccount(Request $request, $id)
    {
        $request->validate([
            'bank_name' => 'required',
            // 'swift_code' => 'required',
            'branch_name' => 'required',
            'account_type' => 'required',
            'branch_code' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
        ]);

        $bankAccount = FelisBankAccount::where('id', $id)->first();
        if ($request['default_product']) {
            $oldDefault = FelisBankAccount::where('default_product', $request['default_product'])->first();
            if ($oldDefault) {
                $oldDefault->default_product = null;
                $oldDefault->save();
            }
            $bankAccount->default_product = $request['default_product'];
        } else {
            $bankAccount->default_product = null;
        }
        $bankAccount->bank_name = $request['bank_name'];
        $bankAccount->japanese_bank_name = $request['japanese_bank_name'];
        // $bankAccount->swift_code = $request['swift_code'];
        $bankAccount->branch_name = $request['branch_name'];
        $bankAccount->japanese_branch_name = $request['japanese_branch_name'];
        $bankAccount->account_type = $request['account_type'];
        $bankAccount->branch_code = $request['branch_code'];
        $bankAccount->account_number = $request['account_number'];
        $bankAccount->account_name = $request['account_name'];
        $bankAccount->japanese_account_name = $request['japanese_account_name'];
        $bankAccount->save();

        return redirect()->route('cii-bank-accounts');
    }

    public function deleteFelisBankAccount($id)
    {
        $bankAccount = FelisBankAccount::where('id', $id)->first();
        $bankAccount->delete();
        return redirect()->route('cii-bank-accounts');
    }


    public function notificationList()
    {
        return view('admin.notification.list');
    }

    public function viewTransactions()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->with('seller', 'buyer', 'games', 'products')->paginate(10);
        $data = compact('transactions');
        return view('admin.transaction.transactionManagement')->with($data);
    }

    public function updateTransactionStatus($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction->payment_status = 1;
        $transaction->save();

        $base_currency = $transaction->buyer->base_currency;

        $data = [
            "base_currency" => "$base_currency",
        ];

        $user['to'] = $transaction->buyer->email;
        Mail::send('products.paymentCompleteMail', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Pyament received and verified');
        });

        return redirect()->route('transactions-management');
    }

    public function viewWithdrawalRequests()
    {
        $withdrawRequests = WithdrawalRequest::orderBy('created_at', 'desc')->with(['users', 'users.bankDetails'])->paginate(10);
        $data = compact('withdrawRequests');
        return view('admin.withdrawRequests.withdrawRequestsManagement')->with($data);
    }

    public function updateWithdrawRequestStatus($id)
    {
        $withdrawRequest = WithdrawalRequest::where('id', $id)->with('users')->first();
        $withdrawRequest->withdraw_status = 1;
        $withdrawRequest->save();


        $base_currency = $withdrawRequest->users->base_currency;

        $data = [
            "base_currency" => "$base_currency",
        ];

        $user['to'] = $withdrawRequest->users->email;
        Mail::send('mypage.bank.withdrawCompleteMail', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Requested amount is deposited successfully.');
        });

        return redirect()->route('withdraw-requests-management');
    }

    public function paymentCompleteNotification()
    {
        $user = User::where('user_type', 'admin')->first();
        Notification::send($user, new GeneralNotification('A payment completed by user. Please click to approve it', 'https://game3.40bears.com/admin/transactions-management'));

        return view('products.paymentCompleteThanks');
    }
}
