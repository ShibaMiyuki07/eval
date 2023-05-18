<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Perte extends Model
{
    protected $fillable = ['idlaptop','idpoint_vente','quantite','date_perte'];

    protected $table='historique_perte';
    const UPDATED_AT = null;

    const CREATED_AT = null;
    static function insertion(Request $request)
    {
        $perdu = $request->total - $request->qte;
        if($perdu > 0)
        {
            DB::table('historique_perte')->insert([
                'idlaptop'=>$request->idlaptop,
                'idpoint_vente'=>$request->idpv,
                'quantite'=>$perdu
            ]);
        }
    }

    static function read()
    {
        return Perte::all();
    }
    use HasFactory;
}
