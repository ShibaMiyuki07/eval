<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Recu_PV extends Model
{
    protected $fillable = ['idtransfert_point_vente','quantite_recu'];

    protected $table='recu_point_vente';

    protected $primaryKey='idrecu_point_vente';
    protected $keyType='string';
    const UPDATED_AT = null;

    const CREATED_AT = null;

    static function insertion(Request $request)
    {
        Recu_PV::create([
            'idtransfert_point_vente'=>$request->idtransfert_point_vente,
            'quantite_recu'=>$request->qte
        ]);
    }
    use HasFactory;
}
