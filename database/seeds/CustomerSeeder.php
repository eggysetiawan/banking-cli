<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Factory::create('id_ID');


        for ($i = 0; $i <= 20; $i++) {

            DB::table('customers')
                ->insert(
                    [
                        'name' => $factory->name,
                        'date_of_birth' => $factory->dateTimeBetween('-50 years', '-17 years'),
                        'city' => $factory->city(),
                        'zipcode' => $factory->postcode(),
                        'status' => random_int(0, 1),
                    ]
                );
        }
    }
}
