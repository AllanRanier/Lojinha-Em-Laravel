<!DOCTYPE html>
<html lang="pt-BR">

<head>
    @include('layouts.head')
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.topbar')
        <div class="content-wrapper">
            <div class="content-header">
                @include('layouts.siderbar')
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.footer')


    @include('layouts.modals')
    @include('layouts.scripts')
    @include('layouts.alert')

</body>

</html>
