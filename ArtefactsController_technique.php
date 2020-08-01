<?php

namespace App\Http\Controllers;

use App\Artefact;


use Illuminate\Http\Request;

class ArtefactsController extends Controller
{
    
    public function index ()
    {
       $artefacts = Artefact::latest()->get();
        //dd('$articleId');
        return view('artefacts.index', ['artefacts'=> $artefacts]);
    }

    public function show (Artefact $artefact)
    {
        //die("hello");
        //$artefact = new Artefact();
      //  $artefact = Artefact::findOrFail($id);
       // return $artefact;
        return view('artefacts.show', ['artefact'=> $artefact]);
    }

    public function create()
    {
        return view('artefacts.create');
    }

    public function store()
    {
        //persist the new article
    //die('hello');
        //dump(request()->all());
        //security
        //clean up
        //$validateAttributes = request()->validate([
        Artefact::create(request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]));
        
        return redirect('/artefacts');

    }
    
    public function edit(Artefact $artefact)
    {
        //$artefact = Artefact::find($id);

        return view('artefacts.edit', compact('artefact'));
        //return view('artefacts.edit', ['artefact'=>Artefact::find($id)]);
        
    }

    public function update(Artefact $artefact)
    {

        $artefact->update(request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]));
        

        return redirect('/artefacts/'. $artefact->id);

    }
    

}