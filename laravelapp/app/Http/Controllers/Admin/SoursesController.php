<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSourseRequest;
use App\Http\Requests\UpdateSourseRequest;
use App\Models\Sourses;
use Illuminate\Http\Request;
use App\Queries\QueryBuilderSourses;

class SoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(QueryBuilderSourses $sourses)
    {
        return view("News.admin.sourses-index",['sourses' => $sourses->getSourses()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSourseRequest $request)
    {
        $validated = $request->validated();

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
     * @param Sourses $sourse
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Sourses $sourse)
    {
        return view('News.admin.sourses-edit',['sourse' => $sourse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSourseRequest $request
     * @param Sourses $sourse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSourseRequest $request, Sourses $sourse)
    {
        $validated = $request->validated();
        $sourse = $sourse->fill($validated);
        if($sourse->save()) {
            return redirect()->route('admin.sourses.index')
                ->with('success', __("message.admin.news.update.success"));
        }

        return back()->with('error', __("message.admin.news.update.error"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sourses $sourse
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Sourses $sourse)
    {
        try {
            $sourse->delete();
            return response()->json('ok');

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => true], 400);
        }
    }
}
