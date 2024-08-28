<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;

    public $timestamps = false;  //updated_at created_at mezők kezelését ez adja


    protected $fillable = [
        'Price_USD',
        'Model',
        'Brand_Id',
        'Case_Material',
        'Strap_Material',
        'Movement_Type',
        'Water_Resistance',
        'Case_Diameter',
        'Case_Thickness',
        'Band_Width',
        'Dial_Color',
        'Crystal_Material',
        'Power_Reserve',
        'id'

        // ami nem kötelező mező azt ki kell kommentelni, nem kötelező az NULL-al van jelölve az adatbázisban
        //vagy éppen itt nem adom meg azokat a mezőket mert úgyis a watchcontroller-ben a store metódusban lesznek validálva

    ];  //mass assignment művelet engedélyezése protected $fillable = [];
      //vagy protected $guarded[]; a második mindent engedályez


    public function brand()
{
    return $this->belongsTo(Brand::class, 'Brand_Id'); //idegenkulcs Brand_id hozzáadja az adatokat
    //return $this->belongsTo(Brand::class);

}

}
