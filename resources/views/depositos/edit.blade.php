@extends ('layouts.app')

@section('content')

<section class="card">
        <div class="card-header">
          <span class="cui-utils-title">
            <strong>Editar Deposito</strong>      
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
                        <form method="POST" action="{{ route('depositos.update',$deposito) }}">    
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="codigo">Código</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Código" name="codigo" id="codigo" value="{{$deposito->codigo}}">
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="nombre">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" value="{{$deposito->nombre}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="direccion">Dirección</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion" value="{{$deposito->direccion}}">
                                </div>
                            </div>
        

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="localidad">Localidad</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Localidad" name="localidad" id="localidad" value="{{$deposito->localidad}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="provincia">Provincia</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Provincia" name="provincia" id="provincia" value="{{$deposito->provincia}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="telefono">Teléfono</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Teléfono" name="telefono" id="telefono" value="{{$deposito->telefono}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="id_vendedor">Vendedor</label>
                                <div class="col-md-9">
                                    <select  class="form-control" name="id_vendedor" id="id_vendedor">
                                        @foreach ($vendedores as $item)
                                            <option value="{{$item->id}}" "{{($deposito->id_vendedor==$item->id)?'selected':''}}" >{{$item->username}} - {{$item->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="observacion">Observación</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Observación" name="observacion" id="observacion" value="{{$deposito->telefono}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                    <a href="{{ route('depositos.index') }}"  class="btn btn-secondary">Volver</a>
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