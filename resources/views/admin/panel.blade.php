<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')

<body class="header-fixed">
<!-- Pre-loader start -->

<!-- Pre-loader end -->
<!-- Menu header start -->
@if(Auth::user()->tipo == 8355023)
    @include('admin.menus.menu')
@endif
<!-- Menu header end -->
<!-- Menu aside start -->
@include('layouts.admin.menu-vertical')
<!-- Menu aside end -->
<!-- Sidebar chat start -->

<!-- Sidebar inner chat end-->
<!-- Main-body start-->
@if(Auth::user()->tipo == 8355023)
    @include('admin.dashboard.dashboard')
@endif


@include('layouts.admin.piehome')
</body>
</html>