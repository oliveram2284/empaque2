@extends ('layouts.app')

@section('content')
<!-- START: forms/file-uploads -->
<section class="card">
  <div class="card-header">
    <span class="cui-utils-title">
      <strong>Dropify</strong>
      <a
        href="http://jeremyfagis.github.io/dropify/"
        target="_blank"
        class="btn btn-sm btn-primary ml-2"
        >Official Documentation <i class="icmn-link ml-1"><!-- --></i></a
      >
    </span>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <h5 class="text-black"><strong>Default Uploader</strong></h5>
        <p class="text-muted">
          Element: read
          <a href="http://jeremyfagis.github.io/dropify/" target="_blank"
            >official documentation<small
              ><i class="icmn-link ml-1"><!-- --></i></small
            ></a
          >
        </p>
        <div class="mb-5">
          <input type="file" class="dropify" />
        </div>
      </div>
      <div class="col-lg-6">
        <h5 class="text-black"><strong>Preloaded File</strong></h5>
        <p class="text-muted">
          Element: read
          <a href="http://jeremyfagis.github.io/dropify/" target="_blank"
            >official documentation<small
              ><i class="icmn-link ml-1"><!-- --></i></small
            ></a
          >
        </p>
        <div class="mb-5">
          <input type="file" class="dropify" data-default-file="" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <h5 class="text-black"><strong>Custom Height</strong></h5>
        <p class="text-muted">
          Element: read
          <a href="http://jeremyfagis.github.io/dropify/" target="_blank"
            >official documentation<small
              ><i class="icmn-link ml-1"><!-- --></i></small
            ></a
          >
        </p>
        <div class="mb-5">
          <input type="file" class="dropify" data-height="300" />
        </div>
      </div>
      <div class="col-lg-6">
        <h5 class="text-black"><strong>Disabled</strong></h5>
        <p class="text-muted">
          Element: read
          <a href="http://jeremyfagis.github.io/dropify/" target="_blank"
            >official documentation<small
              ><i class="icmn-link ml-1"><!-- --></i></small
            ></a
          >
        </p>
        <div class="mb-5">
          <input type="file" class="dropify" disabled="disabled" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END: forms/file-uploads -->

<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'
    $(function() {
      $('.dropify').dropify()
    })
  })(jQuery)
</script>
<!-- END: page scripts -->

@endsection