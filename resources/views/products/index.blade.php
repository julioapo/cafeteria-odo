@extends('layouts.template')

@section('title','Pagina de Productos::Inicio')

@section('content')
    
    <h1>Bienvenido a la pagina de Productos</h1>

    <a href="{{route('products.create')}}">Crear Producto</a>

    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{route('products.show', $product)}}">{{$product->name_product}}</a>
            </li>
        @endforeach
    </ul>

    {{ $products->links() }}

@endsection