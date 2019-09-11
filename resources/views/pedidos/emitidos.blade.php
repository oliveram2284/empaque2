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
                            <th class="text-center">Recibido</th>
                            <th class="text-center">Rehacer</th>
                            <th class="text-center">Cancelar</th>
                            <th class="text-center">Motivos</th>
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

                                    <a href="#">{{$item->codigo}}</a>
                                  </td>
                                  <td>
                                     
                                    <a href="#"> {{$item->clienteNombre}} </a>
                                  </td>
                                  <td>{{$item->descripcion}}</td>
                                  <td>{{$item->femis}}</td>
                                  <td class="text-center">  
                                    <?php if($item->estado=='I' ):?>
                                      <a class="view_pass_bt btn btn-sm btn-rounded btn-icon btn-success mr-2" href="{{ route('pedidos.emitidos') }}" >
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
                                      <a class="delete_bt btn btn-icon btn-link icmn-cross mr-2 mb-2"  href="{{ route('pedidos.emitidos') }}">
                                                                    
                                      </a>
                                  </td>
                                  <td> 
                                      <a class="view_pass_bt btn btn-icon btn-link icmn-file-text2 mr-2 mb-2" href="{{ route('pedidos.emitidos') }}" >
                                                                  
                                      </a>
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