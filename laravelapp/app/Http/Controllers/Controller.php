<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(int $id): array
    {
        $news = [];
        $faker = Factory::create();

        if ($id) {
            return [
                "id" => $id,
                'title' => $faker->text(15),
                "author" => $faker->name(),
                "img" => $faker->imageUrl(200, 200),
                "desc" => $faker->text(150),
                "date_create" => now('Europe/Moscow')
            ];
        }
        return $news;
    }

    public function getAllNews(int $idCategory)
    {
        $news = [];
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $news[] = [
                'idCategory' => $idCategory,
                "id" => $i + 1,
                'title' => $faker->text(15),
                "author" => $faker->name(),
                "img" => $faker->imageUrl(200, 200),
                "desc" => $faker->text(150),
                "date_create" => now('Europe/Moscow')
            ];
        }
        return $news;
    }

    public function getCategory()
    {
        $category = [];
        $faker = Factory::create();
        for ($i = 0; $i < 3; $i++) {
            $category[] = [
                "id" => $i + 1,
                'title' => $faker->text(15),
            ];
        }
        return $category;
    }
}

