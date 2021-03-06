<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>We Fashion</title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>
    <div id='app' class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Request::is('admin/*'))
                    @include('back.menu')
                @else
                    @include('partials.menu')
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
        <footer>
            @include('partials.footer')
        </footer>
    </div>
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show
</body>
</html>