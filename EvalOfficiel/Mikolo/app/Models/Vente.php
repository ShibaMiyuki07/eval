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
