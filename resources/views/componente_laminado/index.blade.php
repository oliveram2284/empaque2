@extends ('layouts.app')

@section('content')
<!-- START: tables/datatables -->
<section class="card">
  <div class="card-header">
    <span class="cui-utils-title">
      <strong>Componentes Laminados</strong>      
    </span>   
      <a href="{{route('componentes_laminados.create')}}" class="btn btn-primary pull-right" >Nueva</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">        
        <div class="mb-5">
          <table class="table table-hover table-sm nowrap " id="table_users">
            <thead>
              <tr>
                <th class="text-center">[ x ]</th>
                <th>Descripción</th>
                <th class="text-center">Acción</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($componentes_laminados as $item)
                    <tr>
                        <td class="text-center">{{$item->idComponente}}</td>
                        <td>{{$item->descripcion}}</td>
                        <td class="text-center">
                          <!--
                            <a class="view_pass_bt btn btn-sm btn-icon btn-primary mr-2" href="{{ route('componentes_laminados.show',$item->idComponente) }}" >
                                <i class="icmn-eye" aria-hidden="true"></i>                            
                            </a>
                          -->    
                            <a class="edit_bt btn btn-sm btn-icon btn-success mr-2" href="{{ route('componentes_laminados.edit',$item->idComponente) }}"  >
                                <i class="icmn-pencil" aria-hidden="true"></i>                            
                            </a>                        
                         
                           
                            <a class="delete_bt btn btn-sm btn-icon btn-danger mr-2 "  href="#"  data-id="{{$item->idComponente}}">
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
      $('#table_users').DataTable({
        responsive: true,
        autoWidth: true,
      })


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