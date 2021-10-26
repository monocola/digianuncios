<nav class="navbar header-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a href="{{url('/manager/admin')}}">
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
                            GESTIONAR
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification row">
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title">CATEGORÍAS</h6>
                                <ul class="mega-mailbox">
                                    <li>
                                        <a href="{{url('/manager/categorias')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-folder"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Categorías</h5>
                                                <small class="text-muted">Categorías Registradas</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/manager/categoriassugeridas')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-folder"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Sugeridas</h5>
                                                <small class="text-muted">Categorías Sugeridas</small>
                                            </div>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title">ANUNCIOS</h6>
                                <ul class="mega-mailbox">
                                    <li>
                                        <a href="{{url('/manager/ManagerAnuncios/Aprobados')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-folder"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Aprobados</h5>
                                                <small class="text-muted">Anuncios Aprobados</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/manager/ManagerAnuncios/Pendientes')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-headphone-alt"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Pendientes</h5>
                                                <small class="text-muted">Anuncios Pendientes</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/manager/ManagerAnuncios/Rechazados')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-dropbox"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Rechazados</h5>
                                                <small class="text-muted">Anuncios Rechazados
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/manager/ManagerAnuncios/Todos')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-location-pin"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Todos</h5>
                                                <small class="text-muted">Todos los Anuncios</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title">ATENCIÓN AL CLIENTE</h6>
                                <ul class="mega-mailbox">
                                    <li>
                                        <a href="{{url('/manager/mistickets')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-folder"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Tickets</h5>
                                                <small class="text-muted">Mesa de Ayuda</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <h6 class="mega-menu-title">NOTIFICACIONES</h6>
                                <ul class="mega-mailbox">
                                    <li>
                                        <a href="{{url('/manager/notifications')}}" class="media">
                                            <div class="media-left">
                                                <i class="ti-folder"></i>
                                            </div>
                                            <div class="media-body">
                                                <h5>Notificaciones</h5>
                                                <small class="text-muted">Mensajes</small>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
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
                        <a href="{{ url('/manager/ManagerAnuncios/Pendientes')  }}">
                            <i class="ti-window"></i>
                            @if( $anunciosPendientes->count()> 0 ) <span class="badge">{{ $anunciosPendientes->count() }} </span> @endif
                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>ANUNCIOS POR APROBAR</h6>

                            </li>
                            @foreach ($anunciosPendientes as  $anunP)
                                <li>
                                    <div class="media">
                                        <img class="d-flex align-self-center" src="{{ asset('anuncios/'.$anunP->banner ) }}" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user"><a href="/manager/ManagerAnuncios/{{ $anunP->id }}/detalle">{{  $anunP->titulo }}</a></h5>
                                            <p class="notification-msg">{{  $anunP->descripcion }}</p>
                                            <span class="notification-time">{{ $anunP->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="header-notification">
                        <a href="{{ url('/manager/notifications') }}">
                            <i class="ti-bell"></i>

                        </a>

                    </li>

                    <li class="user-profile header-notification">
                        <a href="#!">
                            <img class="img-circle" src="/avatars/{{Auth::user()->avatar}}" alt="User-Profile-Image">
                            <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            <li>
                                <a href="{{url('/')}}">
                                    <i class="ti-layout-media-center-alt"></i> Visitar Sitio
                                </a>
                            </li>
                            <li>
                                <a href="/manager/my-profile">
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
                <!-- search -->

                <!-- search end -->
            </div>
        </div>
    </div>
</nav>