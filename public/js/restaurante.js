$(document).ready(function(){
    $('.oculto').hide();
    $('#btn_empty').attr("disabled", true);
    $('#boton_uno').attr("disabled", true);
    $(".btn-additem").click(function(e){
        e.preventDefault();
        $('#product_id').val('');
        $('#name_product').text('');
        $('#detail_product').val('');
        $('#number_order').val('1');
        $('#details_order').val('');
        if($("input[name='radio']:radio").is(':checked')){    
            $(this).checked = false;
        };
        var product_id = $(this).val();
        $.get('http://www.cafeteria-odo.local/products/showProOrd/' + product_id , function (data) {          
            $count_companions = data[0].companions.length;
            $('#product_id').val(data[0].id_product);
            $('#name_product').text(data[0].name_product);
            $('#detail_product').val(data[0].commentary);
            if($count_companions){
                $('.oculto').show();
                $('#is_commpanion').val(1);
                $('#compannios1').text(data[0].companions[0].name_companion);
                $('#radio1').val(data[0].companions[0].name_companion);
                $('#compannios2').text(data[0].companions[1].name_companion);
                $('#radio2').val(data[0].companions[1].name_companion);
                $('#compannios3').text(data[0].companions[2].name_companion);
                $('#radio3').val(data[0].companions[2].name_companion);
            }
        })
        $('#create').modal('show');
    });

    $(".btn-success").click(function(e){
        e.preventDefault();
        var num_rows=0;
        $("#summary>tbody").empty();
        $("#summary>tfoot").empty();                
        $.get('http://www.cafeteria-odo.local/shoppingcart', function (data) {            
            num_rows = data.Count;
            if (num_rows > 0){
                $("#boton_uno").removeAttr('disabled');
                $("#btn_empty").removeAttr('disabled');
            }else{                
                $('#btn_empty').attr("disabled", true);
                $('#boton_uno').attr("disabled", true);
            }
            $.each(data.Items, function(i,item){                
                $('#summary>tbody').append('<tr id="fila'+item.id+'"><td>'+item.name+'</td><td class="text-center">'+item.quantity+'</td><td class="text-right">'+parseFloat(item.price).toFixed(2)+'</td><td><button type="button" class="btn center-block" onclick="del_row('+item.id+');"><i class="fa fa-trash"></i></button></td></tr>');
            })
            $('#summary>tfoot').append('<tr><td class="text-success text-right">Monto Total de Compra:</td><td class="text-right" colspan="2"><p id="amount_total">'+parseFloat(data.Content).toFixed(2)+'</p></td></td><td></td></tr>');
        });
        $('#summary').modal('show');        
    });

    $('#saveBtn').click(function(e){
        e.preventDefault();        
        var product_id = $('#product_id').val();
        var quantity = $('#number_order').val();
        var details_order = '- '+$('#details_order').val();
        if($('#is_commpanion').val()==1){            
            if($("input[name='radio']:radio").is(':checked')){
                var companion = $('input:radio[name=radio]:checked').val();
                $.get('http://www.cafeteria-odo.local/shoppingcart/' + product_id + '/qu/' + quantity + '/de/' + details_order + '/' + companion , function (data) {                                            
                    $('#spanItemsCar').text('Su Pedido '+data.Count);
                })
                $('.oculto').hide();
                $('#create').modal('hide');        
            }else{
                $('.warning').text('Este producto tiene acompañantes debe seleccionar uno');
                return;
            }
        }else{
            $.get('http://www.cafeteria-odo.local/shoppingcart/' + product_id + '/qu/' + quantity + '/de/' + details_order, function (data) {                                        
                $('#spanItemsCar').text('Su Pedido '+data.Count);
            })
            $('.oculto').hide();
            $('#create').modal('hide');
        }        
    });

    $('#btn_empty').click(function(e){
        e.preventDefault();        
        $.get('http://www.cafeteria-odo.local/shoppingcart/emptyproduct' , function (data) {
            $('#spanItemsCar').text('Su Pedido 0');
            $('#btn_empty').attr("disabled", true);
            $('#boton_uno').attr("disabled", true);
            $("#summary>tbody").empty();
            $("#summary>tfoot").empty();
            $('#summary>tfoot').append('<tr><td class="text-success text-right">Monto Total de Compra:</td><td class="text-right" colspan="2"><p id="amount_total">'+parseFloat(0).toFixed(2)+'</p></td></td><td></td></tr>');
        });        
    });
});

function del_row(index){    
    $("#summary>tfoot").empty();
    $("#fila"+index).remove();    
    $.get('http://www.cafeteria-odo.local/shoppingcart/delproduct/' + index, function (data) {
        if (data.count == 0){
            $('#btn_empty').attr("disabled", true);
            $('#boton_uno').attr("disabled", true);
        }
        $('#spanItemsCar').text('Su Pedido '+data.count);
        $('#summary>tfoot').append('<tr><td class="text-success text-right">Monto Total de Compra:</td><td class="text-right" colspan="2"><p id="amount_total">'+parseFloat(data.subtotal).toFixed(2)+'</p></td></td><td></td></tr>');
    }) 
}