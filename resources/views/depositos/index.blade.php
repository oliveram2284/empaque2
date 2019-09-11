
@extends ('layouts.app')

@section('content')
<!-- START: tables/datatables -->
<section class="card">
  <div class="card-header">
    <span class="cui-utils-title">
      <strong>Depositos</strong>      
    </span>   
      <a href="{{route('depositos.create')}}" class="btn btn-primary pull-right" >Nuevo</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">        
        <div class="mb-5">
          <table class="table table-hover table-sm nowrap " id="table_data">
            <thead>
              <tr>
                <th class="text-center">[ x ]</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Localidad</th>
                <th>Provincia</th>
                <th>Teléfono</th>
                <th>Vendedor</th>
                <th>Observación</th>
                <th class="text-center">Acción</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($depositos as $item)
                    <tr>
                        <td class="text-center">{{$item->id_deposito}}</td>
                        <td>{{$item->codigo}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->direccion}}</td>
                        <td>{{$item->localidad}}</td>
                        <td>{{$item->provincia}}</td>
                        <td>{{$item->telefono}}</td>
                        <td>{{$item->vendedor->full_name}}</td>
                        <td>{{$item->observacion}}</td>
                        <td class="text-center">
                            {{--
                            <a class="view_pass_bt btn btn-sm btn-icon btn-primary mr-2" href="{{ route('depositos.show',$item->id_categoria) }}" >
                                <i class="icmn-eye" aria-hidden="true"></i>                            
                            </a> --}}

                            <a class="edit_bt btn btn-sm btn-icon btn-success mr-2" href="{{ route('depositos.edit',$item) }}"  >
                                <i class="icmn-pencil" aria-hidden="true"></i>                            
                            </a>                        
                         

                            <a class="delete_bt btn btn-sm btn-icon btn-danger mr-2 "  href="#"  data-id="{{$item->id_deposito}}">
                                <i class="icmn-bin" aria-hidden="true"></i>                            
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
      $('#table_data').DataTable({
        responsive: true,
        autoWidth: true,
      });

      $(".delete_bt").on('click',function(){
        var id=$(this).data('id');
        console.log("===> id: %o",id);
        var url="{{route('componentes_laminados.delete',1)}}";
        url= url.replace('1',id);
        console.log("===> url: %o",url);
       
        $.ajax({
          url: url,
          type: 'DELETE',  // user.destroy
          success: function(result) {
            location="{{route('componentes_laminados.index')}}"
              // Do something with the result
          }
      });
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

      var url_edit ="{{route('usuarios.update',['id'=>"id"])}}";
      url_ajax=url_ajax.replace('id',id);
      url_edit=url_edit.replace('id',id);

      
      console.log("====> url_ajax: %o",url_ajax);  
      console.log("====> url_edit: %o",url_edit);  
      var data_ajax = {  'dataType': 'json','method': 'GET','url': url_ajax,
        success: function(response) {
          
          if(response.usuario!==undefined){

            $("#create_modal form").attr('action',url_edit);
            $("#create_modal input[name='nombre']").val(response.usuario.nombre);
            $("#create_modal input[name='nombre_real']").val(response.usuario.nombre_real);
            $("#create_modal input[name='contrasenia']").val(response.usuario.contrasenia);
            $("#create_modal select[name='id_grupo'] option[value='"+response.usuario.id_grupo+"']").attr('selected','selected');
            $("#create_modal select[name='catId'] option[value='"+response.usuario.catId+"']").attr('selected','selected');

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
        
        title: "Esta Seguro que desea Eliminar a Este Usuario?",
        text: "Una vez eliminado, no podrá recuperar este Usuario!",
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