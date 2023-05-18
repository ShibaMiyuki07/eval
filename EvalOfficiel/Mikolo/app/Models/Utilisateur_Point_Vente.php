<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Utilisateur_Point_Vente extends Model
{
    protected $fillable =['idutilisateur','idpoint_vente'];


    protected $table ='utilisateur_point_vente';


    const UPDATED_AT = null;

    const CREATED_AT = null;  

    static function insertion(Request $request)
    {
        DB::table('utilisateur_point_vente')->insert([
            'idutilisateur'=>$request->idutilisateur,
            'idpoint_vente'=>$request->pv
        ]);
    }

    function read()
    {
        return Utilisateur_Point_Vente::all();
    }


    static function selectbyUser($id)
    {
        return Utilisateur_Point_Vente::where('idutilisateur','=',$id)->get();
    }
    function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class,'idutilisateur');
    }

    function point_vente()
    {
        return $this->belongsTo(Utilisateur::class,'idpoint_vente');
    }
    use HasFactory;
}
