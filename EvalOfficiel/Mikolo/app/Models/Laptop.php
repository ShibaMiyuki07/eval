<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Laptop extends Model
{
    protected $fillable=['idmarque','idprocesseur','idram','idecran','iddisque_dur','reference','prix_achat'];

    protected $primaryKey = 'idlaptop';

    const UPDATED_AT = null;

    const CREATED_AT = null;
    protected $keyType='string';
    protected $table='laptop';

    static function insertion(Request $request)
    {
        Laptop::create([
            'idmarque'=>$request->idmarque,
            'idprocesseur'=>$request->idproc,
            'idram'=>$request->idram,
            'idecran'=>$request->idecran,
            'iddisque_dur'=>$request->iddisque_dur,
            'reference'=>$request->reference,
            'prix_achat'=>$request->prix
        ]);
    }

    static function read()
    {
        return Laptop::all();
    }

    function marque()
    {
        return $this->belongsTo(Marque::class,'idmarque');
    }

    function processeur()
    {
        return $this->belongsTo(Processeur::class,'idprocesseur');
    }

    function ecran()
    {
        return $this->belongsTo(Ecran::class,'idecran');
    }

    function disque_dur()
    {
        return $this->belongsTo(Disque_Dur::class,'iddisque_dur');
    }

    function ram()
    {
        return $this->belongsTo(Ram::class,'idram');
    }
    use HasFactory;
}
