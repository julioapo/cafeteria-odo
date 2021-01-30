@extends('layouts.template')

@section('title','Pagina de Productos::Create')

@section('content')
    <h1>Aqui prodriamos crear un Producto</h1>
    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <label>
            Nombre:
            <input type="text" name="name_product" value="{{old('name_product')}}">
        </label>

        @error('name_product')
            <br>
                <small>*{{$message}}</small>
            <br>            
        @enderror

        <label>
            <select name="type">Tipo
                <option value="">-- Seleccione --</option>
                <option value="1">Menu</option>
                <option value="2">Acompañante</option>
            </select>
        </label>

        @error('type')
            <br>
                <small>*{{$message}}</small>
            <br>            
        @enderror

        <label>
            Precio:
            <input type="text" name="amount" value="{{old('amount')}}">
        </label>

        @error('amount')
            <br>
                <small>*{{$message}}</small>
            <br>            
        @enderror

        <button type="submit">Guardar</button>

    </form>
@endsection