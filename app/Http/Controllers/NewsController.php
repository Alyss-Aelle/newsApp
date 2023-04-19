<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //



    public function indexNews(){

        $actus = News::all() ;//Tout lister
        return view ('client', compact('actus')) ;
        
    }


    public function newsInfo($id=0){

        $actu = News::find($id) ;
        return view ('newsInfo',compact('actu'));

    }

    
}
