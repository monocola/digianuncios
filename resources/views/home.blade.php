<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')

<body class="header-fixed">
    <!-- Pre-loader start -->

    <!-- Pre-loader end -->
    <!-- Menu header start -->
    @if(Auth::user()->tipo == 2)
    @include('layouts.admin.menu')
    @endif
    <!-- Menu header end -->
    <!-- Menu aside start -->
    @include('layouts.admin.vertical')
    <!-- Menu aside end -->
    <!-- Sidebar chat start -->

    <!-- Sidebar inner chat end-->
    <!-- Main-body start-->
    @if(Auth::user()->tipo == 2)
        @include('clientes.dashboard.dashboard')
    @endif



</body>
</html>

