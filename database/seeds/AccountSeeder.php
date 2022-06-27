<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountTypes = ['Saving', 'Checking'];
        $faker = Factory::create();

        DB::table('customers')->get()->each(function ($customer) use ($accountTypes, $faker) {

            DB::table('accounts')->insert([
                'customer_id' => $customer->id,
                'opening_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'account_type' => $accountTypes[random_int(0, 1)],
                'pin' => random_int(1000, 9999),
                'status' => random_int(0, 1),
            ]);
        });
    }
}
