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