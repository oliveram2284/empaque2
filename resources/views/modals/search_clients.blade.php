<div class="modal fade" id="search_client_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Buscador Clientes</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                
            </div>
            <div class="modal-body">
                <div class="container-fluid">                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-center" for="l8">Buscar Cliente</label>
                        <div class="col-md-9">
                            <div class="input-group">
                            <input type="text" id="cliente_search_input" class="form-control" placeholder="Buscar Cliente..." id="l8">
                            {{-- 
                                <div class="input-group-append">
                                    <a href="javascript: void(0);" class="btn btn-success btn-sm">
                                    Search files
                                    </a>
                                </div>
                                --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-sm table-bordered">
                            <thead class="thead-dark">
                                <tr class="text-left">
                                    <th scope="col text-center">#</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Razón Social</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                {{-- 
                <input type="submit" id="save_bt" class="btn btn-primary" value="Cerrar">
                --}}
            </div>
        </div>
    </div>
</div>