<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{

    public function index(){

        //$actus = News::all() ;//Tout lister
        $actus = News::orderBy('created_at','desc')->paginate(10) ;//Tout lister par ordre de creation et decroissant

        return view ('adminnews.list', compact('actus')) ;

    }
    public function formAdd (){ //affichage de mon formulaire

        return view('adminnews.edit');
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

    public function formEdit ($id = 0){ //affichage de mon formulaire d'édition

        $actu = News::findOrFail($id) ;

        return view('adminnews.edit',compact('actu'));
    }

    public function edit(Request $request,$id = 0){

        //creation instance du model news a modifier a partir de id

        $actu = News::findOrFail($id) ;
        $request->validate(['titre'=>'required|min:5']) ; 


        //application d'une image a une news
        if ($request->file()) {

            //ecrase l'image precedente
            if ($actu->image != '') {
                Storage::delete($actu->image) ;
            }

            $fileName = $request->image->store('public/images') ;
            $actu->image = $fileName ;
        }
        
        $actu->titre = $request->titre ;//injection de la donnée du formulaire dans le model

        $actu->description = $request->description ;
        $actu->save() ; //enregistrement données
         
        return 
        redirect(route('news.add') ) ;
    }

    public function delete($id = 0) {

        //recuperation d'une actualité par son identifiant
        $actu = News::findOrFail($id) ;

        //verification existance du fichier
        if ($actu->image !='') {
            
        //suppression images dans base de donnée
        Storage::delete($actu->image) ;
        }
     

        //suppression de l'actualité a partir de l'identifiant
        $actu->delete();
        return 'delete' ;
    }
    

}
