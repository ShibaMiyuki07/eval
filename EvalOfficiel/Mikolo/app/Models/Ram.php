<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Ram extends Model
{
    protected $fillable=['frequence','capacite'];

    protected $primaryKey = 'idram';

    protected $keyType='string';

    const UPDATED_AT = null;

    const CREATED_AT = null;
    protected $table='ram';

    static function insertion(Request $request)
    {
        Ram::create([
            'frequence'=>$request->frequence,
            'capacite'=>$request->valeur
        ]);
    }

    static function read()
    {
        return Ram::all();
    }
    use HasFactory;
}
