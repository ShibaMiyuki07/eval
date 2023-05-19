<?php

namespace App\Http\Controllers;

use App\Models\Point_Vente;
use App\Models\Vente;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    //
    function pageBenefice()
    {
        $pvs = Point_Vente::read();
        return view('Magasin.Benefice.Benefice',compact('pvs'));
    }

    function commission_vente(Request $request)
    {
        $pertes = Vente::view_perte_global_par_mois_par_pv($request);
        $achats = Vente::view_achat_global_par_mois_par_pv($request);
        $ventes = Vente::view_vente_global_par_mois_par_pv($request);
        $vente = new Vente();
        return view('Magasin.Benefice.Liste_Mois',compact('pertes','achats','ventes','vente'));
    }
}
