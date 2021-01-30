@extends('layouts.template')

@section('title','Contactanos')

@section('content')
    
    <h1>Dejanos un Mensaje</h1>

    <form action="{{route('contactus.store')}}" method="POST">

        @csrf

        <label>
            Nombre
            <br>
            <input type="text" name="name_visitor">
        </label>
        <br>
        @error('name_visitor')
            <p><strong>{{$message}}</strong></p>
        @enderror

        <label>
            Correo
            <br>
            <input type="text" name="email_visitor">
        </label>
        <br>
        @error('email_visitor')
            <p><strong>{{$message}}</strong></p>
        @enderror

        <label>
            Mensaje
            <br>
            <textarea name="message_visitor" rows="4"></textarea>
        </label>
        <br>
        @error('message_visitor')
            <p><strong>{{$message}}</strong></p>
        @enderror

        <button type="submit">Enviar Mensaje</button>

        
    </form>

    @if (session('info'))
        <script>
            alert('{{session('info')}}')
        </script>
    @endif


@endsection