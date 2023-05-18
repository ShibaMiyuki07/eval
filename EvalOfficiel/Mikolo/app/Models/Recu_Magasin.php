<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Recu_Magasin extends Model
{
    protected $fillable = ['idtransfert_magasin','quantite_recu'];

    protected $table='recu_magasin';

    protected $primaryKey='idrecu_magasin';
    protected $keyType='string';
    const UPDATED_AT = null;

    const CREATED_AT = null;

    static function insertion(Request $request)
    {
        Recu_Magasin::create([
            'idtransfert_magasin'=>$request->idtransfert_magasin,
            'quantite_recu'=>$request->qte
        ]);
    }
    use HasFactory;
}
