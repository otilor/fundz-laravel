@extends('../layout/base')
@section('body')

    <body class="main font-karla">


        @yield('content')
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        <script>
            @if(\Illuminate\Support\Facades\Session::has('notification'))
                console.log('Yikes')
                document.getElementById('success-notification-toggle').click();
            @endif
        </script>
        @yield('script')

    </body>
@endsection
