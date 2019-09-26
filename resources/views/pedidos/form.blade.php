@extends ('layouts.app')

@section('content')
<h2>Ingreso Pedido</h2>
<section class="card">
    <div class="card-header">
        <span class="cui-utils-title">
        <strong>Ingreso Pedido</strong>      
        </span>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          
          <form id="formPedidos" >
            
            <div id="form-step-cliente" class="wizard "mb-5"">
              <h3>
                <i class="icmn-user wizard-steps-icon"></i>
                <span class="wizard-steps-title">Datos Clientes</span>
              </h3>
              <section class="text-center">
                <h3 class="d-none">Datos Clientes</h3>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_codigo">Nº Pedido</label>
                      <input type="text" id="input_codigo" name="codigo" class="form-control" placeholder="Nº Pedido" value="{{$codigo_pedido}}" readonly >
                    </div>
                  </div>                    
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_clienteNombre">Cliente</label>
                      <input type="text" id="input_clienteNombre" name="clienteNombre" class="form-control" placeholder="Cliente"  required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_codigoTango">Código Tango</label>
                      <input type="text" id="input_codigoTango" name="codigoTanto" class="form-control" placeholder="Código Tango" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_clienteDirecc">Dirección</label>
                      <input type="text" id="input_clienteDirecc" name="clienteDirecc" class="form-control" placeholder="Dirección"  >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_clienteTelef">Teléfono</label>
                      <input type="text" id="input_clienteTelef" name="clienteTelef" class="form-control" placeholder="Teléfono"   >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_lugarEntrega">Lugar de Entrega</label>
                        <input type="text" id="input_lugarEntrega" name="lugarEntrega" class="form-control" placeholder="Lugar de Entrega" required>
                      
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_clienteCUIT">CUIT</label>
                      <input type="text" id="input_clienteCUIT" name="clienteCUIT" class="form-control" placeholder="CUIT"  required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_facturarANombre">Facturar a: </label>
                      <input type="text" id="input_facturarANombre" name="facturarANombre" class="form-control" placeholder="Facturar a:" >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_codigoTangoFacturar">Código Tango</label>
                      <input type="text"  id="input_codigoTangoFacturar" name="codigoTangoFacturar" class="form-control" placeholder="Código Tango" >
                    </div>
                  </div>
                </div>                  
                
              </section>
              <h3>
                <i class="fa fa-industry wizard-steps-icon"></i>
                <span class="wizard-steps-title">Datos Productos</span>
              </h3>
              <section class="text-center">
                <h3 class="d-none">Title</h3>
                <p>Wonderful transition effects.</p>
              </section>
              <h3>
                <i class="icmn-checkmark wizard-steps-icon"></i>
                <span class="wizard-steps-title">Confirmation</span>
              </h3>
              <section class="text-center">
                <h3 class="d-none">Title</h3>
                <p>The next and previous buttons help you to navigate through your content.</p>
              </section>
            </div>
            
          </form>
        </div>
        <div class="col-lg-6 invisible">
          <h5 class="text-black"><strong>Form Wizard w/ Numbers</strong></h5>
          <p class="text-muted">
            Element: read
            <a href="http://www.jquery-steps.com/" target="_blank"
              >official documentation<small
                ><i class="icmn-link ml-1"><!-- --></i></small
              ></a
            >
          </p>
          <div class="mb-5">
            <div id="form-step-producto" class="wizard wizard-numbers">
              <h3>
                <span class="wizard-steps-title">Account Info</span>
              </h3>
              <section class="text-center">
                <h3 class="d-none">Title</h3>
                <p>Try the keyboard navigation by clicking arrow left or right!</p>
              </section>
              <h3>
                <span class="wizard-steps-title">Billing Info</span>
              </h3>
              <section class="text-center">
                <h3 class="d-none">Title</h3>
                <p>Wonderful transition effects.</p>
              </section>
              <h3>
                <span class="wizard-steps-title">Confirmation</span>
              </h3>
              <section class="text-center">
                <h3 class="d-none">Title</h3>
                <p>The next and previous buttons help you to navigate through your content.</p>
              </section>
            </div>
          </div>
        </div>
      </div>
      </div>         
    </div>
