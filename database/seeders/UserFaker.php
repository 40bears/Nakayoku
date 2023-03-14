<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 500; $i++) {
            $user = new User;
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->display_name = $user->first_name . ' ' . $user->last_name;
            $user->introduction = NULL;
            $user->base_currency = $faker->randomElement(['USD', 'EUR', 'JPY']);
            $user->email = $faker->unique()->email;
            $user->password = Hash::make('password');
            $user->balance = $faker->numberBetween(1000, 50000000);
            $user->user_rating = $faker->numberBetween(1, 5);
            $user->total_ratings = $faker->numberBetween(1, 99);;
            $user->document_verification = $faker->randomElement(['VERIFIED', 'NOT_VERIFIED']);
            $user->save();
        }
    }
}
