<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.  css') }}">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    @include('layouts.sidebar')

    <section class="home">
        <div class="text"> <a class="title"> PEDULI DIRI </a> | @yield('judul')</div>
        @yield('content')
        @include('layouts.footer')
    </section>
    {{-- @include('sweetalert::alert') --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('success'))
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 300;
            toastr.options.closeEasing = 'swing';
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@include('sweetalert::alert')

</body>

</html>
