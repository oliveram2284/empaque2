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
          
                        <form id="formPedidos" action="{{route('pedidos.store')}}" method="POST">
                          @csrf
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
                              <span class="wizard-steps-title">Confirmar Pedido</span>
                            </h3>
                            <section class="text-center">
                              <h3 class="d-none">Title</h3>
                              <p>Desea Confirmar el pedido?</p>
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
@include('modals/formato_etiquetas_cantidades')


<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '< Ant',
      nextText: 'Sig >',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
      };
      $.datepicker.setDefaults($.datepicker.regional['es']);
    
    var campos_obligatorios=null;
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
          $("form").submit();
        }
      });   
      
      
      $('#input_fechaEntrega').datetimepicker({
        locale: 'es',
        icons: {
          time: 'fa fa-clock-o',
          date: 'fa fa-calendar',
          up: 'fa fa-arrow-up',
          down: 'fa fa-arrow-down',
          previous: 'fa fa-arrow-left',
          next: 'fa fa-arrow-right',
        },
        daysOfWeekDisabled: [0, 6],
        useCurrent: false,
        format: 'D-M-Y',
      })

      /*$('.money').mask('000.000.000.000.000,00');
      $('.money2').mask("#.##0,00");*/
      //$('.money').maskMoney({allowNegative: true, decimal:",", thousands:'.'});


      $(document).on('change','input[name="tipo_producto"]',function(e){
        
        var tipo_producto = $(this).val();

        console.log("====> TIPO PRODUCTO: %o",tipo_producto);
        console.log("===> Resetear campos : %o");    
        
        console.log("===> Resetear campos : %o");    
        $("#form-step-cliente-p-1 input:not([name='tipo_producto']").val(null);
        $("#form-step-cliente-p-1 select").prop('selectedIndex', 0); 

      
        var disabled=false;
        if($(this).val()=='1'){ //NUEVO        
          $("#input_producto_nombre,#input_producto_polimero_cliente,#input_producto_motivo,#reemplaza_si,#reemplaza_no").removeAttr('readonly');  
        }else{ //HABITUAL
          $("#input_producto_nombre,#input_producto_polimero_cliente,#input_producto_motivo,#reemplaza_si,#reemplaza_no").attr('readonly',true);  
          
        }
        
        return false; 
        /*//$("#input_producto_codigo").attr("disabled",_disabled);
        $("#input_producto_cod_tango").attr("disabled",_disabled);
        $("#input_producto_nombre").attr("disabled",!_disabled);
        $("#input_producto_motivo").attr("disabled",!_disabled);
        $("#reemplaza_si").attr("disabled",!_disabled);
        $("#reemplaza_no").attr("disabled",!_disabled);
        $("#input_producto_polimero_cliente").attr("disabled",!_disabled);
        $("#input_producto_polimero_empaque").attr("disabled",!_disabled);       */ 

      });
      console.log('====> $(tipo_producto).val()',$('input[name="tipo_producto"]').val());

      /*
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
      */
      
    });

    $('#input_fechaEntrega').datetimepicker();

    $(document).on('change','#input_producto_polimero_cliente',function(e){

      var polim_cli = parseFloat($(this).val());
      var polim_emp = 0;
      if (polim_cli < 100) {
        polim_emp = 100 - polim_cli;
      } else if (polim_cli > 100) {
          polim_cli = 100;
          polim_emp = 0;
      }
      $(this).val(polim_cli);
      console.log("===> Polim_emp",polim_emp)
      console.log("===> polim_cli",polim_cli)
      $("#input_producto_polimero_empaque").val(polim_emp);
      return ;

    });



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
          
          $.each(data.result,function(index,item){
            
            var input = $("#input_producto_"+item);
            switch(item){
              case 'termo':
              case 'micro':
              case 'troquelado':{                    
                input.attr('disabled',false);
                break;
              }
              case 'origen':{
                input.removeAttr('readonly');
                break;
              }
              default:break;
            }

            campos_obligatorios=data.result.responseText;
            //input.val(null);
            //input.attr('disabled',true);

          });

        },

      });

      console.log("====> campos_obligatorios: %o",campos_obligatorios);

      return;
    });


    var obtiene_cantidad_etiqueta = function(){

      var id_formato=$("#input_producto_formato").val();
      var largo=$("#input_producto_largo").val();
      var pistas=$("#input_producto_cant_pista").val();

      var url= "{{route('ajax_request.obtener_etiqueta_cantidad','')}}"+"/"+id_formato;       
      
      console.log("===> url query : %o", url);

      var data_ajax={
        type: 'GET',
        url: url,
        beforeSend:function(xhr){
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
        },
        success: function(data) {

          console.log("=>>> BOBINA: %o", data);

          var tbody_content = "";
          $.each(data.bobinas, function(index, item) {
              console.log("===> index: %o - %o", index, item);

              var total_etiquetas = (parseFloat(item.largo_cm) / parseFloat(largo)) * parseInt(pistas);

              total_etiquetas = total_etiquetas.toFixed();

              tbody_content += '<tr data-id="' + item.id + '"  data-multiplo="' + total_etiquetas + '" data-largo="' + parseFloat(item.largo).toFixed(2) + '">';
              tbody_content += '<td><a href="#" data-id="' + item.id + '"  data-multiplo="' + total_etiquetas + '" class=""><i class="fa fa-circle-o fa-2x " aria-hidden="true"></i></a></td>';
              tbody_content += '<td>' + item.nombre + '</td>';
              tbody_content += '<td>' + parseFloat(item.largo).toFixed(1) + '</td>';
              tbody_content += '<td>' + pistas + '</td>';
              tbody_content += '<td>' + total_etiquetas + '</td>';
              tbody_content += '</tr>';

          });
          console.log("===> tbody_content: %o", tbody_content);

          if (tbody_content == '') {
              $("#input_producto_cantidad").removeAttr("readonly");
              return false;
          }

          $("#table_bobina_cant").find("tbody").html(tbody_content);
          $("#table_bobina_cant tbody").find("tr:first-child").trigger("click");
          $("#etiqueta_cantidad_modal").modal('show');
          return false;

        },
        error:function(){
          console.log("===> error Carga Formato");
        },
        complete:function(){
          console.log("===> complete")
        	//$("#cantidad_modal").modal("show");
        },
        dataType: 'json'
      };
      $.ajax(data_ajax);
      return;
    }
    

    $("#table_cant tbody tr ").on('click', function() {
      console.log("===> OPTION CLICKED: %o", $(this).find('i').length);
      $("#table_cant tbody tr").removeClass('label label-success');
      $("#table_cant tbody tr i").attr('class', 'fa fa-circle-o fa-2x '); //  removeClass('label label-success');
      $(this).addClass('label label-success');
      $(this).find('i').attr('class', 'fa fa-check-circle fa-2x  label label-success');
      var multiplo = $(this).data('multiplo');
      $("#multiplo_cant").val(multiplo);
      $("#input_cant_pop").val(null);
    });

    $(document).on('click',"#table_bobina_cant tbody tr", function() {
      console.log("===> OPTION CLICKED: %o", $(this).find('i').length);
      $("#table_bobina_cant tbody tr").removeClass('label label-success');
      $("#table_bobina_cant tbody tr i").attr('class', 'fa fa-circle-o fa-2x '); //  removeClass('label label-success');
      $(this).addClass('label label-success');
      $(this).find('i').attr('class', 'fa fa-check-circle fa-2x  label label-success');
      var multiplo = $(this).data('multiplo');
      var largo = $(this).data('largo');
      $("#multiplo_etiqueta_cant").val(multiplo);
      $("#largo_etiqueta_cant").val(largo);
      $("#input_cant_etiqueta_pop").val(null);

    });
    

    $(document).on('keyup',"#input_cant_etiqueta_pop", function(event) {
      var multiplo = $("#multiplo_etiqueta_cant").val();
      if(multiplo.length==0){
        swal({
          title: "Advertencia!",
          text: "Debe Seleccionar Una Bobina del Listado",
          type: "warning",
          confirmButtonText: "Ok",
          html: true
      });
      }
      console.log("==> input_cant_etiqueta_pop: %o", $(this).val());      
      //var cant = $(this).val().split('.').join("");
      var cant = $(this).val();      
      var cant = parseInt(cant);            
      var multiplo = $("#multiplo_etiqueta_cant").val();
      
      var min = 0;
      var max = multiplo;
      var i = 1;
      var flag = false;

      while (!flag) {
        min = max;
        max = multiplo * i;
        if (cant >= max) {
          i++;
        } else {
          flag = true;
        }
      }
      console.log("===> i %o", i);
      //medio= multiplo*0.5;
      //medio=medio.toFixed();
      var min_y_medio = parseInt(min) + parseInt(multiplo * 0.5);

      var list_li = "";

      if (cant == min || cant == max) {
          list_li += '<li><input type="radio" value="' + cant + '" name="cantidad_opciones[]"> Cantidad Permitida: ' + cant + '</li>';
      } else if (cant == min_y_medio) {
          list_li += '<li><input type="radio" value="' + cant + '" name="cantidad_opciones[]"> Cantidad Permitida: ' + cant + '</li>';
      } else if (cant < min) {
          list_li += '<li><input type="radio" value="' + min + '" name="cantidad_opciones[]"> Cantidad Permitida : ' + min + '</li>';
      } else if (cant < min_y_medio) {
          list_li += '<li><input type="radio" value="' + min + '" name="cantidad_opciones[]"> Cantidad Permitida : ' + min + '</li>';
          list_li += '<li><input type="radio" value="' + min_y_medio + '" name="cantidad_opciones[]"> Cantidad Permitida : ' + min_y_medio + '</li>';
      } else if (cant < max) {

          list_li += '<li><input type="radio" value="' + min_y_medio + '" name="cantidad_opciones[]"> Cantidad Permitida : ' + min_y_medio + '</li>';
          list_li += '<li><input type="radio" value="' + max + '" name="cantidad_opciones[]"> Cantidad Permitida : ' + max + '</li>';
      }


      console.log("===> list_li %o", list_li);
      $("#etiqueta_cantidad_modal #cant_etiquetas_allowed").empty().append(list_li);
      return false;

    });


    $("#etiqueta_cantidad_modal .btn-primary").click(function() {
      //console.log("Save bt");
      var multiplo = $("#multiplo_etiqueta_cant").val();
      var largo_bobina = parseFloat($("#largo_etiqueta_cant").val());
      var radios_cants = $("#etiqueta_cantidad_modal .modal-body").find("input[type='radio']:checked");
      console.log("====> multiplo: %o", multiplo);
      console.log("====> multiplo: %o", (parseInt(radios_cants.val()) / parseInt(multiplo)));
      var total_bobinas = (parseInt(radios_cants.val()) / parseInt(multiplo)).toFixed(2);
      console.log("Equivale a " + total_bobinas + " Bobinas de " + largo_bobina + " Metros.");
      $("#span_etiqueta").html("Equivale a " + total_bobinas + " Bobinas de " + largo_bobina + " Metros.").css("display", "block");
      console.log("==> radios_cants: %o", radios_cants.length);
      $(".cant_allowed").find("li.alert-danger").remove();
      if (radios_cants.length == 0) {
        $(".cant_etiquetas_allowed").append("<li class='alert alert-danger'>Debe seleccionar una cantidad disponible</li>");
        return false;
      } else {
        $(".cant_etiquetas_allowed").find("li.alert-danger").remove();
      }
      $("#input_producto_cantidad").val(radios_cants.val()).focus();
      $("#etiqueta_cantidad_modal").modal("hide");
    });



    var procesa_cantidades_bolsa = function(){
      var id_formato=$("#input_producto_formato").val();
      var largo=$("#input_producto_largo").val();

      var url= "{{route('ajax_request.obtener_cantidad','')}}"+"/"+id_formato;

      var data_ajax={
        type: 'GET',
        url: url,
        beforeSend:function(xhr){
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
        },
        success: function(data) {
          console.log("=DATA: %o",data);
          
					if(data.result.length<1){
						$("#cantidad").removeAttr("readonly");
						return false;
					}else{
						$(this).attr("readonly","readonly");
          }
          
					var tbody_content="";
					$.each(data.result,function(index, item){
            
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
						$("#cantidad").removeAttr("readonly");
						return false;
					}
					$("#table_cant").find("tbody").html(tbody_content);
					$("#table_cant tbody  ").find("tr:first-child").trigger("click");
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

      return false;
    }

    $(document).on('click',"#input_producto_cantidad",function(e){
      var id_formato=$("#input_producto_formato").val();
      var largo=$("#input_producto_largo").val();
      console.log("====> FORMATO ID y LARGO: %o - %o",id_formato,largo);

      if(id_formato==''||id_formato==0){
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

      if(largo==''||largo==0){
        swal({
          title: "Error!",
          text: "<b>Debe Ingresar Largo Producto.</b>",
          type: "error",
          html: true,
          confirmButtonText: "Cerrar"
        });
        $("#input_producto_largo").focus();          
        return false;
      }

      switch (id_formato) {        
        case '6':{  
          console.log("====>  obtiene_cantidad_etiqueta FORMATO %",id_formato);
          obtiene_cantidad_etiqueta();
          break;
        }
        case '13':
        case '14':
        case '15':{
          console.log("====>  procesa_cantidades_bolsa FORMATO %",id_formato);
          procesa_cantidades_bolsa();
          break;
        }
        default:{
          //alert("Formato Incorrecto:  " + id_formato + "");
          $(this).removeAttr("readonly");         
          break;
        }

      }
      
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
    


    //
    $(document).on('change','#input_caras',function(e){

      var value=$(this).val();
      var disabled=(value=='0');
      
      $("#input_centrada").attr('readonly',disabled);
      $("#input_centrada").attr('disabled',disabled);
      $("#input_tipo").attr('readonly',disabled);
      $("#input_tipo").attr('disabled',disabled);


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
        
        case 1:{
          console.log("====> STEP 1- ARTICULo ");

          section='#form-step-cliente-p-1';
          var producto_tipo=$('input[name="tipo_producto"]:checked').val();

          console.log("====> STEP 1- ARTICULO: %o",producto_tipo);
          var inputs = $("#formPedidos "+section+" [name]");
          $("#formPedidos "+section+" .form-group").removeClass('has-danger');       
          if(producto_tipo==0){
               
            var validation_ok=true;

            $.each(inputs,function(index,item){
              console.log("====> item: %o",item);
              if($(item).attr('required') && (!$(item).attr('readonly') && !$(item).attr('disabled')) &&  $(item).val().length==0){

                $(item).parent('.form-group').addClass('has-danger');   
                swal({
                  title: "Error!",
                  text: "<b>Debe Completar: "+$(item).attr('name').toUpperCase()+".</b>",
                  type: "error",
                  html: true,
                  confirmButtonText: "Cerrar"
                });     
                validation_ok = false;
                return false;
                if( validation_ok ){       
                  validation_ok = false;
                }
              }
            });
            console.log("=====> validation_ok: %o",validation_ok);
            return validation_ok;

          }else{
            console.log("====> Producto Nuevo: %o",producto_tipo);            
            if($("#input_producto_nombre").val().length==0){
              swal({
                title: "Error!",
                text: "<b>Eligio cargar un producto nuevo, <br> entonces debe cargar la descripción de este.</b>",
                type: "warning",
                html: true,
                confirmButtonText: "Cerrar"
              });     
              $("#input_producto_nombre").focus();
              return false;
            }

            if($("#input_producto_motivo").val().length==0){
              swal({title: "Error!",text: "<b>Debe Seleccionar un Motivo.</b>",
                type: "warning",html: true,confirmButtonText: "Cerrar"
              });    
              $("#input_producto_motivo").focus();
              return false; 
            }
            //$('input[name="tipo_producto"]:checked').val()
            if($('input[name="producto[reemplaza]"]').is(':checked') == false){
              swal({title: "Error!",text: "<b>Debe Especificar si Reemplaza al producto Anterior.</b>",
                type: "warning",html: true,confirmButtonText: "Cerrar"
              });  
              $("#reemplaza_si").focus();
              return false;    
            }

            if($('#input_producto_polimero_cliente').val().length==0){
              swal({title: "Error!",text: "<b>Debe debe ingresar porcentaje a cargo.</b>",
                type: "warning",html: true,confirmButtonText: "Cerrar"
              });  
              $("#reemplaza_si").focus();
              return false;    
            }

          }

          if($('#input_fechaEntrega').val().length==0){
            swal({title: "Error!",text: "<b>Debe debe ingresar Fecha de Entrega.</b>",
              type: "warning",html: true,confirmButtonText: "Cerrar"
            });  
            $("#input_fechaEntrega").focus();
            return false;    
          }

          if($('#input_producto_cantidad').val().length==0){
            swal({title: "Error!",text: "<b>Debe debe ingresar Cantidad.</b>",
              type: "warning",html: true,confirmButtonText: "Cerrar"
            });  
            $("#input_fechaEntrega").focus();
            return false;    
          }
          if($('#input_producto_cantidad').val().length==0){
            swal({title: "Error!",text: "<b>Debe debe ingresar Cantidad.</b>",
              type: "warning",html: true,confirmButtonText: "Cerrar"
            });  
            $("#input_fechaEntrega").focus();
            return false;    
          }


          //TODO: VALIDAR OTROS CAMPOS
          
          break;
        }
        case 2:
          var section='#form-step-cliente-p-2';

          console.log("===0> $('#input_caras').val(): %o",$('#input_caras').val());
          console.log("===0> $('#input_caras').val().length: %o",$('#input_caras').val().length );
          if($('#input_caras').val().length==0){
            swal({title: "Error!",text: "<b>Debe debe ingresar Cantidad de Caras.</b>",
              type: "warning",html: true,confirmButtonText: "Cerrar"
            });  
            $("#input_caras").focus();
            return false;    
          }else{

            if($('#input_caras').val()!=0){

              if($('#input_centrada').val().length!=0){
                swal({title: "Error!",text: "<b>Debe Seleccionar Tipo de Impresion.</b>",
                  type: "warning",html: true,confirmButtonText: "Cerrar"
                });  
                $("#input_caras").focus();            
              }


              if($('#input_tipo').val().length!=0){
                swal({title: "Error!",text: "<b>Debe Seleccionar Horientacion.</b>",
                  type: "warning",html: true,confirmButtonText: "Cerrar"
                });  
                $("#input_caras").focus();            
              }

              return false;    

            }
          }



          return true;   
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