<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FelisBankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            ['Rakuten Bank, Ltd.', '楽天銀行', 'RAKTJPJT', 'DAI SAN EIGYOU', '大三栄行', '253', 7124469, 'G-LINE SYSTEMS CO., LTD.', 'ジーラインシステムズ', 'ITEM'],
            ['Rakuten Bank, Ltd.', '楽天銀行', 'RAKTJPJT', 'DAI YON EIGYOU', 'だいよんえぎょう', '254', 7103702, 'G-LINE SYSTEMS CO., LTD.', 'ジーラインシステムズ', 'CURRENCY'],
            ['Rakuten Bank, Ltd.', '楽天銀行', 'RAKTJPJT', 'DAI SAN EIGYOU', '大三栄行', '253', 7103712, 'G-LINE SYSTEMS CO., LTD.', 'ジーラインシステムズ', 'ACCOUNT'],
            ['Rakuten Bank, Ltd.', '楽天銀行', 'RAKTJPJT', 'DAI SAN EIGYOU', '大三栄行', '253', 7124493, 'G-LINE SYSTEMS CO., LTD.', 'ジーラインシステムズ'],
            ['Rakuten Bank, Ltd.', '楽天銀行', 'RAKTJPJT', 'DAI YON EIGYOU', 'だいよんえぎょう', '254', 7298970, 'G-LINE SYSTEMS CO., LTD.', 'ジーラインシステムズ'],
        ];
        foreach ($accounts as $key => $value) {
            DB::table('felis_bank_accounts')->insert([
                'bank_name' => $value[0],
                'japanese_bank_name' => $value[1],
                'swift_code' => $value[2],
                'branch_name' => $value[3],
                'japanese_branch_name' => $value[4],
                'branch_code' => $value[5],
                'account_number' => $value[6],
                'account_name' => $value[7],
                'japanese_account_name' => $value[8],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
