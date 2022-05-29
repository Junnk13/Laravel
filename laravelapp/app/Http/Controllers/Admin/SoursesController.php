<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $validated = $request->except(['_token']);
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
     * @param \Illuminate\Http\Request $request
     * @param Sourses $sourse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Sourses $sourse)
    {
        $validated = $request->except(['_token']);
        $sourse = $sourse->fill($validated);
        if($sourse->save()) {
            return redirect()->route('admin.sourses.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Ошибка обновления');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
