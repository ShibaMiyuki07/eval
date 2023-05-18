<?php

namespace App\Http\Controllers;

use App\Models\Perte;
use App\Models\Recu_Magasin;
use App\Models\Recu_PV;
use App\Models\Stock_Magasin;
use App\Models\Stock_PV;
use App\Models\Transfert_PV;
use Illuminate\Http\Request;

class Transfert_PV_Magasin_Controller extends Controller
{
    //
    function pageRenvoi()
    {
        session_start();
        $session = unserialize($_SESSION['user']);
        $idPV = $session['idpv']; 
        $stocks = Stock_PV::selectByPv($idPV);

        return view('Point_Vente.Renvoi.Renvoi',compact('idPV','stocks','session'));
    }

    function envoi_Magasin(Request $request)
    {
        Transfert_PV::insertion($request);
        Stock_PV::mise_a_jour($request);

        return back()->with('success','Nombre recu '.$request->qte);
    }

    function recu_venant_PV()
    {
        $transferts = Transfert_PV::read();

        return view('Magasin.Stock.Reception',compact('transferts'));
    }

    function recu(Request $request)
    {
        Recu_PV::insertion($request);
        Stock_Magasin::ajout_stock($request);
        Perte::insertion($request);
        return back()->with('success','Nombre recu '.$request->qte);
    }
}
