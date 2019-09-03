@extends ('layouts.app')

@section('content')

<section class="card">
        <div class="card-header">
          <span class="cui-utils-title">
            <strong>Nuevo Componente Laminado</strong>      
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
                       
                        <form method="POST" action="{{ route('componentes_laminados.update',$compLaminado->idComponente) }}">    
                            @csrf 
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="descripcion">Descripción</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" id="descripcion" value="{{ $compLaminado->descripcion }}">
                                </div>
                            </div>                          
        
                            
                            
                           
                            <div class="form-group row">
                                <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                    <a href="{{ route('componentes_laminados.index') }}"  class="btn btn-secondary">Volver</a>
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