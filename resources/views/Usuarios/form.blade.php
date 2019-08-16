<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Crear</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="/profile">    
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Usuario</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Usuario" id="l0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Nombre Y Apellido</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Nombre y Apellido" id="l0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Contraseña</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" placeholder="Contraseña" id="l0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Grupo</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" placeholder="Grupo" id="l0">
                            Form::select('size', grupos);
                            <select class="form-control" id="l13">
                                <?phg
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Categoría</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" placeholder="Categoría" id="l0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>