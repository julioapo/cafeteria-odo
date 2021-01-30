@extends('layouts.template')

@section('title','Pagina de Productos::Edit')

@section('content')
    <h1>Aqui Editamos un Producto</h1>
    <form action="{{ route('products.update',$product) }}" method="POST">

        @csrf

        @method('put')

        <label>
            Nombre:
            <input type="text" name="name_product" value="{{old('name_product',$product->name_product)}}">
        </label>

        @error('name_product')
            <br>
                <small>*{{$message}}</small>
            <br>            
        @enderror

        <label>
            <select name="type">Tipo                
                <option value="1" @if($product->type_product == 1) selected @endif >Menu</option>
                <option value="2" @if($product->type_product == 2) selected @endif >Acompañante</option>
            </select>
        </label>

        @error('type')
            <br>
                <small>*{{$message}}</small>
            <br>            
        @enderror

        <label>
            Precio:
            <input type="text" name="amount" value="{{old('amount_product',$product->amount_product)}}">
        </label>

        @error('amount')
            <br>
                <small>*{{$message}}</small>
            <br>            
        @enderror

        <button type="submit">Actualizar</button>

    </form>
@endsection