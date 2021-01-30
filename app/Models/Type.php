<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_type';

    protected $fillable = ['name_type'];

    //relacion uno a muchos en productos
    public function products(){
        return $this->hasMany('App\Models\Product');
    }

}
