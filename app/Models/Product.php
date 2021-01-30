<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_product';

    protected $fillable = ['name_product','type_product','amount_product']; //ESTO SERAN LOS CAMPOS A GUARDAR EN UN EVENTO DE ASIGANCION MASIVA

    protected $guarded = ['state_product']; //ESTOS SERIAN LOS CAMPOS PROTEGIDOS NO SE GUARDARAN EN UN EVENTO DE ASIGANCION MASIVA

    /**
     * Get the route key for the model.
     * ESTE METODO SOBRE PONE EL DEL MODEL QUE BUSCA POR ID Y EMPEZARIA A BUSCAR POR EL SLUG
     * ESTO PARA HACER RUTAS AMIGABLES
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relacion uno a muchos inversa en Types
    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    //relacion uno a muchos inversa en Categorys
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //relacion uno a muchos inversa en Types
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    //relacion muchos a muchos
    public function companions(){
        return $this->belongsToMany('App\Models\Companion');
    }

}
