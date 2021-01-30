<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_companion';

    protected $fillable = ['name_companion'];

    //relacion mucho a muchos
    public function products(){
        return $this->belongsToMany('\App\Model\Product');
    }

}
