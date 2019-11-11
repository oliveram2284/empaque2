@extends ('layouts.app')

@section('content')
<section class="card">
    <div class="card-header">
        <span class="cui-utils-title">
        <strong>Alta Pedido</strong>      
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
                            <section class="text-center" id="step-cliente">
              
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
</section>

@include('modals/search_clients');
@include('modals/search_products');
@include('modals/formato_cantidades')

<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    

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
          console.log("====> VALIDATE FORM: %o",currentIndex);          
          console.log("====> VALIDATE FORM: %o",newIndex);          
          return form_validate(currentIndex);
        },
        onFinishing: function (event, currentIndex){
          return form.validate();
        },
        onFinished: function (event, currentIndex){
          alert("Submitted!");
        }
      });   
      
      
      $(document).on('change','input[name="tipo_producto"]',function(e){
      
        console.log("====> TIPO PRODUCTO: %o",$(this).val());
        var disabled=false;
        if($(this).val()=='1'){ //Habitual        
          var _disabled=true;
        }

        //$("#input_producto_codigo").attr("disabled",_disabled);
        $("#input_producto_cod_tango").attr("disabled",_disabled);
        $("#input_producto_nombre").attr("disabled",!_disabled);
        $("#input_producto_motivo").attr("disabled",!_disabled);
        $("#reemplaza_si").attr("disabled",!_disabled);
        $("#reemplaza_no").attr("disabled",!_disabled);
        $("#input_producto_polimero_cliente").attr("disabled",!_disabled);
        $("#input_producto_polimero_empaque").attr("disabled",!_disabled);        

      });
      console.log('====> $(tipo_producto).val()',$('input[name="tipo_producto"]').val());


      var _disabled=false;
      if( $('input[name="tipo_producto"]').val()=='0'){
        var _disabled=true;        
      }

     // $("#input_producto_codigo").attr("disabled",_disabled);
      $("#input_producto_cod_tango").attr("disabled",_disabled);
      $("#input_producto_nombre").attr("disabled",!_disabled);
      $("#input_producto_motivo").attr("disabled",!_disabled);
      $("#reemplaza_si").attr("disabled",!_disabled);
      $("#reemplaza_no").attr("disabled",!_disabled);
      $("#input_producto_polimero_cliente").attr("disabled",!_disabled);
      $("#input_producto_polimero_empaque").attr("disabled",!_disabled);  

      
    });

    $('#input_fechaEntrega').datetimepicker();



    $(document).on('change','#input_producto_formato',function(e){
     
      var formato_id=$(this).val();
      var url= "{{route('ajax_request.campos_obligatorios','')}}";
      url+="/"+formato_id;   
      console.log("===> input_producto_formato formato_id: %o",formato_id);
      $.ajax({
        type:'GET',
        url:url,
        async: false,
        dataType: 'json',
        enctype: 'multipart/form-data',
        cache: false,
        success:function(data){
          if(data.result===undefined){
            return false;
          }
          
          $("#input_producto_origen").attr("readonly",true);
          console.table(data.result);
          
          $.each(data.result,function(index,item){
            console.log("===> item: %o",item); 
            console.log("===> item: %o","#input_producto_"+item); 
            var input = $("#input_producto_"+item);
            console.log("===> item: %o",input.length); 
            switch(item){
              case 'termo':
              case 'micro':
              case 'troquelado':{                    
                input.attr('disabled',false);
                break;
              }
              case 'origen':{
                console.log("===> item: %o","#input_producto_"+item); 
                input.removeAttr('readonly');
                break;
              }
              default:break;
            }
            //input.val(null);
            //input.attr('disabled',true);

          });

        },

      });
      return;
    });



    $(document).on('click',"#input_producto_cantidad",function(e){
      var id_formato=$("#input_producto_formato").val();
      var largo=$("#input_producto_largo").val();
      console.log("====> CANTIDAD CLICKED ");
      console.log("====> id_formato: %o",id_formato);

      if(id_formato==''){
        swal({
          title: "Error!",
          text: "<b>Debe Seleccionar Formato.</b>",
          type: "error",
          html: true,
          confirmButtonText: "Cerrar"
        });
        $("#input_producto_largo").focus();
        return false;
      }

      if(largo.length==0 && parseFloat(largo) == 0 ){
        swal({
          title: "Error!",
          text: "<b>Debe Ingresar Largo de Producto.</b>",
          type: "error",
          html: true,
          confirmButtonText: "Cerrar"
        });
        $("#input_producto_largo").focus();
        return false;
      }

      var url= "{{route('ajax_request.obtener_cantidad','')}}";
      url+="/"+id_formato;       
      var data_ajax={
        type: 'GET',
        url: url,
        beforeSend:function(xhr){
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
        },
        success: function(data) {
          console.log("=DATA: %o",data);  
					if(data.result==null){
						$("#input_producto_cantidad").removeAttr("readonly");
						return false;
					}else{
						$(this).attr("readonly","readonly");
					}

          var largo	= $("#input_producto_largo").val();
          
					var tbody_content="";
					$.each(data.result,function(index, item){
            console.log("== item.largo: %o",item.largo);
            console.log("== largo: %o",largo);
						if(parseFloat(item.largo).toFixed(2)==parseFloat(largo).toFixed(2)){              
							tbody_content +='<tr data-id="'+item.id+'"  data-multiplo="'+item.multiplo+'">';
							tbody_content +='<td><a href="#" data-id="'+item.id+'"  data-multiplo="'+item.multiplo+'" class=""><i class="fa fa-circle-o fa-2x " aria-hidden="true"></i></a></td>';
							tbody_content +='<td>'+item.descripcion+'</td>';
							tbody_content +='<td>'+parseFloat(item.largo).toFixed(1)+'</td>';
							tbody_content +='<td>'+parseFloat(item.ancho).toFixed(1)+'</td>';
							tbody_content +='<td>'+item.multiplo+'</td>';
							tbody_content +='</tr>';
						}
          });
          
					if(tbody_content==''){
						$("#input_producto_cantidad").removeAttr("readonly");
						return false;
          }
          console.log("== tbody_content: %o",tbody_content);
					$("#cantidad_modal #table_cant").find("tbody").html(tbody_content);
					$("#cantidad_modal #table_cant tbody ").find("tr:first-child").trigger("click");
          $("#cantidad_modal").modal("show");

        },
        error:function(){
          console.log("===> error Carga Formato");
        },
        complete:function(){
        	//$("#cantidad_modal").modal("show");
        },
        dataType: 'json'
      };
      $.ajax(data_ajax);

    });

    $(document).on('click',"#cantidad_modal #table_cant tbody tr ",function(e){
      console.log("===> OPTION CLICKED: %o",$(this).find('i').length );
      $("#cantidad_modal tbody tr").removeClass('label label-success');
			$("#cantidad_modal tbody tr i").attr('class','fa fa-circle-o fa-2x ');//  removeClass('label label-success');
			$(this).addClass('label label-success');
			$(this).find('i').attr('class','fa fa-check-circle fa-2x  label label-success');
			var multiplo = $(this).data('multiplo');
			$("#multiplo_cant").val(multiplo);
			$("#input_cant_pop").val(null);
      return false;
    });

    
    $(document).on('keyup',"#cantidad_modal #input_cant_pop",function(e){
			/*if(event.which >= 37 && event.which <= 40) return;
		  $(this).val(function(index, value) {
		    return value
		    .replace(/\D/g, "")
		    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
		    ;
		  });*/
			var cant=$(this).val();
      var multiplo=$("#multiplo_cant").val();
      console.log("====> $(this).val(): %o",$(this).val());
      console.log("====> cant: %o",cant);
      console.log("====> multiplo: %o",multiplo);
			var min=0;
      var max=parseInt(multiplo);
      console.log("====> min: %o",min);
      console.log("====> max: %o",max);
      
			var i=1;
			var flag=false;
			while(!flag){
				min=max;
				max=multiplo*i;
				if(cant>=max){
					i++;
				}else{
					flag=true;
				}
      }
      
      var list_li="";
      /*
			if( cant == min || cant == max ){
					list_li+='<li  class="list-group-item" >';
          //list_li+=' <input type="radio" value="'+cant+'" name="cantidad_opciones[]"> Cantidad Permitida: '+cant;
          list_li+='<label class="cui-utils-control cui-utils-control-radio">First checkbox';
              list_li+='    <input type="radio" name="radio" checked="checked">';
              list_li+='    <span class="cui-utils-control-indicator"></span>';
              list_li+='  </label>';
          list_li+='</li>';
    	}else{
				if(i==1){
					min=0;
				}else{
					list_li+='<li  class="list-group-item"><input type="radio" value="'+min+'" name="cantidad_opciones[]"> Cantidad Permitida : '+min+'</li>';
				}
				list_li+='<li  class="list-group-item" ><input type="radio" value="'+max+'" name="cantidad_opciones[]"> Cantidad Permitida: '+max+'</li>';
      }*/
      if( cant == min || cant == max ){

        list_li+='<li  class="list-group-item" >';
        list_li+='  <label class="cui-utils-control cui-utils-control-radio">  Cantidad Permitida: '+cant;
        list_li+='    <input type="radio" name="radio" name="cantidad_opciones[]" checked="checked" value="'+cant+'">';
        list_li+='    <span class="cui-utils-control-indicator"></span>';
        list_li+='  </label>';
        list_li+='</li>';

      }else{  

        if(i==1){
          min=0;   
				}else{

          list_li+='<li  class="list-group-item" >';
          list_li+='  <label class="cui-utils-control cui-utils-control-radio"> Cantidad Permitida : '+min+'';
          list_li+='    <input type="radio"  name="radio" name="cantidad_opciones[]" value="'+min+'">';
          list_li+='    <span class="cui-utils-control-indicator"></span>';
          list_li+='  </label>';
          list_li+='</li>';

        }

        list_li+='<li  class="list-group-item" >';
        list_li+='  <label class="cui-utils-control cui-utils-control-radio"> Cantidad Permitida: '+max+'';
        list_li+='    <input type="radio" name="radio" name="cantidad_opciones[]" value="'+max+'"  >';
        list_li+='    <span class="cui-utils-control-indicator"></span>';
        list_li+='  </label>';
        list_li+='</li>';
      }
			$(".cant_allowed").empty().append(list_li);

    });
    

    $("#cantidad_modal .btn-primary").click(function(){
			var radios_cants=$("#cantidad_modal .modal-body").find("input[type='radio']:checked");
			console.log("==> radios_cants: %o",radios_cants.length);
			console.log("==> radios_cants: %o",radios_cants.val());
			$(".cant_allowed").find("li.alert-danger").remove();
			if(radios_cants.length==0){
				$(".cant_allowed").append("<li class='alert alert-danger'>Debe seleccionar una cantidad disponible</li>");
				return false;
			}else{
				$(".cant_allowed").find("li.alert-danger").remove();
			}
			$("#input_producto_cantidad").val(radios_cants.val()).focus();
			$("#cantidad_modal").modal("hide");
		});


    
    

   
    function form_validate(step_index){
      var _myForm= $("#formPedidos");
      console.log("====> STEP: %o",step_index);
      var section='';


      switch(step_index){
        case 0:
          //valida datos clientes
          console.log("====> STEP 1 ");
          section='#form-step-cliente-p-0';

          var inputs = $("#formPedidos "+section+" [name]");

          $("#formPedidos "+section+" .form-group").removeClass('has-danger');

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
          break;
        
        case 1:
          console.log("====> STEP 1- ARTICULo ");
          section='#form-step-cliente-p-1';
          var inputs = $("#formPedidos "+section+" [name]");
          $("#formPedidos "+section+" .form-group").removeClass('has-danger');
          console.log("====> inputs",inputs);
          return;
          break;
        
        case 2:
          break;
        
        case 3:
          break;
        default:
          return true;
          break;
      }


     
    }


    

  })(jQuery)
</script>
<!-- END: page scripts -->
@endsection