</section>

@include('modals/search_clients');


<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'
    $(function() {      

      var labels= {
        cancel: "Cancelar",
        current: "Paso Actual:",
        pagination: "Paginación",
        finish: "Guardar",
        next: "Siguiente",
        previous: "Volver",
        loading: "Cargando ..."
      }
     
      var form = $("#formPedidos");      
      form.children('div').steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        labels:labels,
        onStepChanging: function (event, currentIndex, newIndex){              
          return form_validate();
        },
        onFinishing: function (event, currentIndex){
          return form.validate();
        },
        onFinished: function (event, currentIndex){
          alert("Submitted!");
        }
      });
      /*var form = $("#formPedidos");
      form.validate({
          errorPlacement: function errorPlacement(error, element) { element.before(error); },
          rules: {
              confirm: {
                  equalTo: "#password"
              }
          }
      });
      form.children('#form-step-cliente').steps({
          headerTag: "h3",
          bodyTag: "section",
          transitionEffect: "slideLeft",
          onStepChanging: function (event, currentIndex, newIndex)
          {
              form.validate().settings.ignore = ":disabled,:hidden";
              return form.valid();
          },
          onFinishing: function (event, currentIndex)
          {
              form.validate().settings.ignore = ":disabled";
              return form.valid();
          },
          onFinished: function (event, currentIndex)
          {
              alert("Submitted!");
          }
      });*/
      /*
      $('#form-step-cliente').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        autoFocus: true,
        labels:labels
      })*/
     /* $('#form-step-producto').steps({

        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        autoFocus: true,
        labels:labels
      })*/
      /*
      $('#form-step-producto').steps({

        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        autoFocus: true,
        labels:labels
      })*/

      //buscador Cliente AUTO COMPLETE
     /* $.typeahead({
        input: ".js-typeahead",
        order: "asc",
        source: {
            groupName: {
                // Ajax Request
                ajax: {
                    url: "..."
                }
            }
        },
        callback: {
            onClickBefore: function () { ... }
        }
      });*/


      $('#input_clienteNombre').on('click',function(){
        $("#search_client_modal").modal('show'); 
      });

      $(document).on('keypress',"#search_client_modal #cliente_search_input",function(e){
        var value=$(this).val();
        var url='http://58d70548161e.sn.mynetname.net:301/empaque_demo/buscarCliente.php';
        var input = [];
        input.push(value);        
        var data_ajax = {  
          'dataType': 'json',
          'method': 'POST',
          'data': { xinput: input },
          'url': url,
          success: function(response) {
            var output='';
            if(response!=0 && response!==undefined){
              $.each(response,function(index, item){
                if(index % 3){
                  output+='<tr class="table-success">';
                }else{
                  output+='<tr>';
                }
                output+='<tr>';
                output+='<td class="text-center"><a class="btn btn-sm btn-rounded btn-icon btn-success mr-2" data-cliente="'+encodeURIComponent(JSON.stringify(item))+'"><i class="icmn-checkmark2" aria-hidden="true"></i></a></td>'
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
        console.log("===> data_ajax: %o", data_ajax);
       $.ajax(data_ajax);
      });
    });

    $(document).on('click',"#search_client_modal table tr td a.btn",function(e){
      
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
   



    function form_validate(){
      var _myForm= $("#formPedidos");
      var inputs = $("#formPedidos [name]");
      $("#formPedidos .form-group").removeClass('has-danger');
      var validation_ok = true;
      for (var i = 0; i < inputs.length; i++) {
        var an_input = inputs[i]; 

        if($(an_input).attr('required') && $(an_input).val().length==0){
          $(an_input).parent('.form-group').addClass('has-danger');
          if( validation_ok ){
            validation_ok = false;
          }
        }
      }

      return validation_ok;
    }
  })(jQuery)
</script>
<!-- END: page scripts -->
@endsection