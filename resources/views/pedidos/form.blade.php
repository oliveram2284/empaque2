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
          
          <form>
            <div class="mb-5">
              <div id="example-icons" class="wizard">
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
                        <input type="text" id="input_codigo" name="codigo" class="form-control" placeholder=".col-md-2" value="{{$codigo_pedido}}" readonly >
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_clienteNombre">Cliente</label>
                        <input type="text" id="input_clienteNombre" name="clienteNombre" class="form-control" placeholder=".col-md-2">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_codigoTango">Código Tango</label>
                        <input type="text" id="input_codigoTango" name="codigoTanto" class="form-control" placeholder=".col-md-2">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_clienteDirecc">Dirección</label>
                        <input type="text" id="input_clienteDirecc" name="clienteDirecc" class="form-control" placeholder=".col-md-2">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_clienteTelef">Teléfono</label>
                        <input type="text" id="input_clienteTelef" name="clienteTelef" class="form-control" placeholder=".col-md-2">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="l51">Lugar de Entrega</label>
                        <input type="text" class="form-control" placeholder=".col-md-2">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_clienteCUIT">CUIT</label>
                        <input type="text" id="input_clienteCUIT" name="clienteCUIT" class="form-control" placeholder=".col-md-2">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="l51">Facturar a: </label>
                        <input type="text" class="form-control" placeholder=".col-md-2">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group text-left">
                        <label class="form-label" for="l51">Código Tango</label>
                        <input type="text" class="form-control" placeholder=".col-md-2">
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
            <div id="example-numbers" class="wizard wizard-numbers">
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

      $('#example-icons').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        autoFocus: true,
      })
      $('#example-numbers').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slide  ',
        autoFocus: true,
      })


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
        console.log("====> #search_client_modal #cliente_search_input: %o",value);
        var input = [];
        input.push(value);
        console.log("====> #input: %o",input);
        
        var data_ajax = {  
          'dataType': 'json',
          'method': 'POST',
          'data': { xinput: input },
          'url': url,
          success: function(response) {
            console.log("====> #response: %o",response);
            console.log("====> #response: %o",response.length);
            var output='';
            if(response!=0 && response!==undefined){
              $.each(response,function(index, item){
                console.log("====> #index: %o",index);
                console.log("====> #item: %o",item);
                if(index % 3){
                  output+='<tr class="table-success">';
                }else{
                  output+='<tr>';
                }
                output+='<tr>';
                output+='<td class="text-center"><a class="btn btn-sm btn-rounded btn-icon btn-success mr-2" data-cliente="'+item+'"><i class="icmn-checkmark2" aria-hidden="true"></i></a></td>'
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
    })
  })(jQuery)
</script>
<!-- END: page scripts -->
@endsection