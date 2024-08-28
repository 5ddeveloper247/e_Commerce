<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets_admin/css/style-2.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.0/css/buttons.dataTables.min.css" />
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/toastr/toastr.min.css') }}" />
    <script src="{{ asset('assets_admin/plugins/toastr/toastr.min.js') }}"></script>

    @stack('css')
    <script>
        var base_url = "{{url('/')}}";
    </script>

</head>

<body>
    <div id="uiBlocker"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:9999;">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            <img src="{{ asset('assets_admin/images/ripple-spinner-trans.gif') }}" alt="Loading..."
                style="height:150px; width:150px;" />
        </div>
    </div>
    <!-- header code here -->
    @if($pageTitle!='Login' && $pageTitle!='Forget Password' && $pageTitle!='Signup')
    @include('layouts.admin.header')
    @endif
    <div class="d-flex">

        <!-- side bar code here -->
        @if($pageTitle!='Login' && $pageTitle!='Forget Password' && $pageTitle!='Signup')
        @include('layouts.admin.sidebar')
        <div class="content">
            @endif
            <!-- main content -->
            @yield('content')
            @if($pageTitle!='Login' && $pageTitle!='Forget Password' && $pageTitle!='Signup')

        </div>
        @endif
    </div>

    @include('layouts.admin.footer')
    <!-- Footer code here -->
    @stack('scripts')

</body>

</html>