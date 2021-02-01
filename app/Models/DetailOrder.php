<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id','product_id','amount_product','quantity','total_amount','observation_product'
    ];

    //relacion uno a muchos inversa en Ordenes
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    //relacion uno a muchos inversa en Productos
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
