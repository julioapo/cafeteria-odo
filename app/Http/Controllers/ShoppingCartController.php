<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use stdClass;

class ShoppingCartController extends Controller
{

    public function addproduct($id,$qu,$de,$co=false)
    {
        $product = Product::find($id);
        Cart::add(
            $product->id_product,
            $product->name_product,
            $product->amount_product,
            $qu,
            array("details"=>$de,"co"=>$co)
        );
        $count_shoppingcart = Cart::getContent()->count();
        $content_shoppingcart = Cart::getContent();
        $object_json = new stdClass();
        $object_json->Count = $count_shoppingcart;
        $object_json->Content = $content_shoppingcart;
        return response()->json($object_json);
    }

    public function showproduct()
    {
        $count_shoppingcart = Cart::getContent()->count();
        $items = Cart::getContent();
        $subTotal = Cart::getSubTotal();
        $object_json = new stdClass();
        $object_json->Count = $count_shoppingcart;
        $object_json->Items = $items;
        $object_json->Content = $subTotal;                
        return response()->json($object_json);        
    }

    public function delproduct($id)
    {
        Cart::remove(['id' => $id]);
        $count_shoppingcart = Cart::getContent()->count();
        $subTotal = Cart::getSubTotal();
        $object_json = new stdClass();
        $object_json->count = $count_shoppingcart;
        $object_json->subtotal = $subTotal;                
        return response()->json($object_json);        
    }

    public function emptyproduct()
    {
        Cart::clear();        
    }

}