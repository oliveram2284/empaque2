@extends ('layouts.app')

@section('content')

<h2>Ingreso Pedido</h2>
<section class="card">
    <div class="card-header">
       {{-- 
        <span class="cui-utils-title">
        <strong>Ingreso Pedido</strong>      
        </span>
        --}}
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
              <section class="text-center" id="customer_section">

                <fieldset >
                  <legend class="form">Datos Clientes</legend>
                  @include('pedidos/form_sections/cliente_form_partial');
                </fieldset>

              </section>
              
              <h3>
                <i class="fa fa-industry wizard-steps-icon"></i>
                <span class="wizard-steps-title">Artículo</span>
              </h3>
              <section class="text-center">
                <fieldset>
                  <legend class="form">Artículo</legend>
                  @include('pedidos/form_sections/producto_form_partial');  
                </fieldset>
              </section>

              <h3>
                <i class="fa fa-industry wizard-steps-icon"></i>
                <span class="wizard-steps-title">Detalle Pedido</span>
              </h3>
              <section class="text-center">
                @include('pedidos/form_sections/detalle_pedido_form_partial'); 
                
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
          console.log("====> STEP: %o",currentIndex)           
          console.log("====> STEP: %o",newIndex)           
          return true;
          //return true;// form_validate();
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
    /*
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
*/

    

   
    function form_validate(){
      var _myForm= $("#formPedidos");
      var inputs = $("#customer_section  input[name]");
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