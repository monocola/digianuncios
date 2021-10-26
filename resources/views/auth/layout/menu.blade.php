<nav class="navbar header-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>

            <a class="mobile-search morphsearch-search" href="#">
                <i class="ti-search"></i>
            </a>
            <a href="{{url('/home')}}">
                <img class="img-fluid" src="{{asset('img/logo-digianuncios.png')}}" alt="Digianuncios" />
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <div>
                <ul class="nav-left">
                    <li>
                        <a id="collapse-menu" href="#">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li class="mega-menu-top">
                        <a href="#">
                            ADMINISTRAR
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification row">
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title"><i class="ti-bookmark"></i> CATEGORÍAS</h6>
                                <ul class="mega-mailbox">
                                    <li>
                                        <a href="{{url('/admin/categorias')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-folder"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Categorías</h5>
                                                <small class="text-muted">Categorías disponibles</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title"><i class="ti-layout-media-overlay-alt-2"></i> ANUNCIOS</h6>
                                <ul class="mega-mailbox">
                                    <li>
                                        <a href="{{url('/admin/misAnuncios')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-folder"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Mis Anuncios</h5>
                                                <small class="text-muted">Todos mis anuncios</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/misAnuncios/nuevo')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-headphone-alt"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Agregar Anuncio</h5>
                                                <small class="text-muted">Nuevo anuncio</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title"><i class="ti-gallery"></i> Mis Artes</h6>
                                <div class="row m-b-20">
                                </div>
                                <form method="get" action="/admin/misAnuncios">
                                    <button class="btn btn-primary btn-sm btn-block">Ver todas</button>
                                </form>
                            </li>
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title"><i class="ti-headphone"></i> Solicitar Asistencia</h6>
                                <div class="mega-menu-contact">

                                    <div class="form-group row">

                                        <div class="col-12">
                                            <small class="text-muted">Si usted necesita asistencia técnica o desea comunicarse con nosotros o reportar algún problema.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-9">
                                            <form method="get" action="/admin/mistickets">
                                                <button style="width: 200px;" class="btn btn-info btn-sm btn-block">Abrir Ticket</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="header-notification lng-dropdown">
                        <a href="#" id="dropdown-active-item">
                            <i class="flag-icon flag-icon-{{Auth::user()->country}} m-r-5"></i> {{ strtoupper(Auth::user()->country)}}
                        </a>

                    </li>

                    <li class="header-notification">
                        <a href="#!">
                            <i class="ti-window"></i>
                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>ANUNCIOS POR APROBAR</h6>

                            </li>
                        </ul>
                    </li>

                    <li class="header-notification">
                        <a href="{{ url('/admin/notifications') }}">
                            <i class="ti-bell"></i>
                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>NOTIFICACIONES</h6>

                            </li>
                        </ul>
                    </li>
                    <li class="header-notification">
                        <a href="{{ url('/admin/mistickets') }}">
                            <i class="ti-ticket"></i>

                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>MIS TICKETS</h6>

                            </li>

                        </ul>
                    </li>


                    <li class="user-profile header-notification">
                        <a href="#!">
                            <img class="user-img img-circle" src="/avatars/{{Auth::user()->avatar}}" alt="Imagen de Perfil">
                            <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            <li>
                                <a href="{{url('/')}}">
                                    <i class="ti-blackboard"></i> Visitar Sitio
                                </a>
                            </li>
                            <li>
                                <a href="/admin/my-profile">
                                    <i class="ti-user"></i> Mi Perfíl
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ti-layout-sidebar-left"></i> Cerrar Sessión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>


                </ul>

            </div>
        </div>
    </div>
</nav>
@include('layouts.admin.piehome')