<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="{{asset('assets_user/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/toastr/toastr.min.css') }}" />
    @stack('styles')
</head>
<script>
    var base_url = "{{ url('/') }}";
    var auth_user = @json(auth()->check() ? auth()->user() : null);  // Handle the case where no user is logged in
    var is_auth = {{ auth()->check() ? 'true' : 'false' }};  // Safely output true/false based on auth status
    var stripeKey={{ env('STRIPE_KEY') }};
</script>


<body>
    <div id="uiBlocker"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:9999;">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            <img src="{{ asset('assets_user/images/loading-spinner.gif') }}" alt="Loading..."
                style="height:150px; width:150px;" />
        </div>
    </div>
    <!-- header code here -->
    @include('layouts.website.header')
    <!-- main content -->
    @yield('content')

    <!-- Footer code here -->
    @include('layouts.website.footer')

</body>

@stack('scripts')

</html>