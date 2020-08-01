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

    public function show ($id)
    {
        //die("hello");
        //$artefact = new Artefact();
        $artefact = Artefact::find($id);
        
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

        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);

        $artefact = new Artefact();
        $artefact->title = request('title');
        $artefact->excerpt = request('excerpt');
        $artefact->body = request('body');
        $artefact->save();

        return redirect('/artefacts');

    }
    
    public function edit($id)
    {
        $artefact = Artefact::find($id);

        return view('artefacts.edit', compact('artefact'));
        //return view('artefacts.edit', ['artefact'=>Artefact::find($id)]);
        
    }

    public function update($id)
    {
        $artefact = Artefact::find($id);
        $artefact->title = request('title');
        $artefact->excerpt = request('excerpt');
        $artefact->body = request('body');
        $artefact->save();

        return redirect('/artefacts/'. $artefact->id);

    }
    

}