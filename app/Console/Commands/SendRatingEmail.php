<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRatingEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:ratingEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This sends the rating email to buyers after 3 days of transaction';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $transactions = Transaction::whereDate('created_at', Carbon::parse('Today - 3 days'))->with('buyer', 'seller')->get();

        $datas = [];

        foreach ($transactions as $key => $transaction) { {
                array_push($datas, [$transaction->buyer->email, $transaction->id, $transaction->seller->display_name, $transaction->products->name, $transaction->games->name, $transaction->quantity, $transaction->buyer->display_name]);
            }
        }

        foreach ($datas as $key => $data) {
            $user['to'] = $data[0];
            $transactionData = [
                "id" => "$data[1]",
                "seller_name" => "$data[2]",
                "product_name" => "$data[3]",
                "game_name" => "$data[4]",
                "quantity" => "$data[5]",
                "buyer_name" => "$data[6]",
            ];
            Mail::send('rating.ratingMail', $transactionData, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Rating for recent purchase');
            });
        }
    }
}
