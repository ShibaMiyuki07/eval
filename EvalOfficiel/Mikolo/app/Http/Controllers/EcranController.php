<?php

namespace App\Http\Controllers;

use App\Models\Ecran;
use Illuminate\Http\Request;

class EcranController extends Controller
{
    //
    function create(Request $request)
    {
        Ecran::insertion($request);

        return back()->with('success','Ecran ajoute avec succes');
    }

    function liste()
    {
        $ecrans = Ecran::read();
        return view('Magasin.Element.selectEcran',compact('ecrans'));
    }
}
