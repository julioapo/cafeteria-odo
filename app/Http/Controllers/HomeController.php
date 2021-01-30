<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /* public function __construct()
    {
        $this->middleware('auth');
    } */


    public function __invoke(){        
        //
    }

    public function index()
    {
        $today_menu = Product::query()->select('name_product','amount_product','photo_file','commentary')
        ->where('type_id',1)->where('product_day',1)->get();
        return view('home',compact('today_menu'));
    }
}
