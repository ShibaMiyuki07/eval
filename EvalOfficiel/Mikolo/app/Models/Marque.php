<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Marque extends Model
{
    protected $fillable = ['marque'];
    protected $primaryKey='idmarque';
    protected $table='marque';
    protected $keyType = 'string';
    const UPDATED_AT = null;

    const CREATED_AT = null;
    static function insertion(Request $request)
    {
        Marque::create([
            'marque'=>$request->marque
        ]);
    }

    static function read()
    {
        return Marque::all();
    }
    use HasFactory;
}
