@extends ('layouts.app')

@section('content')
<!-- START: tables/datatables -->
<section class="card">
    <div class="card-header">
        <span class="cui-utils-title">
        <strong>Pedidos Emitidos</strong>      
        </span>
            {{-- 
                <a href="#" class="btn btn-sm btn-icon btn-primary mr-2 pull-right invisible"><i class="icmn-plus" aria-hidden="true"></i> Nuevo item</a>
    
            --}}
        <a href="{{route('pedidos.nuevo')}}" class="btn btn-primary pull-right" >   Nuevo  </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">        
                <div class="mb-5">
                    <table class="table table-hover table-sm nowrap " id="table_pedidos">
                        <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Emisión</th>
                            @if ($isAdmin)
                              <th class="text-center">Editar</th>
                              <th class="text-center">Recibir</th>
                              <th class="text-center">Rehacer</th>
                              <th class="text-center">Cancelar</th>
                              <th class="text-center">Motivos</th>    
                            @else
                            
                              <th class="text-center">Editar</th>
                              <th class="text-center">Motivos</th> 
                            @endif
                            
                        </tr>
                        </thead>
                        <tbody>
                             
                            @foreach ($pedidos as $item)
                            
                              <tr>
                                  <td class="text-center">
                                      <?php if($item->poliNumero!='' ):?>
                                      <a class="view_pass_bt btn btn-sm btn-rounded btn-icon btn-danger" href="#" >
                                        N                            
                                      </a>
                                    <?php endif;?>

                                    <a href="#" class="view_logs_bt" data-id="{{$item->codigo}}" data-url="{{route('pedido.ajax_log',$item->npedido)}}" >{{$item->codigo}}</a>
                                  </td>
                                  <td >                                     
                                    <a href="#"> {{strtoupper($item->clienteNombre)}} </a>
                                  </td>
                                  <td>{{strtoupper($item->Articulo)}}</td>
                                  <td>{{$item->femis}}</td>

                                  @if (($isAdmin))
                                    <td class="text-center">
                                        <a class="view_pass_bt btn btn-sm btn-rounded btn-icon btn-success mr-2" href="{{ route('pedidos.emitidos') }}" >
                                            <i class="icmn-pencil" aria-hidden="true"></i>                            
                                        </a>

                                    </td>
                                    <td class="text-center">  
                                      <?php if($item->estado=='I' ):?>
                                        <a class="view_pass_bt btn btn-sm btn-rounded btn-icon btn-info mr-2" href="{{ route('pedidos.emitidos') }}" >
                                            <i class="icmn-plus" aria-hidden="true"></i>                            
                                        </a>
                                      <?php endif;?>
                                    </td>
                                    <td class="text-center"> 
                                        <?php if($item->estado=='I' ):?>
                                          <a class="view_pass_bt btn btn-sm btn-rounded btn-icon btn-danger mr-2" href="{{ route('pedidos.emitidos') }}" >
                                              <i class="icmn-loop" aria-hidden="true"></i>                            
                                          </a>
                                        <?php endif;?>
                                    </td>
                                    <td class="text-center"> 
                                        <a class="delete_bt btn btn-icon btn-link-red icmn-cross mr-2 mb-2"  href="{{ route('pedidos.emitidos') }}">
                                                                      
                                        </a>
                                    </td>
                                  @else
                                    <td class="text-center">
                                        <a class="view_pass_bt btn btn-sm btn-rounded btn-icon btn-success mr-2" href="{{ route('pedidos.emitidos') }}" >
                                            <i class="icmn-pencil" aria-hidden="true"></i>                            
                                        </a>

                                    </td>
                                  @endif

                                  
                                  <td class="text-center"> 
                                    <?php if($item->logs->count() > 0 ):?>
                                      <a class="view_pass_bt btn btn-icon btn-link-yellow icmn-file-text2 mr-2 mb-2" href="{{ route('pedidos.emitidos') }}" >
                                                                  
                                      </a>
                                    <?php endif;?>
                                  </td>
                                    
                                </tr> 
                            @endforeach
                        
                        </tbody>
                    </table>            
                </div>        
            </div>
        </div>   
    </div>
</section>


<div class="modal" id="modal_view_log" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Log de Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-sm">
            <thead>
              <tr>
                <th> Operacion</th>
                <th> Usuario </th>
                <th> Observación </th>
                <th> Fecha </th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


