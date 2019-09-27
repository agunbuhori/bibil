<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {!! HTML::style('css/app.css') !!}
  @yield('stylesheet')
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="{{ route('dashboard') }}" class="logo">
      <span class="logo-mini"><b>LKS</b></span>
    <span class="logo-lg"><b>LKS</b> ONLINE</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @include('components.navbar-costume.user')
        </ul>
      </div>
    </nav>
  </header>

  @include('components.sidebar.sidebar')

  <div class="content-wrapper">
    @yield('content')
  </div>

  @include('components.footer')
</div>

{!! HTML::script('js/app.js') !!}
<script src="{{ asset('js/select2.min.js') }}"></script>
@yield('javascript')
<script>
  $(function () {
    $('.select2').select2();
    var current = window.location.href;
    $('a[href="'+current+'"]').parents('li').addClass('active');
  });
</script>
</body>
</html>