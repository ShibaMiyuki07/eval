<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Disque_Dur extends Model
{
    protected $fillable=['capacite','idmarque'];

    protected $primaryKey = 'iddisque_dur';

    protected $keyType='string';
    protected $table='disque_dur';
    const UPDATED_AT = null;

    const CREATED_AT = null;

    static function insertion(Request $request)
    {
        Disque_Dur::create([
            'idmarque'=>$request->marque,
            'capacite'=>$request->capacite
        ]);
    }

    static function read()
    {
        return Disque_Dur::all();
    }

    function marque()
    {
        return $this->belongsTo(Marque::class,'idmarque');
    }
    use HasFactory;
}
