<?php

namespace App\Http\Controllers;

use App\Models\Perte;
use App\Models\Recu_Magasin;
use App\Models\Stock_PV;
use App\Models\Transfert_Magasin;
use Illuminate\Http\Request;

class Transfert_Magasin_PV_Controller extends Controller
{
    //
    function Reception_par_PV()
    {   
        session_start();
        $session = unserialize($_SESSION['user']);
        $idPV = $session['idpv']; 
        $transferts = Transfert_Magasin::selectById($idPV);
        return view('Point_Vente.Reception.Reception',compact('transferts','idPV','session'));
    }

    function recu(Request $request)
    {
        Recu_Magasin::insertion($request);
        Stock_PV::insertion($request);
        Perte::insertion($request);
        return back()->with('success','Nombre recu '.$request->qte);
    }
}
