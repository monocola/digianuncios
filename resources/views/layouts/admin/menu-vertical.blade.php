<div class="main-menu">
    <div class="main-menu-header">

    </div>
    <div class="main-menu-content">
        <ul class="main-navigation">
            <li class="nav-title" data-i18n="nav.category.navigation">
                <i class="ti-line-dashed"></i>
                <span>GESTIONAR</span>
            </li>
            <li class="nav-item">
                <a href="#!">
                    <i class="ti-layout-list-thumb"></i>
                    <span data-i18n="nav.navigate.main">Categorías</span>
                </a>
                <ul class="tree-1">
                    <li><a href="{{ url('/manager/categorias') }}" data-i18n="nav.navigate.navbar">Listado</a>
                    </li>
                    <li><a href="{{ url('/manager/categoriassugeridas') }}" data-i18n="nav.navigate.navbar-inverse">Sugeridas</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#!">
                    <i class="ti-layout-cta-right"></i>
                    <span data-i18n="nav.navigate.main">Anuncios</span>
                </a>
                <ul class="tree-1">
                    <li><a href="{{ url('/manager/ManagerAnuncios/Aprobados') }}" data-i18n="nav.navigate.navbar">Aprobados</a>
                    </li>
                    <li><a href="{{ url('/manager/ManagerAnuncios/Pendientes') }}" data-i18n="nav.navigate.navbar-inverse">Pendientes</a></li>
                    <li><a href="{{ url('/manager/ManagerAnuncios/Rechazados') }}" data-i18n="nav.navigate.navbar-inverse">Rechazados</a></li>
                    <li><a href="{{ url('/manager/ManagerAnuncios/Todos') }}" data-i18n="nav.navigate.navbar-inverse">Todos</a></li>
                </ul>
            </li>
            <li class="nav-item single-item">
                <a href="{{url('/manager/notifications')}}">
                    <i class="ti-bell"></i>
                    <span data-i18n="nav.landing-page.main"> Notificaciones</span>
                </a>
            </li>
            <li class="nav-item single-item">
                <a href="{{url('/manager/mistickets')}}">
                    <i class="ti-ticket"></i>
                    <span data-i18n="nav.landing-page.main"> Tickets</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#!">
                    <i class="ti-layout-cta-right"></i>
                    <span data-i18n="nav.navigate.main">Análisis</span>
                </a>
                <ul class="tree-1">
                    <li><a href="{{ url('/manager/analytics-categories') }}" data-i18n="nav.navigate.navbar">Categorias</a></li>
                    <li><a href="{{ url('/manager/analytics-add') }}" data-i18n="nav.navigate.navbar-inverse">Anuncios</a></li>
                    <li><a href="{{ url('/manager/ManagerAnuncios/Rechazados') }}" data-i18n="nav.navigate.navbar-inverse">Usuarios</a></li>
                </ul>
            </li>
            <li class="nav-item single-item">
                <a href="{{url('/manager/users')}}">
                    <i class="ti-user"></i>
                    <span data-i18n="nav.landing-page.main"> Usuarios</span>
                </a>
            </li>


        </ul>
    </div>
</div>