<?php

namespace App\Http\Controllers;

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
        $category = $this->getCategory();
        return view('News.category', [
            'categoryList' => $category,
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNews($id);
        return view('News.show-news', [
            'news' => $news
        ]);
    }

    public function news($idCategory)
    {
        $news = $this->getAllNews($idCategory);
        // dd($news);
        return view('News.news-list', [
            'newsList' => $news
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
