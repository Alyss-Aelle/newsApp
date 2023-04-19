<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsStandardController extends Controller
{
    //
    public function index(){


        $actus = News::all() ;//Tout lister
        return view ('news.standard', compact('actus')) ;
        
    }

    public function detail(News $actu)
    { 
        return view('news.standardDetail',compact('actu')) ;
    }
}
