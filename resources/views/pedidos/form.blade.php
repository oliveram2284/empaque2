@extends ('layouts.app')

@section('content')
<h2>Ingreso Pedido</h2>
<section class="card">
    <div class="card-header">
        <span class="cui-utils-title">
        <strong>Ingreso Pedido</strong>      
        </span>
    </div>
    <div class="card-body">
        <div class="row">
                <div class="mb-5">
                        <div id="example-icons" class="wizard">
                          <h3>
                            <i class="icmn-user wizard-steps-icon"></i>
                            <span class="wizard-steps-title">Account Info</span>
                          </h3>
                          <section class="text-center">
                            <h3 class="d-none">Title</h3>
                            <p>Try the keyboard navigation by clicking arrow left or right!</p>
                          </section>
                          <h3>
                            <i class="icmn-book wizard-steps-icon"></i>
                            <span class="wizard-steps-title">Billing Info</span>
                          </h3>
                          <section class="text-center">
                            <h3 class="d-none">Title</h3>
                            <p>Wonderful transition effects.</p>
                          </section>
                          <h3>
                            <i class="icmn-checkmark wizard-steps-icon"></i>
                            <span class="wizard-steps-title">Confirmation</span>
                          </h3>
                          <section class="text-center">
                            <h3 class="d-none">Title</h3>
                            <p>The next and previous buttons help you to navigate through your content.</p>
                          </section>
                        </div>
                      </div>
        </div>         
    </div>
</section>


<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'
    $(function() {
      $('#example-icons').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        autoFocus: true,
      })

      $('#example-numbers').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        transitionEffect: 'slideLeft',
        autoFocus: true,
      })
    })
  })(jQuery)
</script>
<!-- END: page scripts -->
@endsection