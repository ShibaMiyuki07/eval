<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Transfert_Magasin extends Model
{
    protected $fillable=['idlaptop','idpoint_vente','quantite','date_transfert'];

    protected $primaryKey = 'idtransfert_magasin';

    protected $keyType = 'string';
    const UPDATED_AT = null;

    const CREATED_AT = null;
    protected $table='transfert_magasin';

    static function insertion(Request $request)
    {
        Transfert_Magasin::create([
            'idlaptop'=>$request->idlaptop,
            'idpoint_vente'=>$request->pv,
            'quantite'=>$request->qte
        ]);
    }

    static function read()
    {
        return Transfert_Magasin::all();
    }

    static function selectById($idPV)
    {
        return Transfert_Magasin::with('laptop')->where('idpoint_vente',$idPV)->whereNotIn('idtransfert_magasin',function($query){
            $query->select('idtransfert_magasin')->from('recu_magasin');
        })->get();
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
