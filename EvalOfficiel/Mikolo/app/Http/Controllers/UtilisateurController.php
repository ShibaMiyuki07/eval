<?php

namespace App\Http\Controllers;

use App\Models\Point_Vente;
use App\Models\Utilisateur;
use App\Models\Utilisateur_Point_Vente;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //
    function pageInsertion()
    {
        return view('Utilisateur.insertion_Utilisateur');
    }

    function create(Request $request)
    {
        Utilisateur::insertion($request);

        return back()->with('success','Utilisateur ajoute avec succes');
    }

    function liste()
    {
        $utilisateurs = Utilisateur::read();
        $pvs = Point_Vente::read();
        return view('Utilisateur.selectUtilisateur',compact('utilisateurs','pvs'));
    }

    function affectation(Request $request)
    {
        Utilisateur_Point_Vente::insertion($request);

        return back()->with('success','Affectation d\' utilisateur reussi');
    }

    function login(Request $request)
    {
        $user = Utilisateur::login($request);
        $session = array();
        foreach($user as $use)
        {
            $session['idutilisateur'] = $use->idutilisateur;
            $session['nom'] = $use->nom;
            $session['prenom'] = $use->prenom;
        }

        if(isset($session['idutilisateur']))
        {
            $etat = Utilisateur_Point_Vente::selectbyUser($session['idutilisateur']);
            if($etat->count() != 0)
            {
                $session['idpv'] = $etat[0]->idpoint_vente;
                session_start();
                $_SESSION['user'] = serialize($session);
                return redirect(route('point_vente.index'));
            }
        }
        else
        {
            return redirect(route('magasin.acceuil'));
        }
    }

    function pageLogin()
    {
        return view('login');
    }


    function deconnexion()
    {
        session_start();
        session_destroy();

        return redirect('/');
    }
    function pageAcceuilPV()
    {
        session_start();
            $session = unserialize($_SESSION['user']);
            return view('Point_Vente.index',compact('session'));
    }
}
