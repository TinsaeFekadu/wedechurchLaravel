<?php

use Illuminate\Database\Seeder;


class ChurchsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Church::truncate();

        $faker = \Faker\Factory::create();

        for($i=0;$i<50;$i++){
            Church::create([
               'name' => $faker->sentence,
                'address' => $faker->sentence
            ]);
        }
    }
}
