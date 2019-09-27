@extends('templates.auth')

@section('content')

<div class="login-box-body">
  <p class="login-box-msg">Sign in to start your session</p>
  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <form action="{{ route('password.email') }}" method="post">
    @csrf
    <div class="form-group has-{{ $errors->has('email') ? 'error' : 'feedback' }}">
      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
      @if ($errors->has('email'))
      <span class="help-block">
        {{ $errors->first('email') }}
      </span>
      @endif
    </div>
    <div class="row">
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat">
          {{ __('Send Password Reset Link') }}
        </button>
      </div>
    </div>
  </form>

</div>
@endsection
