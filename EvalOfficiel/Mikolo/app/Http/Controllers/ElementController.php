<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    //
    function pageInsertionElement()
    {
        $marques = Marque::read();
        return view('Magasin/insertion_reference',compact('marques'));
    }
}
