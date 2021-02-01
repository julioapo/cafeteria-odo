@extends('layouts.tmpcustomer')

@section('css')
<style type="text/css">
    label span {        
        font-size: 1rem;
    }
    
    label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }
    
    input.error {
        border: 1px dashed red;
        font-weight: 300;
        color: red;
    }
</style>
@endsection

@section('title_module','Procese su Pedido')

@section('header_nav1')
    <a href="{{ route('order.index') }}" class="nav-link text-danger">Editar su pedido</a>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Su Orden</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-download"></i></a>
                        <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-bars"></i></a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Acciones</th>
                                <th>Menu</th>
                                <th class="text-center">Cantidad</th>
                                <th>Detalles</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            @foreach (Cart::getContent() as $item)                                
                                <tr>
                                    <td><button type="button" class="btn center-block" onclick=""><i class="fa fa-trash"></i></button></td>                                    
                                    <td>{{$item->name}}</td>
                                    <td class="text-center">{{$item->quantity}}</td>                                    
                                    <td>{{ $item->attributes->co }}  {{$item->attributes->details}}</td>
                                    <td>{{number_format($item->price,2)}}</td>                                    
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <p class="text-right text-danger font-weight-bold">TOTAL DEL PEDIDO: $ {{ number_format(Cart::getSubTotal(),2) }}</p>
                </div>
            </div>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos de Entrega</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-download"></i></a>
                        <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-bars"></i></a>
                    </div>
                </div>
                <form id="generate-order" action="{{ route('order.process_order') }}" method="POST">
                    @if (Auth::check())
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                    @else
                        <input type="hidden" name="id_user" value=""> 
                    @endif                    
                    @csrf
                    <div class="card-body">                
                        <div class="row">
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Nombre</label>
                              @if (Auth::check())
                                <input type="text" class="form-control" placeholder="Enter ..."  value="{{ Auth::user()->name }}" disabled>
                              @else
                                <input type="text" class="form-control" placeholder="Enter ..."  value=""> 
                              @endif
                            </div>
                          </div> 
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Dirección</label>                              
                              @if (Auth::check())
                                <textarea class="form-control" rows="2" name="addres" placeholder="Enter ...">{{ Auth::user()->address }}</textarea>
                              @else
                                <textarea class="form-control" rows="2" name="addres" placeholder="Enter ..."></textarea>
                              @endif                              
                            </div>
                          </div>
                        </div>                        
                        <div class="row">
                            <div class="col-sm-4">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Hora Entrega </label>
                                <input type="time" name="time_delivery" id="time_delivery" class="form-control text-right" placeholder="00:00" style="width: 205px" required>
                              </div>                              
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Forma de Pago</label>
                                    <select name="way_to_pay" class="form-control" required>
                                        <option value="">-- Seleccione --</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="POS">POS</option>                                  
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Cambio?</label>
                                  <input type="text" name="change" class="form-control text-right number" placeholder="$ 0.00">
                                </div>
                              </div> 
                          </div>
                        <div class="row">
                            <div class="col-sm-12">                            
                                <div class="form-group">
                                  <label>Observaciones a su envio?</label>
                                  <textarea class="form-control" name="observation" rows="2" placeholder="Enter ..."></textarea>
                                </div>
                            </div>                            
                        </div>                
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Enviar compra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){   
            $("#generate-order").validate({
                rules: {
                    time_delivery : {
                        required: true
                    }
                },
                messages : {
                    time_delivery: {
                        reqiured: "Debe colocar fecha de entrega"
                    }
                }
            });
            $('input.number').keyup(function(event) {

                // skip for arrow keys
                if(event.which >= 37 && event.which <= 40){
                    event.preventDefault();
                }

                $(this).val(function(index, value) {
                    return value
                        .replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".")
                        ;
                });
            });
        });
    </script>    
@endsection