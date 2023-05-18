<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Transfert_PV extends Model
{

    protected $fillable=['idlaptop','idpoint_vente','quantite','date_transfert'];

    protected $primaryKey = 'idtransfert_point_vente';

    protected $keyType = 'string';
    const UPDATED_AT = null;

    const CREATED_AT = null;
    protected $table='transfert_point_vente';

    static function insertion(Request $request)
    {
        Transfert_PV::create([
            'idlaptop'=>$request->idlaptop,
            'idpoint_vente'=>$request->idpv,
            'quantite'=>$request->qte
        ]);
    }

    static function read()
    {
         return Transfert_PV::with('laptop')->whereNotIn('idtransfert_point_vente',function($query){
            $query->select('idtransfert_point_vente')->from('recu_point_vente');
        })->get();;
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

