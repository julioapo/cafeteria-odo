<div class="modal fade" id="create" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4 id="name_product"></h4><span id="warning" class="warning" style="color: #ed1b24"></span>
            </div>
            <div class="modal-body small">
                <form id="productForm" name="productForm" class="form-horizontal">                    
                    <input type="hidden" name="product_id" id="product_id">
                    <input type="hidden" name="is_commpanion" id="is_commpanion" value="0">                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <textarea id="detail_product" name="detail_product" rows="3" class="form-control" disabled></textarea>
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Cantidad</label>
                        <div class="col-sm-12">
                            <input type="number" id="number_order" name="number_order" value="1" min="1" max="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Detalles</label>
                        <div class="col-sm-12">                            
                            <textarea id="details_order" name="details_order" rows="1" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-radio oculto">                        
                        <input type="radio" value="" id="radio1" name="radio">
                        <label class="form-radio-label">
                          <p id="compannios1"></p>
                        </label>
                    </div>
                    <div class="form-radio oculto">
                        <input type="radio" value="" id="radio2" name="radio">
                        <label class="form-radio-label">
                            <p id="compannios2"></p>
                        </label>
                    </div>                    
                    <div class="form-radio oculto">
                        <input type="radio" value="" id="radio3" name="radio">
                        <label class="form-radio-label">
                            <p id="compannios3"></p>
                        </label>                                            
                    </div>                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary center-block" id="saveBtn" value="id_create">Agregar a pedido</button>
                    </div>                    
                </form>                    
            </div>            
        </div>
    </div>
</div>