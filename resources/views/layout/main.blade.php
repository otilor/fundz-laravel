@extends('../layout/base')
@section('body')

    <div class="absolute bottom-0 right-0 h-16 w-16 z-50">
        <x:notify-messages />
    </div>
    <body class="main font-karla">


        @yield('content')
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        <script>
            document.getElementById('success-notification-toggle').click();
        </script>
        @yield('script')
    </body>
@endsection
