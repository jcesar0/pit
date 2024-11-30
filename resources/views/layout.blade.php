<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>
<body>

    @include('components.navbar')
    <div class="container-fluid">
        @yield('content')
    </div>


    <footer>


        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js')
    </footer>

</body>
</html>
