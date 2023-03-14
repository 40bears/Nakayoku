<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [['AK47', 'item', 1, '2000', '1000', 1, 'A cool gun for GTA-V'], ['M16', 'item', 1, '5000', '500', 1, 'A cool machine gun for GTA-V'], ['Invisible Cloak', 'item', 2, '1000', '10', 1, 'An invisible clock for assassins creed stealth attack']];
        foreach ($products as $key => $value) {
            DB::table('products')->insert([
                'name' => $value[0],
                'product_type' => $value[1],
                'game_id' => $value[2],
                'price' => $value[3],
                'stock_quantity' => $value[4],
                'user_id' => $value[5],
                'description' => $value[6],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
