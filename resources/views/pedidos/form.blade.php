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
                <h3 class="d-none">Artículo</h3>
                <div class="row">
                  <div class="col-12">
                      <div id="tipo_producto_selector" class="btn-group special btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-secondary  btn-toggle active" >
                            <input type="radio" class="tipo_producto_hab" name="tipo_producto" id="tipo_producto" value="0"  checked> Habitual
                          </label>
                          <label class="btn btn-secondary btn-toggle" >
                            <input type="radio" class="tipo_producto_nue" name="tipo_producto" id="tipo_producto" value="1" > Nuevo
                          </label>
                      </div>

                  </div>                  
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_producto_codigo">Código</label>
                      <input type="text" id="input_producto_codigo" name="producto[codigo]" class="form-control" placeholder="Código Producto"  required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_producto_cod_tango">Código Tango</label>
                      <input type="text" id="input_producto_cod_tango" name="producto['codigo_tango']" class="form-control" placeholder="Código Tango"  required>
                    </div>
                  </div>                      
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_producto_nombre">Artículo</label>
                      <input type="text" id="input_producto_nombre" name="producto[nombre]" class="form-control" placeholder="Artículo" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_producto_motivo">Motivo</label>
                      <select id="input_producto_motivo" name="producto[motivo]" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value='1' >Nuevo - Completamente</option>
                          <option value='2' >Nuevo - Modificación</option>
                          <option value='3' >Nuevo - Cambia Color</option>
                          <option value='4' >Nuevo - Cambia RENSPA</option>
                          <option value='5' >Nuevo - Otro</option>
                        </select>	
                    </div>
                  </div>
                </div>

                <div class="row">                    
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_producto_cod_tango2"> {{'Reemplaza Anterior Producto ?'}}</label>
                      <div class="btn-group special special2 btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-secondary btn-sm  btn-toggle active">
                            <input type="radio"  id="reemplaza_si" name="producto[reemplaza]" value="0" autocomplete="off" checked> NO
                          </label>
                          <label class="btn btn-secondary btn-sm btn-toggle">
                            <input type="radio" id="reemplaza_no" name="producto[reemplaza]" value="1" autocomplete="off"> SI
                          </label>
                      </div>
                    </div>
                  </div> 
                  <div class="col-3 form-aliceblue">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_producto_polimero_cliente">Polimero a Cargo del Cliente %</label>
                      <input type="text" id="input_producto_polimero_cliente" name="producto[polimero_cliente]" class="form-control" placeholder="Artículo" required>
                    </div>
                  </div>  
                  <div class="col-3 form-aliceblue">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_producto_polimero_empaque">Polimero a Cargo de Empaque % </label>
                        <input type="text" id="input_producto_polimero_empaque" name="producto[polimero_empaque]" class="form-control" placeholder="Artículo" required>
                      </div>
                    </div>                
                </div>
              

                <fieldset>
                  <legend>Descripción Producto</legend>
                  <div class="row">
                    <div class="col-3">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_producto_formato">Formato</label>
                        <select id="input_producto_formato" name="producto[formato]" class="form-control">
                          <option>-</option>
                          @foreach ($formatos as $formato)
                            <option value="{{$formato->idFormato}}"> {{$formato->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_producto_material">Material</label>
                        <select id="input_producto_material" name="producto[material]" class="form-control">
                          <option>-</option>
                          @foreach ($materiales as $material)
                            <option value="{{$material->idMaterial}}"> {{$material->descripcion}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="form-group text-left">
                        <label class="form-label" for="input_producto_color">Color Material</label>
                        <input type="text" id="input_producto_color" name="producto[color_material]" class="form-control" placeholder="Color Material"  required>
                      </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group text-left">
                          <label class="form-label" for="input_producto_origen">Origen</label>
                          <input type="text" id="input_producto_origen" name="producto['origen']" class="form-control" placeholder="Origen"  required>
                        </div>
                      </div>  
                  </div>
                 
                  <div class="row">
                      <div class="col-3">
                        <div class="form-group text-left">
                          <label class="form-label" for="input_producto_ancho">Ancho(cm)</label>
                          <input type="text" id="input_producto_ancho" name="producto[ancho]" class="form-control" placeholder="Color Material"  required>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group text-left">
                          <label class="form-label" for="input_producto_largo">Largo(cm)</label>
                          <input type="text" id="input_producto_largo" name="producto['largo']" class="form-control" placeholder="Origen"  required>
                        </div>
                      </div>       
                      <div class="col-3">
                        <div class="form-group text-left">
                          <label class="form-label" for="input_producto_micronaje">Micronaje(cm)</label>
                          <input type="text" id="input_producto_micronaje" name="producto['micronaje']" class="form-control" placeholder="Origen"  required>
                        </div>
                      </div>  
                      <div class="col-3">
                        <div class="form-group text-left">
                          <label class="form-label" for="input_producto_fuelle">Fuelle</label>
                          <input type="text" id="input_producto_fuelle" name="producto['fuelle']" class="form-control" placeholder="Fuelle"  required>
                        </div>
                      </div>                      
                    </div>

                    <div class="row ml-2 mt-1">
                      <div class="col-3">
                        <div class="form-group row ">
                          <label class="cui-utils-control cui-utils-control-checkbox">Termo
                            <input type="checkbox" id="input_producto_termo" name="producto['termo']">
                            <span class="cui-utils-control-indicator"></span>
                          </label>                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group row ">
                          <label class="cui-utils-control cui-utils-control-checkbox">Microp
                            <input type="checkbox" id="input_producto_micro" name="producto['micro']">
                            <span class="cui-utils-control-indicator"></span>
                          </label>
                          
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group row ml-2 mt-1">
                          <label class="form-label ml-2 mt-1 " for="input_producto_origen">Env/Ven/Lote</label> 
                          <button class="btn btn-sm btn-info ml-2 "><i class="fa fa-ellipsis-h"></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="row ml-2 mt-1">  
                      <div class="col-3">
                        <div class="form-group text-left">
                          <label class="form-label" for="input_producto_largo">Solapa</label>
                          <input type="text" id="input_producto_solapa" name="producto['solapa']" class="form-control" placeholder="Solapa"  required>
                        </div>
                      </div>    
                      <div class="col-3">
                        <div class="form-group text-left">
                          <label class="form-label" for="input_producto_largo">Troquelado</label>
                          <select id="input_producto_material" name="producto[material]" class="form-control">
                            <option value="-1" "Selected">--</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                          </select>
                        </div>
                      </div>       
                    </div>
                </fieldset>

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
                <h3 class="d-none">Datos de Producto</h3>
                <div class="row">
                  <div class="col-6">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>
                  </div>
                  
                </div>
                {{-- 
                <div class="row">
                  <div class="col-6">
                    <div class="form-group text-left">
                      <label class="form-label" for="input_clienteNombre">Código</label>
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
                --}}
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
@include('modals/search_products');


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
          return true;// form_validate();
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

    
      
      

     
      
      //ABRIR MODAL BUSCADOR CLIENTE
      $(document).on('click',"#input_clienteNombre ",function(e){
        $("#search_client_modal").modal('show'); 
      });

      //MODAL BUSCADOR CLIENTE
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
                if(index % 2){
                  output+='<tr class="table-success">';
                }else{
                  output+='<tr>';
                }
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

    //SELECCIONAR CLIENTE
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

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    //SELECCIONAR TIPO PRODUCTO
    $('input[name="tipo_producto"]').change( function() {
      console.log("====> TIPO PRODUCTO: %o",$(this).val());
      var disabled=false;
      if($(this).val()=='1'){ //Habitual        
        disabled=true;
      }

      $("#input_producto_codigo").attr("disabled",disabled);
      $("#input_producto_cod_tango").attr("disabled",disabled);
      $("#input_producto_nombre").attr("disabled",!disabled);
      $("#input_producto_motivo").attr("disabled",!disabled);
      $("#reemplaza_si").attr("disabled",!disabled);
      $("#reemplaza_no").attr("disabled",!disabled);
      $("#input_producto_polimero_cliente").attr("disabled",!disabled);
      $("#input_producto_polimero_empaque").attr("disabled",!disabled);
      

    });

    $(document).on('change','#input_producto_formato',function(e){
      var formato_id=$(this).val();
      console.log("===> formato_id: %o",formato_id);
      
      e.preventDefault();
      $.ajax({
        type:'GET',
        url:'/campos_obligatorios/'+formato_id,
        data:{},
        success:function(data){
          if(data.result===undefined){
            return false;
          }
          $.each(data.result,function(index,item){
            console.log("===> item: %o",item); 
          });
        }

     });

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