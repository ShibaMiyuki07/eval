<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    //
    function create(Request $request)
    {
        Marque::insertion($request);

        return back()->with('success','Marque ajoute avec succes');
    }

    function liste()
    {
        $marques = Marque::read();
        return view('Magasin.Element.selectMarque',compact('marques'));
    }
}
