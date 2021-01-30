@extends('layouts.template')

@section('title','Pagina de Mostrar Producto ::'.$product)

@section('content')
    <h1>Bienvenido a la pagina del Producto: {{ $product->name_product }}</h1>
    <a href="{{ route('products.index') }}">Volver a Productos</a>
    <br>
    <a href="{{ route('products.edit',$product) }}">Editar a Productos</a>
    <p><strong>Tipo:</strong>{{ $product->type_product }}</p>
    <p><strong>Precio:</strong>{{ $product->amount_product }}</p>

    <form action="{{route('products.destroy',$product)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar Producto</button>
    </form>
@endsection