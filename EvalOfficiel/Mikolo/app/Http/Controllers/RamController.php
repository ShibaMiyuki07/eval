<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    //
    function create(Request $request)
    {
        Ram::insertion($request);

        return back()->with('success','Ram ajoute avec succes');
    }

    function liste()
    {
        $rams = Ram::read();
        return view('Magasin.Element.selectRam',compact('rams'));
    }
}
