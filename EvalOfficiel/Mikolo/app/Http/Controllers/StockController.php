<?php

namespace App\Http\Controllers;

use App\Models\Historique_Magasin;
use App\Models\Point_Vente;
use App\Models\Stock_Magasin;
use App\Models\Transfert_Magasin;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    function create(Request $request)
    {
        Historique_Magasin::insertion($request);
        Stock_Magasin::insertion($request);

        return back()->with('success','Laptop ajoute aux succes');
    }

    function liste()
    {
        $stocks = Stock_Magasin::read();
        return view('Magasin.Stock.stockMagasin',compact('stocks'));
    }

    function pageEdit($idlaptop)
    {
        $stocks = Stock_Magasin::get($idlaptop);
        $pvs = Point_Vente::read();
        return view('Magasin.Stock.AjoutStock',compact('stocks','pvs'));
    }

    function insertToPV(Request $request)
    {
        Transfert_Magasin::insertion($request);
        Stock_Magasin::update_stock($request);

        return back()->with('success','Envoie vers '.$request->pv.' en cours');
    }
}
