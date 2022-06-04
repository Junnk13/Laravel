<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Queries\QueryBuilderNews;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(QueryBuilderNews $news)
    {
        return view("News.admin.news-index",['news' => $news->getNews()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
       return view('News.admin.news-create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNewsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateNewsRequest $request)
    {

        $validated = $request->validated();

        $news = News::create($validated);
        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __("message.admin.news.create.success"));
        }
        return back()->with('error', __("message.admin.news.create.error"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('News.admin.news-edit',['news' => $news,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNewsRequest $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $validated = $request->validated();
        $news = $news->fill($validated);
        if($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', __("message.admin.news.update.success"));
        }

        return back()->with('error', __("message.admin.news.update.error"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json('ok');

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => true], 400);
        }
    }
}
