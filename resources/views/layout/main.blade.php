@extends('../layout/base')
@section('body')

    <body class="main font-karla">
    <div id="success-notification-content" class="toastify-content hidden flex"><i class="text-theme-9"
                                                                                   data-feather="check-circle"></i>
        <div class="ml-4 mr-4">
            <div class="font-medium">Payment successful!</div>
            <div class="text-gray-600 mt-1">Your account has been credited!🎉</div>
        </div>
    </div> <!-- END: Notification Content --> <!-- BEGIN: Notification Toggle -->
    <button style="display: none" type="hidden" name="success-alert" id="success-notification-toggle" class="btn btn-primary">Show Notification
    </button> <!-- END: Notification Toggle -->

        @yield('content')
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        <script>
            @if(\Illuminate\Support\Facades\Session::has('success'))
                document.getElementById('success-notification-toggle').click();
            @endif
        </script>
        @yield('script')

    </body>
@endsection
