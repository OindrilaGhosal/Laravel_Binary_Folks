<?php

namespace App\Http\Controllers;

use App\Artefact;


use Illuminate\Http\Request;

class ArtefactsController extends Controller
{
    
    public function index ()
    {
       $artefacts = Artefact::latest()->get();
        
        return view('artefacts.index', ['artefacts'=> $artefacts]);
    }

    public function show (Artefact $artefact)
    {
       
        return view('artefacts.show', ['artefact'=> $artefact]);
    }

    public function create()
    {
        return view('artefacts.create');
    }

    public function store()
    {
        
        Artefact::create($this->validateArtefact());            
        
        return redirect(route('artefacts.index'));

    }
    
    public function edit(Artefact $artefact)
    {

        return view('artefacts.edit', compact('artefact'));
        
    }

    public function update(Artefact $artefact)
    {

        $artefact->update($this->validateArtefact());
            
        return redirect($artefact.path());

    }
    protected function validateArtefact()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}