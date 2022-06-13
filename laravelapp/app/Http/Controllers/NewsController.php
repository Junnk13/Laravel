<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderNews;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class NewsController extends Controller
{
    public function index()
    {
        return view('News.index');
    }

    public function category(QueryBuilderCategories $categories)
    {

        return view('News.category', [
            'categoryList' => $categories->getCategoriesForIndex(),
        ]);
    }

    public function show(QueryBuilderNews $news, $id)
    {

        return view('News.show-news', [
            'news' => $news->getCurrentNews($id)
        ]);
    }

    public function newsList(QueryBuilderNews $newsArr, $idCategory)
    {
        return view('News.news-list', [
            'newsList' => $newsArr->getNewsById($idCategory)
        ]);
    }

}
