<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Ecran extends Model
{
    protected $fillable = ['caracteristique','frequence'];
    protected $keyType = 'string';
    protected $primaryKey='idecran';
    protected $table='ecran';

    const UPDATED_AT = null;

    const CREATED_AT = null;

    static function insertion(Request $request)
    {
        Ecran::create([
            'caracteristique'=>$request->caracteristique,
            'frequence'=>$request->frequence
        ]);
    }

    static function read()
    {
        return Ecran::all();
    }
    use HasFactory;
}
