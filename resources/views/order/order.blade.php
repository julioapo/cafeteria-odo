@extends('layouts.templateapp')

@section('title','Ordene::Inicio')

@section('content')

<div class="products">
    <div class="container">
        <div class="col-md-12 product-w3ls-right">
            <!---728x90--->
            <!-- breadcrumbs -->            
            <ol class="breadcrumb breadcrumb1" style="background-color:#f36a0f" >
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">@include('order.state')</a></li>                
            </ol>            
            <div class="clearfix"> </div>
            <!-- //breadcrumbs -->
            <div class="product-top">
                <h4>Seleccione su Menu</h4>                
                <button class="btn btn-success rounded-pill product-w3ls-right" >Ver/Generar Pedido  <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></button>
                <div class="clearfix"></div>
            </div>
            <!---728x90--->

            <div class="products-row">
                @foreach ($products as $product)
                <div class="col-md-3 product-grids"> 
                    <div class="agile-products">
                        <div class="new-tag"></div>
                        <img src="{{ $product->photo_file }}" class="img-responsive" alt="img">
                        <div class="agile-product-text">              
                            <h5>{{ $product->name_product }}</h5> 
                            <h6>${{ number_format($product->amount_product,2) }}</h6> 
                            <button type="button" class="w3ls-cart btn-additem" value="{{ $product->id_product }}"><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar</button>
                        </div>
                    </div> 
                </div>                    
                @endforeach                
            </div>
            <div class="clearfix"> </div>
            <!---728x90--->				
        </div>
    </div>
    @include('order.cart')
    @include('order.summary')
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/restaurante.js')}}"></script>
@endsection