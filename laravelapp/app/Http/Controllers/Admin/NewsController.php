<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Queries\QueryBuilderNews;
use App\Services\UploadService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(QueryBuilderNews $news)
    {
        return view("News.admin.news-index",['news' => $news->getNews()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
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
     * @return RedirectResponse
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
     * @return Application|Factory|View
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
    public function update(UpdateNewsRequest $request, News $news, UploadService $uploadService)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }
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
     * @return JsonResponse
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => true], 400);
        }
    }
}
