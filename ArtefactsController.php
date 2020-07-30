<?php

namespace App\Http\Controllers;
use App\Artefact;

use Illuminate\Http\Request;

class ArtefactsController extends Controller
{
    public function index()
    {
        $artefacts = Artefact::latest()->get();

        return view('artefacts.index', ['artefacts' => $artefacts]);
    }
    
    public function show($id)
    {
        $artefact = Artefact::find($id);

        return view('artefacts.show', ['artefact' => $artefact]);
        //dd($artefactId);
    }
}
