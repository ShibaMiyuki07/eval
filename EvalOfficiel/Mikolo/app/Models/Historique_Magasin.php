<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Historique_Magasin extends Model
{
    protected $fillable=['idlaptop','quantite'];

    protected $primaryKey = null;
    const UPDATED_AT = null;

    const CREATED_AT = null;
    protected $table='historique_entree_magasin';

    static function insertion(Request $request)
    {
        DB::table('historique_entree_magasin')->insert([
            'idlaptop'=>$request->idlaptop,
            'quantite'=>$request->qte
        ]);
    }

    static function read()
    {
        return Historique_Magasin::all();
    }

    function laptop()
    {
        return $this->belongsTo(Laptop::class,'idlaptop');
    }
    use HasFactory;
}
