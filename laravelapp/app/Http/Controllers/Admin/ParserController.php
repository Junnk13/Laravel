<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Sources;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        $urls=[];
        $sources = Sources::all();
        foreach ($sources as $source){
            $urls[]=$source->url;
        }
        if (empty($urls)) {
            return back()->with('error', 'Нет источников для добавления в очередь');
        }
        foreach ($urls as $url) {
           $this->dispatch(new NewsParsing($url));
        }
      return back()->with('success', 'Новости добавлены в очередь');

    }
}
