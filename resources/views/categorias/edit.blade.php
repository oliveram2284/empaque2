@extends ('layouts.app')

@section('content')

<section class="card">
        <div class="card-header">
          <span class="cui-utils-title">
            <strong>Nueva Categoría</strong>      
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
                        <form method="POST" action="{{ route('categorias.update',$categoria) }}">    
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="codigo">Código</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Código" name="codigo" id="codigo" value="{{$categoria->codigo}}">
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="nombre">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" value="{{$categoria->nombre}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="factor">Factor</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Factor" name="factor" id="factor" value="{{$categoria->factor}}">
                                </div>
                            </div>
        
                            
                            
                           
                            <div class="form-group row">
                                <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                    <a href="{{ route('categorias.index') }}"  class="btn btn-secondary">Volver</a>
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