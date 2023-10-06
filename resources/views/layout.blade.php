<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JoyBox - @yield('title')</title>
    @vite(['resources/css/app.scss'])
    <link rel="stylesheet" href="{{asset("css/custom.css")}}">
</head>
<body>
    @include('nav')
    <div class="container my-5" style="min-height: 70vh">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{session()->get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </div>
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; {{now()->year}} JoyBox</p>
    </footer>
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
