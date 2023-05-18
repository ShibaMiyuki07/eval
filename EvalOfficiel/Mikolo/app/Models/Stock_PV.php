<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Stock_PV extends Model
{
    protected $fillable=['idlaptop','idpoint_vente','quantite'];

    protected $table='stock_point_vente';

    protected $primaryKey = null;
    const UPDATED_AT = null;

    const CREATED_AT = null;

    static function insertion(Request $request)
    {
        DB::table('stock_point_vente')->insert([
            'idlaptop'=>$request->idlaptop,
            'idpoint_vente'=>$request->idpv,
            'quantite'=>$request->qte
        ]);
    }

    static function selectByPv($idPV)
    {
        return Stock_PV::with('laptop')->where('idpoint_vente',$idPV)->get();
    }

    static function mise_a_jour(Request $request)
    {
        $reste = $request->total - $request->qte;
        DB::table('stock_point_vente')
        ->where('idlaptop','=',$request->idlaptop)
        ->where('idpoint_vente','=',$request->idpv)
        ->update([
            'quantite'=>$reste
        ]);
    }
    function laptop()
    {
        return $this->belongsTo(Laptop::class,'idlaptop');
    }

    function point_vente()
    {
        return $this->belongsTo(Point_Vente::class,'idpoint_vente');
    }
    use HasFactory;
}
