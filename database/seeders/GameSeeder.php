<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [['Grand Theft Auto V', 1, 1], ['Assassins Creed', 2, 1], ['World Soccer', 3, 1]];
        foreach ($games as $key => $value) {
            DB::table('games')->insert([
                'name' => $value[0],
                'device' => $value[1],
                'user_id' => $value[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
