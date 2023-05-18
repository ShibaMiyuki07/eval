<?php

namespace App\Http\Controllers;

use App\Models\Processeur;
use Illuminate\Http\Request;

class ProcesseurController extends Controller
{
    //
    function create(Request $request)
    {
        Processeur::insertion($request);

        return back()->with('success','Processeur ajoute avec succes');
    }

    function liste()
    {
        $processeurs = Processeur::read();

        return view('Magasin.Element.selectProcesseur',compact('processeurs'));
    }
}
