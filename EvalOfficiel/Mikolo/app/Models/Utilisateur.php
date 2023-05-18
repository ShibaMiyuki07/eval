<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Utilisateur extends Model
{
    protected $fillable =['nom','prenom','age','email','mdp'];

    protected $primaryKey='idutilisateur';

    protected $table ='utilisateur';

    protected $keyType = 'string';

    const UPDATED_AT = null;

    const CREATED_AT = null;    
    protected $hidden=['mdp'];
    static function insertion(Request $request)
    {
        Utilisateur::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'age'=>$request->age,
            'email'=>$request->email,
            'mdp'=>$request->mdp
        ]);
    }

    static function read()
    {
        return Utilisateur::whereNotIn('idutilisateur',function($query){
            $query->select('idutilisateur')->from('utilisateur_point_vente');
        })->get();
    }

    static function login(Request $request)
    {
        return Utilisateur::where('email','=',$request->email)->where('mdp','=',$request->password)->get();
    }
    use HasFactory;
}
