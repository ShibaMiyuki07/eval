<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Stock_Magasin extends Model
{
    protected $fillable=['idlaptop','quantite','prix_vente'];

    protected $primaryKey = null;
    const UPDATED_AT = null;

    const CREATED_AT = null;
    protected $table='stock_magasin';

    static function insertion(Request $request)
    {
        DB::table('stock_magasin')->insert([
            'idlaptop'=>$request->idlaptop,
            'quantite'=>$request->qte,
            'prix_vente'=>$request->vente
        ]);
    }

    static function read()
    {
        return Stock_Magasin::all();
    }

    static function update_stock(Request $request)
    {
        $reste = $request->total - $request->qte;
        DB::table('stock_magasin')
        ->where('idlaptop','=',$request->idlaptop)
        ->update([
            'quantite'=>$reste
        ]);
    }

    static function ajout_stock(Request $request)
    {
        $actuelle = DB::table('stock_magasin')->select('*')->where('idlaptop','=',$request->idlaptop)->get();

        $stock_actuelle = 0;
        foreach ($actuelle as $ac) {
            $stock_actuelle = $stock_actuelle + $ac->quantite;
        }
        $total = $stock_actuelle + $request->qte;
        DB::table('stock_magasin')
        ->where('idlaptop','=',$request->idlaptop)
        ->update([
            'quantite'=>$total
        ]);
    }

    static function get($idlaptop)
    {
        return Stock_Magasin::with('laptop')->where('idlaptop','=',$idlaptop)->get();
    }

    function laptop()
    {
        return $this->belongsTo(Laptop::class,'idlaptop');
    }
    use HasFactory;
}
