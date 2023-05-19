<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Point_Vente;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    //
    function pageInsertionElement()
    {
        $marques = Marque::read();
        return view('Magasin/insertion_reference',compact('marques'));
    }

    function pageAcceuilMagasin()
    {
        $pvs = Point_Vente::read();
        return view('Magasin.index',compact('pvs'));
    }
}


