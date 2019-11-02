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
                        <div class="col-md-9">
                            <div class="input-group">
                            <input type="text" id="product_search_input" class="form-control" placeholder="Buscar Producto..." id="l8">
                           
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
        var url= "{{route('ajax_request.buscar_producto','')}}";
        url+="/"+value;       
        var data_ajax = {  'dataType': 'json','method': 'GET',
            'url':url ,
            success: function(response) {                
              var output='';
              if(response.products!=0 && response.products!==undefined){
                $.each(response.products,function(index, item){
                    if(index % 2){
                        output+='<tr class="table-success">';
                    }else{
                        output+='<tr>';
                    }
                    output+='<td class="text-center"><a class="btn btn-sm btn-rounded btn-icon btn-success mr-2" data-producto="'+encodeURIComponent(JSON.stringify(item))+'"><i class="icmn-checkmark2" aria-hidden="true"></i></a></td>'
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

    $(document).on('click',"#search_product_modal table tr td a.btn",function(e){    
        var producto=$(this).data('producto');
        var product_data = JSON.parse(decodeURIComponent(producto));
        console.log("====> DATOS PRODUCTO: %o",product_data);

        var url= "{{route('ajax_request.ficha_tecnica','')}}";
        url+="/"+product_data.Id;       
        var data_ajax = {  'dataType': 'json','method': 'GET',
            'url':url ,
            success: function(response) {      

                var articulo=response.articulo;
                var ficha_tecnica_detalle=response.Fichas_Tecnica_Detalle;
                var color="";
                var formato=response.Formato;
                var material=response.Material;
                var first_color=false;

                console.log("===> FICHA TECNICA: %o",response);          
                $("#input_producto_codigo").val(response.articulo.Id);
                $("#input_producto_cod_tango").val(response.articulo.Nombre_en_Facturacion);
                $("#input_producto_nombre").val(product_data.Articulo);
                
                $('#input_producto_formato').prop('selectedIndex',0);
                $("#input_producto_ancho").val(null);
		  	    $("#input_producto_largo").val();
		  	    $("#input_producto_micronaje").val(null);
                $("#input_producto_color").val(null);
                $("#input_producto_fuelle").val(null); 
               
                //Obtiene medidas de Articulo
                if( articulo.Largo !=null){
                    $("#input_producto_largo").val(articulo.Largo);
                }

                if(articulo.Ancho !=null){
                    $("#input_producto_ancho").val(articulo.Ancho);
                }
                if(articulo.Espesor !=null){
                    $("#input_producto_micronaje").val(articulo.Espesor);
                }
                
                $.each(response.Fichas_Tecnica_Detalle,function(index,item){

                    var i=0;
                    if(item.Id_Unidad_Medida=='200'){
                        $("#input_producto_ancho").val(item.Valor);
                        i=1;
                    }  
                    if(item.Id_Unidad_Medida=='5000'){ //.Nombre=='LARGO PT'||item.Nombre=="LARGO  PT"){
                        $("#input_producto_largo").val(item.Valor);
                        i=1;
                    } 
                    //if(item.Nombre=='MICRONAJE 1'){
                    if(item.Id_Unidad_Medida=='40'){
                        $("#input_producto_micronaje").val(item.Valor);
                        i=1;
                    } 
                    if(item.Nombre=='FUELLE 1'){
                        $("#input_producto_fuelle").val(item.Valor);
                        i=1;
                    }  
                    //if(item.Nombre=='COLOR 1' && first_color!=true){
                    if(item.Nombre=='COLOR 1'){
                        color += item.Referencia.replace("[object Object]","")+"  ";
                        i=1;
                        first_color=true;
                    }

                    $("#input_producto_color").val(color);

                    if(formato!=null){
                        $("#input_producto_formato option[value="+formato.formato_id+"] ").attr("selected", "selected");
                        $("#input_producto_formato").trigger("change");
                    }
                    
                    if(material!=null){
                        
                        $("#input_producto_material option[value="+material.material_id+"] ").attr("selected", "selected");
                        $("#input_producto_material").trigger("change");
                    }
  
                });

                $("#search_product_modal").modal('hide');
                return false;
            },
            error: function(error) {
                console.debug("===> ERROR: %o", error);
            }
        };
        console.log("===> data_ajax: %o", data_ajax);
        $.ajax(data_ajax);
        return;
    });

    })(jQuery)
</script>
<!-- END: page scripts -->

