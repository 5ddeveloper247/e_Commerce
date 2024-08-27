<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="{{asset('assets_user/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/toastr/toastr.min.css') }}" />
    @stack('styles')
</head>
<script>
    var base_url = "{{url('/')}}";
</script>

<body>
        <!-- header code here -->
        @include('layouts.website.header')

        <!-- main content -->
        @yield('content')

        <!-- Footer code here -->
        @include('layouts.website.footer')

</body>

@stack('scripts')

</html>