<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Models\News;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {

        $data = $parser->setLink('https://news.yandex.ru/movies.rss')->parse();

        $category = [
            'title' => $data['title']
        ];
        $news = [];
        foreach ($data as $newsItem) {
            $news = $newsItem;
        }

        $newCategory = Category::create($category);
        if ($newCategory) {
            $catId = $newCategory->id;
        }
        $newsCount = count($news);

        for ($i = 0; $i < $newsCount; $i++) {
            $createNews['title'] = $news[$i]['title'];
            $createNews['short_description'] = $news[$i]['description'];
            $createNews['full_description'] = $news[$i]['description'];
            $createNews['category_id'] = $catId;
            $createdNews = News::create($createNews);
        }
        if ($createdNews)
            return redirect()->route('admin.news.index')->with('success', __("message.admin.news.create.success"));
        else
            return back()->with('error', __("message.admin.news.create.error"));

    }
}
