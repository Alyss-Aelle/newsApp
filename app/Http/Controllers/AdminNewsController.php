<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{

    public function index(){

        //$actus = News::all() ;//Tout lister
        $actus = News::orderBy('created_at','desc')->paginate(10) ;//Tout lister par ordre de creation et decroissant

        return view ('adminnews.list', compact('actus')) ;

    }
    public function formAdd (){ //affichage de mon formulaire

        return view('adminnews.add');
    }
    
    public function add (Request $request){//ajout des informations 

        $newsModel = new News ; // création d'une instance de class(model News) pour enregister en base


        //verification des données du formulaire
        /**
         * titre oligatoire requiere 5 charactères min
         */
        $request->validate(['titre'=>'required|min:5']) ; 

        //gestion de l'upload de l'image
        if ($request->file()) {

            $fileName = $request->image->store('public/images') ;
            $newsModel->image = $fileName ;
        }
        

        $newsModel->titre = $request->titre ;//injection de la donnée du formulaire dans le model

        $newsModel->description = $request->description ;
        $newsModel->save() ; //enregistrement données
        
        return 
        redirect(route('news.add') ) ;
    }
    

}
