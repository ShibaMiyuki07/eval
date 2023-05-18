<?php

namespace App\Http\Controllers;

use App\Models\Stock_PV;
use App\Models\Vente;
use Illuminate\Http\Request;

class Vente_Controller extends Controller
{
    //
    function pageVente()
    {   
        session_start();
        $session = unserialize($_SESSION['user']);
        $idPV = $session['idpv']; 
        $stocks = Stock_PV::selectByPv($idPV);
        return view('Point_Vente.Vente.Vente',compact('stocks','idPV','session'));
    }

    function create(Request $request)
    {
        Vente::insertion($request);
        Stock_PV::mise_a_jour($request);
        return back()->with('success','Nombre de laptop vendu '.$request->qte); 
    }

    function select()
    {
        session_start();
        $session = unserialize($_SESSION['user']);
        $idPV = $session['idpv']; 
        $ventes = Vente::selectByPv($idPV);

        return view('Point_Vente.Vente.Liste',compact('ventes','session'));
    }
}
