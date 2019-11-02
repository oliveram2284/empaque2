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


<legend class="form">Detalle Artículo</legend>
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

  <div class="row ">  
    <div class="col-3">
      <div class="form-group text-left">
        <label class="form-label" for="input_producto_solapa">Solapa</label>
        <input type="text" id="input_producto_solapa" name="producto['solapa']" class="form-control" placeholder="Solapa"  required>
      </div>
    </div>    
    <div class="col-3">
      <div class="form-group text-left">
        <label class="form-label" for="input_producto_troquelado">Troquelado</label>
        <select id="input_producto_troquelado" name="producto[troquelado]" class="form-control">
          <option value="-1" "Selected">--</option>
          <option value="1">Si</option>
          <option value="0">No</option>
        </select>
      </div>
    </div>       
</div>



<fieldset>
    <legend class="form">Fechas</legend>
    <div class="row">
        <div class="col-3">
            <div class="form-group text-left">
            <label class="form-label" for="input_fechaEmision">Emisión</label>
            <input type="text" id="input_fechaEmision" name="fechaEmision" class="form-control" placeholder="Fecha Emisión" value="{{date('d-m-Y')}}"  readonly >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
            <label class="form-label" for="input_fechaRecp">Recepción</label>
            <input type="text" id="input_fechaRecp" name="fechaRecp" class="form-control" placeholder="Recepción" readonly value="Pendiente" >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
            <label class="form-label" for="input_fechaRecp">Aprobación</label>
            <input type="text" id="input_fechaRecp" name="fechaRecp" class="form-control" placeholder="Recepción" readonly value="Pendiente" >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
            <label class="form-label" for="input_fechaRecp">Entrega</label>
            <input type="text" id="input_fechaRecp" name="fechaRecp" class="form-control" placeholder="Recepción" readonly value="" >
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <legend class="form">Vólumen Pedido</legend>
    <div class="row">
        <div class="col-6">
            <div class="form-group text-left">
                <label class="form-label" for="input_cantidad">Cantidad</label>
                <input type="text" id="input_cantidad" name="cantidad" class="form-control" placeholder="Cantidad" value=""  readonly  >
            </div>
        </div>
        <div class="col-6">
            <div class="form-group text-left">
                <label class="form-label" for="input_cantidad">Unidades</label>
                <select id="input_unidades" name="unidades" class="form-control">
                    <option value="0" selected="selected">Seleccionar Unidad</option>
                    <option value="1">Unidades.</option>	
                    <option value="2">Kgs.</option>									
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_moneda">Moneda</label>
                <select id="input_moneda" name="moneda" class="form-control">
                    <option value="0" "Selected">-</option>
                    <option value="1"> $ </option>
                    <option value="2"> U$D </option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_precio">Precio</label>
                <input type="text" id="input_precio" name="precio" class="form-control" placeholder="Precio" value=""    >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_condicionPago">Impuesto</label>
                <select id="input_condicionPago" name="condicionPago" class="form-control">
                    <option value="0" "Selected">-</option>
                    <option value="1"> +IVA </option>
                    <option value="2"> Exento </option>
                    <option value="3"> Final </option>
                </select>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group text-left">
                <label class="form-label" for="input_precio_origen">Origen Precio</label>
                <select id="input_precio_origen" name="precio_origen" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="1">Acuerdo Cliente</option>
                    <option value="2">Lista de Precios</option>
                    <option value="3">Gerencia</option>
                </select>
            </div>
        </div>
    </div>
</fieldset>
