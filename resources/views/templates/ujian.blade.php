<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UJIAN ONLINE</title>
  
    {!! HTML::style('css/ujian-online.css') !!}

    <script>
      var BASE_URL = "{{ url('') }}";
      var TOKEN_WEB = "{{ csrf_token() }}";
    </script>
  </head>
  <body>
    <div class="main-wraper">

      @include('components.ujian-online.header')

      @yield('content')

    </div>

    {{-- {!! HTML::script('js/ujian-online.js') !!} --}}
    {!! HTML::script('plugins/ckeditor/ckeditor.js') !!}
    <script>
      CKEDITOR.replace('jawabanessay');
    </script>
  </body>
</html>