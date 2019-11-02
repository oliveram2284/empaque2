<div class="modal fade" id="search_client_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Buscador Clientes</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                
            </div>
            <div class="modal-body">
                <div class="container-fluid">                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-center" for="l8">Buscar Cliente</label>
                        <div class="col-md-9">
                            <div class="input-group">
                            <input type="text" id="cliente_search_input" class="form-control" placeholder="Buscar Cliente..." id="l8">
                            {{-- 
                                <div class="input-group-append">
                                    <a href="javascript: void(0);" class="btn btn-success btn-sm">
                                    Search files
                                    </a>
                                </div>
                                --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-sm table-bordered">
                            <thead class="thead-dark">
                                <tr class="text-left">
                                    <th scope="col text-center">#</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Razón Social</th>
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
                {{-- 
                <input type="submit" id="save_bt" class="btn btn-primary" value="Cerrar">
                --}}
            </div>
        </div>
    </div>
</div>


<!-- START: page scripts -->
<script>
    (function($) {
    'use strict'
        console.log("=====> LOAD MODAL VIEW SEARCH CLIENTS <====");

        //ABRIR MODAL BUSCADOR CLIENTE
        $(document).on('click',"#input_clienteNombre ",function(e){
            $("#search_client_modal").modal('show'); 
        });

        //MODAL BUSCADOR CLIENTE
        $(document).on('keyup',"#search_client_modal #cliente_search_input",function(e){
            var value=$(this).val();
            /*var url='http://58d70548161e.sn.mynetname.net:301/empaque_demo/buscarCliente.php';
            var input = [];
            input.push(value);   */    
            
            var value=$(this).val();
            var url= "{{route('ajax_request.buscar_clientes','')}}";
            url+="/"+value;           
            var data_ajax = {  
                'dataType': 'json',
                'method': 'GET',
                'url': url,
                success: function(response) {
                    var output='';
                    if(response!=0 && response !== undefined){
                    $.each(response.clients,function(index, item){
                        if(index % 2){
                            output+='<tr class="table-success">';
                        }else{
                            output+='<tr data-cliente="'+encodeURIComponent(JSON.stringify(item))+'" >';
                        }
                        output+='<td class="text-center"><a class="btn btn-sm btn-rounded btn-icon btn-success mr-2" ><i class="icmn-checkmark2" aria-hidden="true"></i></a></td>'
                        output+='<th scope="row">'+item.cod_client+'</th>';
                        output+='<td>'+item.razon_soci+'</td>'
                        output+='</tr>';
                    });              
                    }
                    $("#search_client_modal table tbody").empty().html(output);          
                    return false;
                },
                error: function(error) {
                    console.debug("===> ERROR: %o", error);
                }
            };
            $.ajax(data_ajax);
        });

        //SELECCIONAR CLIENTE
        $(document).on('click',"#search_client_modal table tr",function(e){      
            var cliente_data=$(this).data('cliente');
            var data = JSON.parse(decodeURIComponent(cliente_data));
            $("#form-step-cliente input[name='clienteNombre']").val(data.razon_soci);
            $("#form-step-cliente input[name='codigoTanto']").val(data.cod_client);
            $("#form-step-cliente input[name='clienteDirecc']").val(data.domicilio);
            $("#form-step-cliente input[name='clienteTelef']").val(data.telefono_1);
            $("#form-step-cliente input[name='clienteCUIT']").val(data.cuit);
            $("#form-step-cliente input[name='codigoTangoFacturar']").val(data.razon_soci);
            $("#search_client_modal").modal('hide');
            return false;
        });

    })(jQuery)
</script>
<!-- END: page scripts -->