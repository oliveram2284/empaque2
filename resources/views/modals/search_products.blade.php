<div class="modal fade" id="search_product_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Buscador Producto</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                
            </div>
            <div class="modal-body">
                <div class="container-fluid">                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-center" for="l8">Buscar Producto</label>
                        <div class="col-md-6">
                            <div class="input-group">
                            <input type="text" id="product_search_input" class="form-control" placeholder="Buscar Producto..." id="l8">
                           
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-sm btn-outline-default active">
                                  <input type="radio" name="busq" value="1" checked>
                                  *
                                </label>
                                <label class="btn btn-sm btn-outline-default  ">
                                    <input type="radio" name="busq" value="2">
                                    + 
                                  </label>
                                  <label class="btn btn-sm btn-outline-default ">
                                    <input type="radio" name="busq" value="3">
                                    -
                                  </label>
                                <label class="btn btn-sm btn-outline-default" >
                                  <input type="radio" name="busq" value="4">
                                  +-
                                </label>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-sm table-bordered">
                            <thead class="thead-dark">
                                <tr class="text-left">
                                    <th scope="col text-center">#</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Artículo</th>
                                    <th scope="col">Código Producto</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>

<!-- START: page scripts -->
<script>
  (function($) {
    'use strict'
    //ABRIR MODAL BUSCADOR ARTICULOS
    $(document).on('click',"#input_producto_codigo ",function(e){
        $("#search_product_modal").modal('show'); 
    });

    //LISTAR PRODUCTOS
    $(document).on('keyup',"#search_product_modal #product_search_input",function(e){
        var value=$(this).val();
        var tipo =$("#search_product_modal input[name='busq']:checked").val();
        console.log("===> tipo: %o",tipo);
        var url= "{{route('ajax_request.buscar_producto',array('',''))}}";
        url+="/"+value+"/"+tipo;       
        var data_ajax = {  'dataType': 'json','method': 'GET',
            'url':url ,
            success: function(response) {                
              var output='';
              if(response.products!=0 && response.products!==undefined){
                console.log("===> ")  
                $.each(response.products,function(index, item){
                    if(index % 2){
                        output+='<tr class="table-success" data-id="'+item.Id+'" data-nombre="'+item.Articulo+'" data-nombrefact="'+item.Nombre_en_Facturacion+'">';
                    }else{
                        output+='<tr class="" data-id="'+item.Id+'" data-id="'+item.Id+'" data-nombre="'+item.Articulo+'" data-nombrefact="'+item.Nombre_en_Facturacion+'">';
                    }
                    output+='<td class="text-center"><a class="btn btn-sm btn-rounded btn-icon btn-success mr-2" ><i class="icmn-checkmark2" aria-hidden="true"></i></a></td>'
                    output+='<th scope="row">'+item.Id+'</th>';
                    output+='<th scope="row">'+item.Articulo+'</th>';
                    output+='<th scope="row">'+item.Nombre_en_Facturacion+'</th>';
                    output+='</tr>';
                });        
              }
              $("#search_product_modal table tbody").empty().html(output);          
              return false;
            },
            error: function(error) {
                console.debug("===> ERROR: %o", error);
            }
          };
          console.log("===> data_ajax: %o", data_ajax);
         $.ajax(data_ajax);
    });     
   
    $(document).on('change',"#search_product_modal input[name='busq']",function(){
        $("#search_product_modal #product_search_input").trigger('keyup');
    });

    $(document).on('click',"#search_product_modal table tr",function(e){

        var producto_id=$(this).data('id');        
        var product_nombre=$(this).data('nombre');        
        var product_nombreFact=$(this).data('nombrefact');   
             
        console.log("====> producto_id: %o",producto_id);       
        
        var url= "{{route('ajax_request.ficha_tecnica','')}}"+"/"+producto_id;     

        var data_ajax = {  
            'dataType': 'json',
            'method': 'GET',
            'url':url ,            
            success: function(response) {      
                console.log("===> FICHA TECNICA: %o",response);    
                $("#form-step-cliente-p-1 input").val(null);
                $("#form-step-cliente-p-1 select").prop('selectedIndex', 0); 

                $("#input_producto_codigo").val(producto_id);
                $("#input_producto_nombre").val(product_nombre);                
                $("#input_producto_cod_tango").val(product_nombreFact);
                
                var articulo=response.articulo;
                var ficha_tecnica_detalle=response.Fichas_Tecnica_Detalle;
                var color="";
                var formato=response.Formato;
                var material=response.Material;
                var first_color=false;

                //Obtiene medidas de Articulo
                if( articulo.Largo!=null && articulo.Largo.length!=0){
                    $("#input_producto_largo").val(parseFloat(articulo.Largo).toFixed(2));
                }

                if(articulo.Ancho !=null){
                    $("#input_producto_ancho").val(parseFloat(articulo.Ancho).toFixed(2));
                }
                if(articulo.Espesor !=null){
                    $("#input_producto_micronaje").val(parseFloat(articulo.Espesor).toFixed(2));
                }

                if (ficha_tecnica_detalle.length < 1) {
                    var output = "<p style='font-size:20px; color:#000000'>El Articulo <b style='color:red'> " + product_nombre + " </b> <br> No posee Ficha Técnica en Mercedario.<br> Por favor, ingrese datos manualmente<p>";
                    swal({
                        title: "Advertencia!",text: output,
                        type: "warning",confirmButtonText: "Ok",html: true
                    });
                    //color = data.Color.Color;
                    return false;
                }


                var cantidad_pistas = null;
                $.each(ficha_tecnica_detalle, function(index, item) {

                    if (item.Id_Unidad_Medida == '200') {
                        $("#input_producto_ancho").val(parseFloat(item.Valor).toFixed(2));                        
                    }
    
                    if (item.Id_Unidad_Medida == '5000') { //.Nombre=='LARGO PT'||item.Nombre=="LARGO  PT"){
                        $("#input_producto_largo").val(parseFloat(item.Valor).toFixed(2));                        
                    }    
    
                    if (item.Id_Unidad_Medida == '40') {    
                        $("#input_producto_micronaje").val(parseFloat(item.Valor).toFixed());
                    }    
    
                    if (item.Nombre == 'FUELLE 1') {
                        $("#input_producto_fuelle").val(item.Valor);
                    }

                    if (item.Id_Unidad_Medida == "80") {
                        color = item.Referencia.replace('-', '').trim();
                    }
    
                    if (item.Nombre == 'CANT. DE PISTAS' || item.Id_Unidad_Medida == "4005") {                        
                        cantidad_pistas = item.Valor;                       
                    }

                });

                switch (producto_id.substring(0, 2)) {
                    case 'L0':
                    case 'T0':{
                            $("#input_producto_micronaje").val(parseFloat(articulo.Espesor).toFixed());
                            $("#input_producto_largo").val(parseFloat(articulo.Largo).toFixed(2));
                            break;
                    }
                    case 'I0':{
                        $("#input_producto_micronaje").val(parseFloat(articulo.Espesor).toFixed());
                        $("#input_producto_largo").val(parseFloat(articulo.Largo).toFixed(2));
                        $("#input_producto_cant_pista").val(cantidad_pistas);    
                        break;
                    } 
                    default:   
                    break;
                }
                //COLOR
                $("#input_producto_color").val(color);

                if (formato != null) {
                    $("#input_producto_formato option[value=" + formato.formato_id + "] ").attr("selected", "selected").trigger("change");
                }

                if (material != null) {
                    $("#input_producto_material option[value=" + material.material_id + "] ").attr("selected", "selected").trigger("change");
                }
                
                $("#search_product_modal table tbody").empty();
                $("#search_product_modal").modal('hide');
                return false;
            },
            error: function(error) {
                console.log("===> ERROR: %o", error);
                swal({
                    title: "Advertencia!",
                    text: error,
                    type: "warning",
                    confirmButtonText: "Ok",
                    html: true
                });
            }
        };
        $.ajax(data_ajax);
        return;
    });

    })(jQuery)
</script>
<!-- END: page scripts -->

