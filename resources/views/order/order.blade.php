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

@section('title_module','Sus Ordenes')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ordenes activas</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-download"></i></a>
                        <a href="#" class="btn btn-tool btn-sm"><i class="fas fa-bars"></i></a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Dirección envio</th>
                                <th>Monto</th>
                                <th class="text-right">Fecha de Envio</th>
                                <th class="text-right">Hora de entrega</th>
                                <th>Forma de Pago</th>                                
                            </tr>
                        </thead>
                        <tbody> 
                            @php($order = '')     
                            @foreach ($orders as $item)                            
                                @if($order === $item->id_order)
                                    <tr class="collapse order{{ $order }}">
                                        <td></td>
                                        <td>{{$item->name_product}}</td>
                                        <td class="text-right">{{number_format($item->amount_product,2)}}</td>                                        
                                        <td class="text-right">{{ $item->quantity }}</td>
                                        <td class="text-right">{{ number_format($item->quantity*$item->amount_product,2) }}</td>
                                        <td></td>                                       
                                    </tr>
                                @else
                                    @php($order = $item->id_order)
                                    <tr data-toggle="collapse" data-target=".order{{ $order }}">
                                        <td> &gt; {{ $item->id_order }}-{{ $item->way_to_pay }}-{{ $item->deliver_date }}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{number_format($item->amount_order,2)}}</td>
                                        <td class="text-right">{{ \Carbon\Carbon::createFromTimestamp(strtotime($item->deliver_date))->format('d/m/Y') }}</td>
                                        <td class="text-right">{{ \Carbon\Carbon::createFromTimestamp(strtotime($item->deliver_date))->format('H:m:i') }} </td>
                                        <td>{{ $item->way_to_pay }}</td>                                    
                                    </tr>
                                    <tr class="collapse order{{ $order }}">
                                        <td></td>
                                        <td>{{$item->name_product}}</td>
                                        <td class="text-right">{{number_format($item->amount_product,2)}}</td>
                                        <td class="text-right">{{ $item->quantity }}</td>                                        
                                        <td class="text-right">{{ number_format($item->quantity*$item->amount_product,2) }}</td>
                                        <td></td>
                                    </tr>                                              
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>            
        </div>
    </div>    
</div>

@endsection