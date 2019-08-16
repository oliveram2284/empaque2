<div class="modal fade" id="create_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Crear</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('usuarios.add') }}">    
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Usuario</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Usuario" name="nombre" id="l0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Nombre Y Apellido</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Nombre y Apellido" name="nombre_real" id="l0">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Contraseña</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" placeholder="Contraseña" name="contrasenia" id="l0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0">Grupo</label>
                        <div class="col-md-9">                           
                            <select class="form-control" id="l13" name="id_grupo">
                                <option value="">Seleccionar Grupo</option>
                                @foreach ($grupos as $item)
                                    <option value="{{$item->id_grupo}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="l0" >Categoría</label>
                        <div class="col-md-9">
                            <select class="form-control" id="l14" name="catId">
                                <option value="">Seleccionar Categoria</option>
                                @foreach ($categorias as $item)
                                    <option value="{{$item->id}}">{{$item->codigo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" id="save_bt" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>