<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4>PANEL DE CONTROL</h4>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Admin</a>
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
                                        <div title="{{ $consults }}" class="col-sm-4">
                                            <i class="icofont icofont-listine-dots text-success"></i>
                                        </div>

                                        <div class="col-sm-8 text-center">
                                            <h5 title="{{ $consults }}">{{ str_limit($consults ,5)}}</h5>
                                            <span title="{{ $consults }}">CONSULTAS REALIZADAS</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 card-block-big">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="icofont icofont-speech-comments text-danger"></i>
                                        </div>
                                        <div class="col-sm-8 text-center">
                                            <h5 title="{{ $comments }}">{{ str_limit($comments ,5)}}</h5>
                                            <span title="{{ $comments }}">COMENTARIOS RECIBIDOS</span>
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
                                            <i class="icofont icofont-billboard text-info"></i>
                                        </div>
                                        <div class="col-sm-8 text-center">
                                            <h5 title="{{ $views }}">{{ str_limit($views ,5)}}</h5>
                                            <span title="{{ $views }}">ANUNCIOS VISTOS</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 card-block-big">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="icofont icofont-plane-ticket text-warning"></i>
                                        </div>
                                        <div class="col-sm-8 text-center">
                                            <h5 title="{{ $tickets }}">{{ str_limit($tickets ,5)}}</h5>
                                            <span title="{{ $tickets }}">TICKETS RECIBIDOS</span>
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
                                    <i class="icofont icofont-card"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h4 title="{{ $ads }}">{{ str_limit($ads ,20)}}</h4>
                                    <h6>Anuncios Activos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget primary card end -->
                    <!-- widget-success-card start -->
                    <div class="card table-card widget-success-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-3 card-block-big">
                                    <i class="icofont icofont-ui-user-group"></i>
                                </div>
                                <div class="col-sm-9">
                                    <h4 title="{{ $users }}">{{ str_limit($users ,20)}}</h4>
                                    <h6>Usuarios Activos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget-success-card end -->
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-border-primary">
                                <div class="card-header">
                                    <h6><strong>TICKETS ({{ $tickets_cantidad }})</strong> </h6>
                                    <!-- <span class="label label-default f-right"> 28 January, 2015 </span> -->

                                </div>


                                <div class="card-block">
                                    <div class="row">
                                        @if($tickets_cantidad < 1)
                                            <div class="col-sm-12">
                                                <p>No se encontraron tickets.</p>
                                            </div>
                                        @else
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
                                                            <td><a href="/manager/miticket/{{ $tk->codigo }}/ver" >#{{ $tk->codigo }}</a>
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
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="task-list-table">

                                    </div>
                                    <div class="task-board m-0">
                                        <a href="{{ url('/manager/mistickets') }}" class="btn btn-info btn-mini b-none"><i class="icofont icofont-eye-alt m-0"> </i>  VER TODOS</a>
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

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card table-1-card">
                                <div class="card-header">
                                    <h6><strong>USUARIOS ({{ $users }})</strong> </h6>
                                    <!-- <span class="label label-default f-right"> 28 January, 2015 </span> -->

                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr class="text-capitalize">
                                                <th>AVATAR</th>
                                                <th>PAIS</th>
                                                <th>APELLIDOS</th>
                                                <th>NOMBRES</th>
                                                <th>CORREO</th>
                                                <th>TELÉFONO</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($usersAll as $key => $us)
                                            <tr>
                                                <td><a href="/manager/view/{{ $us->id }}/users"><img width="30"  height="30" src="/avatars/{{ $us->avatar }}"></a></td>
                                                <td title="{{ strtolower($us->country) }}"><i class="flag-icon flag-icon-{{ strtolower($us->country) }} m-r-5"></i></td>
                                                <td>{{ $us->lastname }}</td>
                                                <td>{{ $us->name }}</td>
                                                <td>{{ $us->email }}</td>
                                                <td>{{ $us->phone }}</td>

                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="task-list-table">

                                    </div>
                                    <div class="task-board m-0">
                                        <a href="{{ url('/manager/users') }}" class="btn btn-primary btn-mini b-none"><i class="icofont icofont-eye-alt m-0"> </i>  VER TODOS USUARIOS</a>
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