<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sourses')->insert($this->getData());
    }
    public function getData(): array
    {
        $data = [];
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {

            $data[] = [
                "user_name" => $faker->name(),
                'user_email' => $faker->email(),
                "url" => $faker->url(),
            ];
        }
        return $data;
    }
}
