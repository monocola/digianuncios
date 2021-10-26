<div class="container">
    @guest
        @include('modals.countriesnocheck')
    @else
        @include('modals.countries')
    @endguest
    <nav class="navbar ownavigation navbar-expand-lg">
        <a class="nav-link" title="Home" href="{{url('/')}}"><img  src="{{asset('img/logo12.png')}}" style="height: 30px;width: 133px;" alt="Digianuncios" /></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbar1" aria-controls="navbar1" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">

            <ul class="navbar-nav">
                <li class="dropdown">
                    <a class="nav-link" title="Inicio"
                       href="{{url('/')}}">Inicio</a>

                </li>
                <li class="dropdown">

                    <a class="nav-link " title="Anuncia con Nosotros" href="{{ url('/anuncia-con-nosotros') }}">Anuncia con Nosotros</a>

                </li>

                <li><a class="nav-link" title="Quienes Somos" href="{{ url('/quienes-somos') }}">Quienes Somos</a></li>
                <li><a class="nav-link" title="Preguntas frecuentes" href="{{ url('/preguntas-frecuentes') }}">Preguntas frecuentes</a></li>

                @guest
                    <li><a class="nav-link" title="Iniciar Sessión"
                           href="{{url('login')}}">Iniciar Sessión</a>

                    </li>
                @else
                    @if(Auth::user()->tipo == 1)
                        <li><a class="nav-link"
                               href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><strong>Cerrar Sessión</strong></a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <li>
                            <form action="/changead" method="post">
                                @csrf
                            <input type="submit" title="Convertirme en anunciante" style="margin-top: 8px;font-size: 10px;" class="btn btn-sm btn-secondary" value="DESEO ANUNCIAR">
                            </form>
                        </li>
                    @elseif(Auth::user()->tipo == 8355023)
                        <li>
                            <a class="nav-link" title="gestionar" href="{{url('manager/admin')}}"><strong>GESTIONAR</strong></a>
                        </li>
                    @elseif(Auth::user()->tipo == 2)
                            <li>
                                <a class="nav-link" title="gestionar" href="{{url('home')}}"><strong>ADMINISTRAR MIS ANUNCIOS</strong></a>
                            </li>

                    @endif
                @endguest
                <li>
                    <a data-toggle="modal" data-target="#exampleModalx-1" class="nav-link" title="Pais Seleccionado"><i class="flag-icon flag-icon-{{ strtolower($iso_code) }} m-r-5"></i> {{ $iso_code }}</a>
                </li>
            </ul>
        </div>
        <div id="loginpanel-1" class="desktop-hide">
            <div class="right toggle" id="toggle-1">
                <a id="closeit-1" class="closeit" href="#slidepanel"><i
                            class="fo-icons fa fa-close"></i></a>
            </div>
        </div>




    </nav>
</div>
