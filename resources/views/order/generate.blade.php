@extends('layouts.templatecustomer')

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
                <div class="card-body">
                    <form>
                        <div class="row">
                          <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Nombre</label>
                              <input type="text" class="form-control" placeholder="Enter ...">
                            </div>
                          </div> 
                          <div class="col-sm-6">                            
                            <div class="form-group">
                              <label>Dirección</label>
                              <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                            </div>
                          </div>
                        </div>                        
                        <div class="row">
                            <div class="col-sm-4">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Hora Entrega</label>
                                <input type="text" class="form-control text-right" placeholder="00:00" style="width: 205px">
                              </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Forma de Pago</label>
                                    <select class="form-control">
                                        <option>-- Seleccione --</option>
                                        <option>Efectivo</option>
                                        <option>POS</option>                                  
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Cambio?</label>
                                  <input type="text" class="form-control text-right" placeholder="$ 0.00">
                                </div>
                              </div> 
                          </div>
                        <div class="row">
                            <div class="col-sm-12">                            
                                <div class="form-group">
                                  <label>Observaciones a su envio?</label>
                                  <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                                </div>
                            </div>                            
                        </div>
                      </form>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success" id="btn_empty">Enviar compra</button>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection