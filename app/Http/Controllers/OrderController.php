<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class OrderController extends Controller
{
    public function index(){

        $products = Product::query()
            ->select('id_product','name_product','amount_product','photo_file','commentary')
            ->get();

        return view('order.index',compact('products'));

    }

    public function generate(){        
        return view('order.generate');
    }


    
}
