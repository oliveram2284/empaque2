@extends ('layouts.app')

@section('content')
<!-- START: tables/datatables -->
<section class="card">
  <div class="card-header">
    <span class="cui-utils-title">
      <strong>Grupos de Usuarios</strong>      
    </span>
    <a href="#" class="btn btn-sm btn-icon btn-primary mr-2 pull-right"><i class="icmn-plus" aria-hidden="true"></i> Nuevo Grupo Usuario</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-12">        
        <div class="mb-5">
          <table class="table table-hover table-sm nowrap " id="table_users">
            <thead>
              <tr>
                <th>[]</th>
                <th>Nombre</th>
                <th>Es Administrador?</th>
                <th class="text-center">Acción</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($grupos as $grupo):?>
                    <tr>
                        <td><?php echo $grupo->id_grupo;?></td>
                        <td><?php echo $grupo->descripcion;?></td>
                        <td><?php echo ($grupo->administrador=='0')?'NO':'SI';?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-icon btn-success  mr-2">
                                <i class="icmn-pencil" aria-hidden="true"></i>                            
                            </a>
                            <a class="btn btn-sm btn-icon btn-danger mr-2 ">
                                <i class="icmn-bin" aria-hidden="true"></i>                            
                            </a>

                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
   
  </div>
</section>
<!-- END: tables/datatables -->

<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'
    $(function() {
      $('#table_users').DataTable({
        responsive: true,
        autoWidth: true,
        //scrollX: true,
        //fixedColumns: true,
      })
/*
      $('#example2').DataTable({
        autoWidth: true,
        scrollX: true,
        fixedColumns: true,
      })

      $('#example3').DataTable({
        autoWidth: true,
        scrollX: true,
        fixedColumns: true,
      })*/
    })
  })(jQuery)
</script>
<!-- END: page scripts -->

@endsection