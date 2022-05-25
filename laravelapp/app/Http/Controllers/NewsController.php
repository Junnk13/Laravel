<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class NewsController extends Controller
{
    public function index()
    {
        return view('News.index');
    }

    public function category()
    {
        $model=app(Category::class);
        $categories =$model->getCategories();
        return view('News.category', [
            'categoryList' => $categories,
        ]);
    }

    public function show(int $id)
    {
        $model = app(News::class);
        $news = $model->getNewsById($id );

        return view('News.show-news', [
            'news' => $news
        ]);
    }

    public function newsList($idCategory)
    {
        $model = app(News::class);
        $newsArr = $model->getNews($idCategory);
        return view('News.news-list', [
            'newsList' => $newsArr
        ]);
    }

    public function getUrlData(Request $request)
    {

        $request->validate(['user_name_url' => ['required', 'string']]);
        $request->validate(['user_url' => ['required', 'string']]);
        $data =response()->json($request->except('_token'),201);
        \Storage::put('file.txt', $data);
        return 'Файл сохранен';
    }
}
