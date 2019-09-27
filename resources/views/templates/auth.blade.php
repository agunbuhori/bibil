<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {!! HTML::style('css/app.css') !!}
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>LKS</b> ONLINE</a>
  </div>

  @yield('content')
</div>

{!! HTML::script('js/app.js') !!}
@yield('javascript')
</body>
</html>