<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Vente extends Model
{
    protected $fillable=['idlaptop','idpoint_vente','date_vente','quantite'];


    const UPDATED_AT = null;

    const CREATED_AT = null;
    protected $table='vente';

    static function insertion(Request $request)
    {
        DB::table('vente')->insert([
            'idlaptop'=>$request->idlaptop,
            'idpoint_vente'=>$request->idpv,
            'quantite'=>$request->qte
        ]);
    }

    static function read()
    {
        return Vente::all();
    }

    static function vente_par_mois()
    {
        return Vente::select(DB::raw("TO_CHAR(date_vente, 'FMMonth') AS month,sum(quantite) as total"))->groupBy('month')->get();
    }

    static function vente_par_mois_par_pv(Request $request)
    {
        return Vente::select(DB::raw("TO_CHAR(date_vente, 'FMMonth') AS month,sum(quantite) as total,idpoint_vente"))->groupBy('month')->groupBy('idpoint_vente')->with('point_vente')->where('idpoint_vente','=',$request->idpv)->get();
    }

    static function view_perte_global_par_mois()
    {
        return DB::table('laptop_composant_perdu')->select(DB::raw("TO_CHAR(date_perte, 'FMMonth') as month,sum(quantite_perte) as quantite_perte,sum(prix_achat)*sum(quantite_perte) as perte_mois"))->groupBy('month')->get();
    }

    static function view_achat_global_par_mois()
    {
        return DB::table('laptop_composant_magasin')->select(DB::raw("TO_CHAR(date_achat, 'FMMonth') as month,sum(quantite_achete) as quantite_achat,sum(prix_achat)*sum(quantite_achete) as prix_achat_mois"))->groupBy('month')->get();
    }

    static function view_vente_global_par_mois()
    {
        return DB::table('laptop_composant_vendu')->select(DB::raw("TO_CHAR(date_vente, 'FMMonth') as month,sum(quantite_vente) as quantite_vente,sum(prix_vente)*sum(quantite_vente) as prix_vente_mois"))->groupBy('month')->get();
    }

    static function view_perte_global_par_mois_par_pv(Request $request)
    {
        return DB::table('laptop_composant_perdu')->select(DB::raw("TO_CHAR(date_perte, 'FMMonth') as month,sum(quantite_perte) as quantite_perte,sum(prix_achat)*sum(quantite_perte) as perte_mois,idpoint_vente"))->groupBy('month')->groupBy('idpoint_vente')->where('idpoint_vente','=',$request->idpv)->get();
    }

    static function view_achat_global_par_mois_par_pv(Request $request)
    {
        return DB::table('laptop_composant_transfert_pv')->select(DB::raw("TO_CHAR(date_transfert, 'FMMonth') as month,sum(quantite_recu) as quantite_recu,sum(prix_achat)*sum(quantite_recu) as prix_achat_mois,idpoint_vente"))->groupBy('month')->groupBy('idpoint_vente')->where('idpoint_vente','=',$request->idpv)->get();
    }

    static function view_vente_global_par_mois_par_pv(Request $request)
    {
        return DB::table('laptop_composant_vendu')->select(DB::raw("TO_CHAR(date_vente, 'FMMonth') as month,sum(quantite_vente) as quantite_vente,sum(prix_vente)*sum(quantite_vente) as prix_vente_mois,idpoint_vente"))->groupBy('month')->groupBy('idpoint_vente')->where('idpoint_vente','=',$request->idpv)->get();
    }


    static function calcul_commission($vente,$month)
    {
        $total_avec_commission = 0;
        foreach ($vente as $v) {
            if($month == $v->month)
            {
                if($v->prix_vente_mois >0 && $v->prix_vente_mois < 2000000)
                {
                    $total_avec_commission = ($v->prix_vente_mois*3)/100;
                }
                if($v->prix_vente_mois >2000000 && $v->prix_vente_mois < 5000000)
                {
                    $commission1 = (2000000*3)/100;
                    $commission2 = ((($v->prix_vente_mois)-2000000)*8)/100;
                    $total_avec_commission = $commission1 + $commission2;
                }
                if($v->prix_vente_mois >0 && $v->prix_vente_mois >5000000){
                    $commission1 = (2000000*3)/100;
                    $commission2 = ((3000000)*8)/100;
                    $commission3 = ((($v->prix_vente_mois)-5000000)*15)/100;

                    $total_avec_commission = $commission1 + $commission2 + $commission3;
                }   
            }
        }
        return $total_avec_commission;
    }

    function laptop()
    {
        return $this->belongsTo(Laptop::class,'idlaptop');
    }

    static function selectByPv($idPV)
    {
        return Vente::with('laptop')->where('idpoint_vente',$idPV)->get(); 
    }

    function point_vente()
    {
        return $this->belongsTo(Point_Vente::class,'idpoint_vente');
    }
    use HasFactory;
}
