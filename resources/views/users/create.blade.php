@extends ('layouts.app')

@section('content')

<section class="card">
        <div class="card-header">
          <span class="cui-utils-title">
            <strong>Formulario Usuario</strong>      
          </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">        
                    <div class="mb-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('usuarios.store') }}">    
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="l0">Usuario</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Usuario" name="name" id="l0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="l0">Nombre Y Apellido</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Nombre y Apellido" name="full_name" >
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="l0">Contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" placeholder="Contraseña" name="password" id="l0">
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
                            <div class="form-group row">
                                <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                    <a href="{{ route('usuarios.index') }}"  class="btn btn-secondary">Volver</a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                    <button type="submit" class="btn btn-primary">Guarda</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>         
        </div>
      </section>

@endsection