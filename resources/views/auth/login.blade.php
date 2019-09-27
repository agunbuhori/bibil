@extends('templates.auth')

@section('content')
<div class="login-box-body">
  <p class="login-box-msg">Sign in to start your session</p>

  <form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-group has-{{ $errors->has('username') ? 'error' : 'feedback' }}">
      <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      @if ($errors->has('username'))
      <span class="help-block">
        {{ $errors->first('username') }}
      </span>
      @endif
    </div>
    <div class="form-group has-{{ $errors->has('password') ? 'error' : 'feedback' }}">
      <input type="password" name="password" class="form-control" required placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      @if ($errors->has('email'))
      <span class="help-block">
        {{ $errors->first('password') }}
      </span>
      @endif
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
          </label>
        </div>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
    </div>
  </form>
  @if (Route::has('password.request'))
  <a href="{{ route('password.request') }}">
      {{ __('Forgot Your Password?') }}
  </a>
  @endif

</div>
@endsection

@section('javascript')
<script>
$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection