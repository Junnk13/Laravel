<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [];
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {

            $data[] = [
                'category_id' => rand(1, 5),
                'title' => $faker->text(15),
                "author" => $faker->name(),
                "short_description" => $faker->text(100),
                "full_description" => $faker->text(255),
            ];
        }
        return $data;
    }
}
