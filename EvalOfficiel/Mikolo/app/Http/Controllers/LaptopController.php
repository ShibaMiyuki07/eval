<?php

namespace App\Http\Controllers;

use App\Models\Disque_Dur;
use App\Models\Ecran;
use App\Models\Laptop;
use App\Models\Marque;
use App\Models\Processeur;
use App\Models\Ram;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    //
    function pageInsertion()
    {
        $rams = Ram::read();
        $processeurs = Processeur::read();
        $marques = Marque::read();
        $disque_durs = Disque_Dur::read();
        $ecrans = Ecran::read();

        return view('Magasin.Laptop.insertion_Laptop',compact('rams','processeurs','marques','disque_durs','ecrans'));
    }

    function create(Request $request)
    {
        Laptop::insertion($request);

        return back()->with('success','Laptop ajoute avec succes');
    }

    function liste()
    {
        $laptops = Laptop::read();
        return view('Magasin.Laptop.selectLaptop',compact('laptops'));
    }
}
