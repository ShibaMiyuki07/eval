<?php

namespace App\Http\Controllers;

use App\Models\Point_Vente;
use Illuminate\Http\Request;

class Point_VenteController extends Controller
{
    //
    function create(Request $request)
    {
        Point_Vente::insertion($request);

        return back()->with('success','Point de vente ajoute avec succes');
    }

    function search(Request $request)
    {
        session_start();
        $session = unserialize($_SESSION['user']);
        $idPV = $session['idpv']; 
        $results = Point_Vente::search($request,$idPV);
        return view('Point_Vente.Recherche.Resultat',compact('results','session'));
    }
}
