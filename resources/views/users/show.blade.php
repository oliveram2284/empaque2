@extends ('layouts.app')

@section('content')

<section class="card">
        <div class="card-header">
          <span class="cui-utils-title">
            <strong>Detalle Usuario</strong>      
          </span>
        </div>
        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="l0">Usuario</label>
                <div class="col-md-6">
                    {{$user->username}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="l0">Nombre y Apellido</label>
                <div class="col-md-6">
                    {{$user->full_name}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="l0">Grupo</label>
                <div class="col-md-6">
                    {{$user->grupo}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="l0">Categoria</label>
                <div class="col-md-6">
                    {{$user->categoria}}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                    <a href="{{ route('usuarios.index') }}"  class="btn btn-secondary">Volver</a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <a href="{{ route('usuarios.edit',$user->id) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
            
        </div>
      </section>

@endsection