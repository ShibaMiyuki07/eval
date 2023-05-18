<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Processeur extends Model
{
    protected $fillable = ['idmarque','caracteristique'];

    protected $primaryKey = 'idprocesseur';
    protected $table='processeur';
    protected $keyType = 'string';
    const UPDATED_AT = null;

    const CREATED_AT = null;

    static function insertion(Request $request)
    {
        Processeur::create([
            'idmarque'=>$request->marque,
            'caracteristique'=>$request->caracteristique
        ]);
    }

    static function read()
    {
        return Processeur::all();
    }

    function marque()
    {
        return $this->belongsTo(Marque::class,'idmarque');
    }
    use HasFactory;
}