<!-- END: tables/datatables -->

<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'

    $(function() {
      $('#table_pedidos').DataTable({
        responsive: true,
        autoWidth: true,
      })

      $('#table_pedidos .view_logs_bt').on('click',function(){
          //alert("din");
          var data= $(this).data();
          console.log("===> DATA: %o",data);

          var url_ajax=data.url;
          console.log("===> url: %o",url_ajax);
          var data_ajax = {  'dataType': 'json','method': 'GET','url': url_ajax,
          success: function(response) {
            console.log("===> response: %o",response);

            if(response.result!==undefined){
              var tbody='';
              $.each(response.result,function(index,item){
                console.log("===> DATA: %o",index);
                console.log("===> DATA: %o",item);
                tbody+='<tr>';
                tbody+='';  
                tbody+='<td>'+item.pedidoEstado+'</td>';  
                tbody+='<td>'+item.usuario+'</td>';  
                 
                tbody+='<td>'+item.observacion+'</td>'; 
                tbody+='<td>'+item.logFecha+'</td>';  
                tbody+='</tr>';
              });
              $("#modal_view_log").find("table tbody").empty().html(tbody);
              /*$("#create_modal form").attr('action',url_edit);
              $("#create_modal input[name='nombre']").val(response.usuario.nombre);
              $("#create_modal input[name='nombre_real']").val(response.usuario.nombre_real);
              $("#create_modal input[name='contrasenia']").val(response.usuario.contrasenia);
              $("#create_modal select[name='id_grupo'] option[value='"+response.usuario.id_grupo+"']").attr('selected','selected');
              $("#create_modal select[name='catId'] option[value='"+response.usuario.catId+"']").attr('selected','selected');
              */
              $("#modal_view_log").modal('show');
            }
            

           

          
            return false;

          },
          error: function(error) {
              console.debug("===> ERROR: %o", error);
          }
      };
      console.debug("===> data_ajax: %o", data_ajax);
      $.ajax(data_ajax);
        /*var tbody='';
        $.each(data.logs,function(index,item){
          console.log("===> DATA: %o",index);
          console.log("===> DATA: %o",item);
          tbody+='<tr>';
          tbody+='';  
          tbody+='<td>'+item.'</td>';  
          tbody+='</tr>';
        });*/
        //modal_view_log
       

        return false
      });

     

      



    })
    /*
    $("#save_bt").on('click',function(){      
      $("#create_modal form").trigger('submit');
      return;
    });

    $('.edit_bt').on('click',function(){   
      var id=$(this).data('id');
      console.log("====> id: %o",id);  
      
      var url_ajax="";

      var url_edit ="---- ";
      url_ajax=url_ajax.replace('id',id);
      url_edit=url_edit.replace('id',id);

      
      console.log("====> url_ajax: %o",url_ajax);  
      console.log("====> url_edit: %o",url_edit);  
      var data_ajax = {  'dataType': 'json','method': 'GET','url': url_ajax,
        success: function(response) {
          
          if(response.item!==undefined){

            $("#create_modal form").attr('action',url_edit);
            $("#create_modal input[name='nombre']").val(response.item.nombre);
            $("#create_modal input[name='nombre_real']").val(response.item.nombre_real);
            $("#create_modal input[name='contrasenia']").val(response.item.contrasenia);
            $("#create_modal select[name='id_grupo'] option[value='"+response.item.id_grupo+"']").attr('selected','selected');
            $("#create_modal select[name='catId'] option[value='"+response.item.catId+"']").attr('selected','selected');

            $("#create_modal").modal('show');
          }


         
          return false;

        },
        error: function(error) {
            console.debug("===> ERROR: %o", error);
        }
    };
    console.debug("===> data_ajax: %o", data_ajax);
    $.ajax(data_ajax);




      return false;
    });
    $(".delete_bt").on('click',function(){
      var href=$(this).data('href');
      console.log("====> href: %o",href);

      swal({
        
        title: "Esta Seguro que desea Eliminar a Este item?",
        text: "Una vez eliminado, no podrá recuperar este item!",
        icon: "warning",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Activar'

      },function(result){

        console.log("====> result: %o",result);

        if(result){
          window.location=href;
        }
        
      });

      return false;
    });*/
  })(jQuery)
</script>
<!-- END: page scripts -->

@endsection