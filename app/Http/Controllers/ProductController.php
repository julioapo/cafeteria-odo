<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(){

        $products = Product::orderBy('id_product','desc')->paginate();

        return view('products.index',compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(StoreProduct $request){

        /* $request->validate([
            'name_product' => 'required',
            'type' => 'required',
            'amount' => 'required'
        ]); */
        
        // ESTE ES EL METODO TRADICIONAL DE GUARDAR OBJETOS DESDE LAS VISTA AL MODELO DESDE ESTE CONTROLADOR
        $product = new Product();

        $product->name_product = $request->name_product;
        $product->type_product = $request->type;
        $product->amount_product = $request->amount;
        $product->state_product = 1;
        $product->slug = Str::slug($request->name_product,'-');

        $product->save();

        // ESTE SERIA EL METODO DE "ASIGNACION MASIVA" GENERAL SIN CREAR UN OBJETO
        /* $product = Product::create([
            'name_product' => $request->name_product,
            'type_product' => $request->type,
            'amount_product' => $request->amount,
            'state_product' => 1
        ]); */

        //return $request->all();

        //ESTE SERIA EL METODO DE ASINACION MASIVA REVISAR EN MODELS PARA ENTENDER CREANDO UN OBJETO
        //$product = Product::create($request->all());

        return redirect()->route('products.index');
        
    }
    
    public function show(Product $product){

        return view('products.show',compact('product'));

    }

    public function showProOrd($id){

        $product = Product::with('companions')->where('id_product','=',$id)->get();

        return response()->json($product);
        
    }

    public function edit(Product $product){

        return view('products.edit',compact('product'));

    }

    public function update(Request $request, Product $product){

        $request->validate([
            'name_product' => 'required',
            'type' => 'required',
            'amount' => 'required'
        ]);

        $product->name_product = $request->name_product;
        $product->type_product = $request->type;
        $product->amount_product = $request->amount;

        $product->save();

        return redirect()->route('products.show',compact('product'));

    }

    public function destroy(Product $product){
        
        $product->delete();

        return redirect()->route('products.index');
    }
}
