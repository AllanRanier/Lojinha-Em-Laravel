@if (Session::has('success'))
    <script>
        @include('layouts.toastr')
        toastr.success("{!! Session::get('success') !!}")
    </script>
@endif
@if (Session::has('error'))
    <script>
        @include('layouts.toastr')
        toastr.error("{!! Session::get('error') !!}")
    </script>
@endif
@if (Session::has('info'))
    <script>
        @include('layouts.toastr')
        toastr.info("{!! Session::get('info') !!}")
    </script>
@endif
@if (Session::has('warning'))
    <script>
        @@nclude('layouts.toastr')
        toastr.warning("{!! Session::get('warning') !!}")
    </script>
@endif
