<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class Point_Vente extends Model
{
    protected $fillable = ['emplacement','nom'];

    protected $primaryKey = 'idpoint_vente';
    protected $table='point_vente';
    protected $keyType = 'string';
    const UPDATED_AT = null;

    const CREATED_AT = null;

    static function insertion(Request $request)
    {
        Point_Vente::create([
            'emplacement'=>$request->emplacement,
            'nom'=>$request->nom
        ]);
    }

    static function read()
    {
        return Point_Vente::all();
    }

    static function search(Request $request,$idPv)
    {
        $test = DB::table('laptop_composant_prix_vente')->join('stock_point_vente','stock_point_vente.idlaptop','=','laptop_composant_prix_vente.idlaptop')->select('laptop_composant_prix_vente.*','stock_point_vente.quantite as qte_restante');
        if($request->prix_min)
        {
            $test = $test->where('prix_vente','>=',$request->prix_min);
        }
        if($request->prix_max)
        {
            $test = $test->where('prix_vente','<=',$request->prix_max);
        }
        if($request->reference)
        {
            $test = $test->where('reference','like','%'.$request->reference.'%');
        }
        $test = $test->where('idpoint_vente','=',$idPv);
        return $test->get();
    }
    use HasFactory;
}
