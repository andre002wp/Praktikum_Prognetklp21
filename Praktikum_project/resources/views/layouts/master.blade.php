<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('admin.layouts._asset_header')
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-turbolinks="false">
    <div class="wrapper">

        @include('layouts.header')

        @include('layouts.sidebar')

        @yield('content')

        @include('admin.layouts.footer')
    </div>
    <!-- ./wrapper -->

{{-- asset script --}}

@include('admin.layouts._asset_footer')
@livewireScripts
@stack('scripts')
</body>
</html>
