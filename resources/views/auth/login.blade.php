@extends ('layouts.login')
<style>
  .cui-login{
    background-color: transparent !important;
  }
  .cui-login-header-logo img {
    max-width: 350px  !important;
    max-height: 150px  !important;
  }
  .cui-login-block {
    padding: 0.15rem 3.07rem 6.15rem !important;
  }
  .cui-login-block-promo {
    padding: 0 0 .61rem  !important;
  }
</style>
@section('content')
<!-- START: pages/login-alpha -->
<div  class="cui-login">
  <div class="cui-login-header">
    <div class="row">
      <div class="col-lg-6">
        <div class="cui-login-header-logo">
          <a href="javascript: history.back();">
              <img src="/images/logo-header-inverse.png"  alt="Empaque S.A"/>
          </a>
        </div>
      </div>
      <!-- 
      <div class="col-lg-6">
        <div class="cui-login-header-menu">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="javascript: history.back();">&larr; Back</a></li>
            <li class="list-inline-item active"><a href="javascript: void(0);">Login</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">About</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
          </ul>
        </div>
      </div>
    -->
    </div>
  </div>
  <div class="cui-login-block">
    <div class="row">
      <div class="col-xl-12">
        <div class="cui-login-block-promo text-white text-center">
          <h1 class="mb-3">
            <strong>EMPAQUE SA</strong>
            
          </h1>          
        </div>
        <div class="cui-login-block-inner">
          <div class="cui-login-block-form">
            <h4>{{ __('Login') }}</h4>

            <form id="form-validation" name="form-validation"method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group ">

                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="text" data-validation="[EMAIL]" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group ">
                    <button type="submit"  class="btn btn-primary btn-block mr-3">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--
  <div class="cui-login-footer text-center">
    <ul class="list-unstyled list-inline">
      <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
      <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
      <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
      <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
      <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
    </ul>
  </div> -->
</div>
<!-- END: pages/login-alpha -->

<!-- START: page scripts -->
<script>
  ;(function($) {
    'use strict'
    $(function() {
      // Form Validation
      $('#form-validation').validate({
        submit: {
          settings: {
            inputContainer: '.form-group',
            errorListClass: 'form-control-error',
            errorClass: 'has-danger',
          },
        },
      })

      // Show/Hide Password
      $('.password').password({
        eyeClass: '',
        eyeOpenClass: 'icmn-eye',
        eyeCloseClass: 'icmn-eye-blocked',
      })

      // Switch to fullscreen
      $('.switch-to-fullscreen').on('click', function() {
        $('.cui-login').toggleClass('cui-login-fullscreen')
      })

      // Change BG
      $('.random-bg-image').on('click', function() {
        var min = 1,
          max = 5,
          next = Math.floor($('.random-bg-image').data('img')) + 1,
          final = next > max ? min : next

        $('.random-bg-image').data('img', final)
        $('.cui-login')
          .data('img', final)
          .css('backgroundImage', 'url(/cleanui/components/pages/common/img/login/' + final + '.jpeg)')
      })
    })
  })(jQuery)
</script>
<!-- END: page scripts -->

@endsection