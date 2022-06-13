<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSourceRequest;
use App\Http\Requests\UpdateSourceRequest;
use App\Models\Sources;
use App\Queries\QueryBuilderSources;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(QueryBuilderSources $sources)
    {
        return view("News.admin.sources-index",['sources' => $sources->getSources()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('News.admin.sources-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSourceRequest $request
     * @return RedirectResponse
     */
    public function store(CreateSourceRequest $request)
    {
        $validated = $request->validated();
        $source = Sources::create($validated);
        if($source) {
            return redirect()->route('admin.sources.index')
                ->with('success', __("message.admin.news.create.success"));
        }
        return back()->with('error', __("message.admin.news.create.error"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sources $source
     * @return Application|Factory|View
     */
    public function edit(Sources $source)
    {
        return view('News.admin.sources-edit',['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSourceRequest $request
     * @param Sources $source
     * @return RedirectResponse
     */
    public function update(UpdateSourceRequest $request, Sources $source)
    {
        $validated = $request->validated();
        $source = $source->fill($validated);
        if($source->save()) {
            return redirect()->route('admin.sources.index')
                ->with('success', __("message.admin.news.update.success"));
        }

        return back()->with('error', __("message.admin.news.update.error"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sources $source
     * @return JsonResponse
     */
    public function destroy(Sources $source)
    {
        try {
            $source->delete();
            return response()->json('ok');

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => true], 400);
        }
    }
}
