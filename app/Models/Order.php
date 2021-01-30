<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_order';

    //relacion uno a muchos en productos
    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    //relacion uno a muchos en productos
    public function detailorder(){
        return $this->hasMany('App\Models\DetailOrder');
    }

}
