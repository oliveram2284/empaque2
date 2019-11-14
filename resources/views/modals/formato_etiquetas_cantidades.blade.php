<div class="modal fade" id="etiqueta_cantidad_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Buscador Producto</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                
            </div>
            <div class="modal-body">
                <div class="container-fluid">                    
                    <table class="table table-bordered" id="table_bobina_cant">
						<thead>
							<tr>
								<th>#</th>
								<th>Descripción</th>
								<th>Largo Desarrollo Bobina</th>
					  			<th>Cantidad de Pistas</th>
								<th>Multiplo de Etiquetas</th>
							</tr>
						</thead>
						<tbody>
			
						</tbody>
					</table>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-center" for="l8">Ingrese Cantidad</label>
                        <div class="col-md-9">
                            
                            <div class="input-group">
                                <input type="text"   id="input_cant_etiqueta_pop" class="form-control input_cant" placeholder="Ingrese Cantidad">
        						<input type="hidden" id="multiplo_etiqueta_cant" >
	    						<input type="hidden" id="largo_etiqueta_cant" >
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                           
                        </div>
					</div>
					<ul id="cant_etiquetas_allowed" class="cant_etiquetas_allowed list-group list-group-flush " data-multi=""></ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Seleccionar</button>
                
            </div>
        </div>
    </div>
</div>