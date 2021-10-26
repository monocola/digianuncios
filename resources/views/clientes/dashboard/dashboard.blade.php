<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4>PANEL DE MIS ANUNCIOS</h4>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Inicio</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <!-- table card start -->
                    <div class="card table-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-6 card-block-big br">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="icofont icofont-billboard text-success"></i>
                                        </div>
                                        <div class="col-sm-8 text-center">
                                            <h5>{{$cantidad_mis_anuncios_activos}}</h5>
                                            <span>Anuncios Activos</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 card-block-big">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="icofont icofont-not-allowed text-danger"></i>
                                        </div>
                                        <div class="col-sm-8 text-center">
                                            <h5>{{$cantidad_mis_anuncios_inactivos}}</h5>
                                            <span>Anuncios Inactivos</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- table card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- table card start -->
                    <div class="card table-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-6 card-block-big br">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="icofont icofont-speech-comments text-info"></i>
                                        </div>
                                        <div class="col-sm-8 text-center">
                                            <h5>{{$cantidad_comentarios}}</h5>
                                            <span>Comentarios</span>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 card-block-big">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="icofont icofont-plane-ticket text-warning"></i>
                                        </div>
                                        <div class="col-sm-8 text-center">
                                            <h5>{{ $tickets_cantidad }}</h5>
                                            <span>Tickets</span>
                                            <p></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- table card end -->
                </div>
                <div class="col-md-12 col-xl-4">
                    <!-- widget primary card start -->
                    <div class="card table-card widget-primary-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-3 card-block-big">
                                    @if($level == 2)
                                        <i class="icofont icofont-award"></i>
                                    @elseif($level == 1)
                                        <i class="icofont icofont-ui-fire-wall"></i>
                                    @elseif($level == 0)
                                        <i class="icofont icofont-rocket-alt-1"></i>
                                    @endif


                                </div>
                                <div class="col-sm-9">
                                    <h4>{{ Auth::user()->levelUser(Auth::user()->level) }}</h4>
                                    @if($level == 2)
                                    <h6>{{ Auth::user()->subLevelUser(Auth::user()->level) }}</h6>
                                    @elseif($level == 1)
                                        <h6>{{ Auth::user()->subLevelUser(Auth::user()->level) }}</h6>
                                    @elseif($level == 0)
                                        <h6>{{ Auth::user()->subLevelUser(Auth::user()->level) }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget primary card end -->

                </div>


                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-border-primary">
                                <div class="card-header">
                                    <h6><strong>MIS TICKETS ABIERTOS ({{ $tickets_cantidad }})</strong> </h6>
                                    <!-- <span class="label label-default f-right"> 28 January, 2015 </span> -->

                                </div>


                                <div class="card-block">
                                    <div class="row">
                                      @if($misTickets->count() > 0)
                                        <div class="col-sm-12">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap table-responsive " style="font-size: 12px;">
                                                <thead>
                                                <tr>
                                                    <th style="text-align: center;">Nº</th>
                                                    <th>TIPO</th>
                                                    <th>ASUNTO</th>
                                                    <th style="text-align: center;">ESTADO</th>
                                                    <th style="text-align: center;">FECHA</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($misTickets as $key => $tk)
                                                    <tr>
                                                        <td style="text-align: center;">{{ $key+1 }}</td>
                                                        <td>{{ $tk->tipoTicket($tk->tipo) }}</td>
                                                        <td><a href="/admin/miticket/{{ $tk->codigo }}/ver" >#{{ $tk->codigo }}</a>
                                                            <br/>{{ $tk->asunto }}
                                                        </td>
                                                        @if($tk->estado == 0)
                                                            <td style="text-align: center;"><a class="btn btn-warning btn-mini b-none" style="color:white;">{{ $tk->estado($tk->estado) }}</a></td>
                                                        @endif
                                                        @if($tk->estado == 1)
                                                            <td style="text-align: center;"><a class="btn btn-info btn-mini b-none" style="color:white;">{{ $tk->estado($tk->estado) }}</a></td>
                                                        @endif
                                                        @if($tk->estado == 2)
                                                            <td style="text-align: center;"><a class="btn btn-success btn-mini b-none" style="color:white;">{{ $tk->estado($tk->estado) }}</a></td>
                                                        @endif

                                                        <td style="text-align: center;">{{ $tk->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>
                                        @else
                                            <div class="col-sm-12">
                                                <p>No se encontraron tickets abiertos.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="task-list-table">

                                    </div>
                                    <div class="task-board m-0">
                                        <a href="{{ url('/admin/mistickets') }}" class="btn btn-info btn-mini b-none"><i class="icofont icofont-eye-alt m-0"> </i>  VER TODOS</a>
                                        <!-- end of dropdown-secondary -->

                                        <!-- end of seconadary -->
                                    </div>
                                    <!-- end of pull-right class -->
                                </div>
                                <!-- end of card-footer -->
                            </div>
                        </div>

                    </div>
                </div>

               @include('clientes.dashboard.mis-anuncios')

                <div class="col-md-6 col-xl-3">
                    <div class="card social-widget-card">
                        <div class="card-block-big bg-facebook">
                            <h3>0</h3>
                            <span class="m-t-10">Créditos</span>
                            <i class="icofont icofont-coins"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card social-widget-card">
                        <div class="card-block-big bg-twitter">
                            <h3>0</h3>
                            <span class="m-t-10">Mis Compras</span>
                            <i class="icofont icofont-card"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card social-widget-card">
                        <div class="card-block-big bg-linkein">
                            <h3>0</h3>
                            <span class="m-t-10">Anuncios Destacados</span>
                            <i class="icofont icofont-traffic-light"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card social-widget-card">
                        <div class="card-block-big bg-google-plus">
                            <h3><span style="color: #d34836;">.</span></h3>
                            <span class="m-t-10">Ayuda</span>
                            <i class="icofont icofont-headphone-alt "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('copyright.footer')