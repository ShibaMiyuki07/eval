<?php

namespace App\Http\Controllers;

use App\Models\Disque_Dur;
use Illuminate\Http\Request;

class Disque_DurController extends Controller
{
    //
    function create(Request $request)
    {
        Disque_Dur::insertion($request);

        return back()->with('success','Disque Dur ajoute avec succes');
    }

    function liste()
    {
        $disques = Disque_Dur::read();

        return view('Magasin.Element.selectDisque',compact('disques'));
    }
}
