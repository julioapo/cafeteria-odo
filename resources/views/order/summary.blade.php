<div class="modal fade" id="summary" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Su Pedido...</h4>
            </div>
            <div class="modal-body small">
                <div class="col-sm-12 bg-light">
                    <h4 class="text-center">RESUMEN DE SU COMPRA</h4>
                </div>
                <table id="summary" class="table table-responsive table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>                        
                    </tbody>
                    <tfoot>                        
                    </tfoot>
                </table>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="btn_empty">Vaciar Carrito</button>
                <a href="{{ route('order.generate') }}"><button type="button" id="boton_uno" class="btn btn-primary" >Generar Pedido</button></a>
            </div>           
        </div>
    </div>
</div>