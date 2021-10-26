<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')

@if (session('success'))
    <script>
        $( document ).ready(function() {
            $('#default-Modal').modal('toggle')
        });
    </script>
@endif

<body class="header-fixed">
<!-- Pre-loader start -->

<!-- Pre-loader end -->
<!-- Menu header start -->
@include('admin.menus.menu')
<!-- Menu header end -->
<!-- Menu aside start -->
@include('layouts.admin.menu-vertical')
<!-- Menu aside end -->
<!-- Sidebar chat start -->

<!-- Sidebar inner chat start-->

<!-- Sidebar inner chat end-->
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>USUARIOS</h4>
                <span>Listado de Usuarios</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a style="color: white;" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">CREAR ADMINISTRADOR</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Page-header end -->
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Zero config.table start -->
                    <div class="card">

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- tab header start -->
                                <div class="tab-header">
                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">ADMINISTRADORES ({{$usersAdmin->count()}})</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">ANUNCIANTES ({{$usersClient->count()}})</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">VISITANTES ({{$usersVisitor->count()}})</a>
                                            <div class="slide"></div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- tab header end -->
                                <!-- tab content start -->
                                <div class="tab-content">
                                    <!-- tab panel personal start -->
                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                        <!-- personal card start -->

                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr class="text-capitalize">
                                                            <th>Avatar</th>
                                                            <th>Pais</th>
                                                            <th>Apellidos</th>
                                                            <th>Nombres</th>
                                                            <th>Correo</th>
                                                            <th>Teléfono</th>
                                                            <th>Registro</th>
                                                            <th>Acciones</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($usersAdmin as $key => $usA)
                                                            <tr>
                                                                <td><img width="30"  height="30" src="/avatars/{{ $usA->avatar }}"></td>
                                                                <td title="{{ strtolower($usA->country) }}"><i class="flag-icon flag-icon-{{ strtolower($usA->country) }} m-r-5"></i></td>
                                                                <td>{{ $usA->lastname }}</td>
                                                                <td>{{ $usA->name }}</td>
                                                                <td>{{ $usA->email }}</td>
                                                                <td>{{ $usA->phone }}</td>
                                                                <td>{{ $usA->created_at }}</td>
                                                                @if($usA->state==0)
                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Activo</button>
                                                                    <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a style="margin-left: 4px;" class="dropdown-item" href="/manager/view/{{ $usA->id }}/users"><i class="icofont icofont-eye-alt"></i>Ver</a>
                                                                        <a style="margin-left: 4px;" class="dropdown-item" href="/manager/consult/{{ $usA->id }}/users"><i class="icofont icofont-tasks-alt"></i>consultas</a>
                                                                        <form action="/manager/{{ $usA->id }}/users/blocked" method="post">
                                                                            {{ csrf_field() }}
                                                                        <button type="submit" style="font-size: 14px;" class="dropdown-item" href="#!"><i class="icofont icofont-ui-block"></i>Bloquear</button>
                                                                        </form>
                                                                    </div>

                                                                </td>
                                                                @else
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Bloqueado</button>
                                                                        <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/view/{{ $usA->id }}/users"><i class="icofont icofont-eye-alt"></i>&nbsp; Ver</a>
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/consult/{{ $usA->id }}/users"><i class="icofont icofont-tasks-alt"></i>&nbsp; consultas</a>
                                                                            <form action="/manager/{{ $usA->id }}/users/unblock" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button style="font-size: 14px;" type="submit" class="dropdown-item" href="#!"><i class="icofont icofont-ui-block"></i>desbloquear</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{ $usersAdmin->links() }}

                                            </div>
                                        </div>
                                        <!-- personal card end-->
                                    </div>
                                    <!-- tab pane personal end -->
                                    <!-- tab pane info start -->
                                    <div class="tab-pane" id="binfo" role="tabpanel">
                                        <!-- info card start -->
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr class="text-capitalize">
                                                            <th>Avatar</th>
                                                            <th>Pais</th>
                                                            <th>Apellidos</th>
                                                            <th>Nombres</th>
                                                            <th>Correo</th>
                                                            <th>Teléfono</th>
                                                            <th>Registro</th>
                                                            <th>Acciones</th>
                                                            <th style="text-align: center;">Mensaja Ceo</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($usersClient as $key => $usC)
                                                            <tr>
                                                                <td><img width="30"  height="30" src="/avatars/{{ $usC->avatar }}"></td>
                                                                <td title="{{ strtolower($usC->country) }}"><i class="flag-icon flag-icon-{{ strtolower($usC->country) }} m-r-5"></i></td>
                                                                <td>{{ $usC->lastname }}</td>
                                                                <td>{{ $usC->name }}</td>
                                                                <td>{{ $usC->email }}</td>
                                                                <td>{{ $usC->phone }}</td>
                                                                <td>{{ $usC->created_at }}</td>
                                                                @if($usC->state==0)
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Activo</button>
                                                                        <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/view/{{ $usC->id }}/users"><i class="icofont icofont-eye-alt"></i>Ver</a>
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/consult/{{ $usC->id }}/users"><i class="icofont icofont-tasks-alt"></i>consultas</a>
                                                                            <form action="/manager/{{ $usC->id }}/users/blocked" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button type="submit" style="font-size: 14px;" class="dropdown-item" href="#!"><i class="icofont icofont-ui-block"></i>Bloquear</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        @if($usC->ceo_send==1)
                                                                            <button class="btn btn-sm btn-default" type="submit" style="font-size: 14px;" ><i class="icofont icofont-ui-message"></i>Mensaje Enviado</button>
                                                                       @else
                                                                            <form action="/manager/{{ $usC->email }}/users/sendMeCeo" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button class="btn btn-sm btn-info" type="submit" style="font-size: 14px;" ><i class="icofont icofont-ui-message"></i>Enviar mensaje</button>
                                                                            </form>
                                                                        @endif
                                                                    </td>
                                                                @else
                                                                    <td style="text-align: center;">
                                                                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Bloqueado</button>
                                                                        <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/view/{{ $usC->id }}/users"><i class="icofont icofont-eye-alt"></i>&nbsp; Ver</a>
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/consult/{{ $usC->id }}/users"><i class="icofont icofont-tasks-alt"></i>&nbsp; consultas</a>
                                                                            <form action="/manager/{{ $usC->id }}/users/unblock" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button style="font-size: 14px;" type="submit" class="dropdown-item" href="#!"><i class="icofont icofont-ui-block"></i>desbloquear</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if($usC->ceo_send==1)
                                                                            <button class="btn btn-sm btn-default" type="submit" style="font-size: 14px;" ><i class="icofont icofont-ui-message"></i>Mensaje Enviado</button>
                                                                        @else
                                                                            <form action="/manager/{{ $usC->email }}/users/sendMeCeo" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button class="btn btn-sm btn-info" type="submit" style="font-size: 14px;" ><i class="icofont icofont-ui-message"></i>Enviar mensaje</button>
                                                                            </form>
                                                                        @endif
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                {{ $usersClient->links() }}
                                            </div>
                                        </div>
                                        <!-- info card end -->
                                    </div>
                                    <!-- tab pane info end -->
                                    <!-- tab pane contact start -->
                                    <div class="tab-pane" id="contacts" role="tabpanel">
                                        <!-- info card start -->
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr class="text-capitalize">
                                                            <th>Avatar</th>
                                                            <th>Pais</th>
                                                            <th>Apellidos</th>
                                                            <th>Nombres</th>
                                                            <th>Correo</th>
                                                            <th>Teléfono</th>
                                                            <th>Registro</th>
                                                            <th>Acciones</th>
                                                            <th style="text-align: center;">Mensaja Ceo</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($usersVisitor as $key => $usV)
                                                            <tr>
                                                                <td><img width="30"  height="30" src="/avatars/{{ $usV->avatar }}"></td>
                                                                <td title="{{ strtolower($usV->country) }}"><i class="flag-icon flag-icon-{{ strtolower($usV->country) }} m-r-5"></i></td>
                                                                <td>{{ $usV->lastname }}</td>
                                                                <td>{{ $usV->name }}</td>
                                                                <td>{{ $usV->email }}</td>
                                                                <td>{{ $usV->phone }}</td>
                                                                <td>{{ $usV->created_at }}</td>
                                                                @if($usV->state==0)
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Activo</button>
                                                                        <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/view/{{ $usV->id }}/users"><i class="icofont icofont-eye-alt"></i>Ver</a>
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/consult/{{ $usV->id }}/users"><i class="icofont icofont-tasks-alt"></i>consultas</a>
                                                                            <form action="/manager/{{ $usV->id }}/users/blocked" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button type="submit" style="font-size: 14px;" class="dropdown-item" href="#!"><i class="icofont icofont-ui-block"></i>Bloquear</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <form action="/manager/{{ $usV->email }}/users/sendMeCeo" method="post">
                                                                            {{ csrf_field() }}
                                                                            <button class="btn btn-sm btn-info" type="submit" style="font-size: 14px;" ><i class="icofont icofont-ui-message"></i>Enviar mensaje</button>
                                                                        </form>
                                                                    </td>
                                                                @else
                                                                    <td style="text-align: center;">
                                                                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Bloqueado</button>
                                                                        <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/view/{{ $usV->id }}/users"><i class="icofont icofont-eye-alt"></i>&nbsp; Ver</a>
                                                                            <a style="margin-left: 4px;" class="dropdown-item" href="/manager/consult/{{ $usV->id }}/users"><i class="icofont icofont-tasks-alt"></i>&nbsp; consultas</a>
                                                                            <form action="/manager/{{ $usV->id }}/users/unblock" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button style="font-size: 14px;" type="submit" class="dropdown-item" href="#!"><i class="icofont icofont-ui-block"></i>desbloquear</button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        @if($usV->ceo_send==1)
                                                                            <button class="btn btn-sm btn-default" type="submit" style="font-size: 14px;" ><i class="icofont icofont-ui-message"></i>Mensaje Enviado</button>
                                                                        @else
                                                                            <form action="/manager/{{ $usV->email }}/users/sendMeCeo" method="post">
                                                                                {{ csrf_field() }}
                                                                                <button class="btn btn-sm btn-info" type="submit" style="font-size: 14px;" ><i class="icofont icofont-ui-message"></i>Enviar mensaje</button>
                                                                            </form>
                                                                        @endif
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                {{ $usersVisitor->links() }}

                                            </div>
                                        </div>
                                        <!-- info card end -->
                                    </div>
                                    <!-- tab pane contact end -->

                                </div>
                                <!-- tab content end -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">NUEVO ADMINISTRADOR</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/manager/admin/create" onsubmit="return checkSubmit();">
                @csrf
                <div class="modal-body">
                    <div class="input-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ingrese Nombres" title="Ingrese Nombres">
                    </div>

                    <div class="input-group">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" placeholder="Ingrese Apellidos" />
                    </div>
                    <div>Fecha de Nacimiento
                        <input  type="date" style="width:100%;" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" title="Fecha de Nacimiento" placeholder="Fecha de Nacimiento (año-mes-dia)" />
                    </div>
                    <br/>
                    <div class="input-group">
                        <select class="form-control" name="country" title="Seleccione su Pais" required>
                            <option value="li">liechtenstein</option>
                            <option value="lt">lituania</option>
                            <option value="lu">luxemburgo</option>
                            <option value="mk">macedonia, ex-república yugoslava de</option>
                            <option value="mg">madagascar</option>
                            <option value="my">malasia</option>
                            <option value="mw">malawi</option> <option value="mv">maldivas</option> <option value="ml">malí</option> <option value="mt">malta</option> <option value="ma">marruecos</option> <option value="mq">martinica</option> <option value="mu">mauricio</option> <option value="mr">mauritania</option> <option value="yt">mayotte</option> <option value="mx">méxico</option> <option value="fm">micronesia</option> <option value="md">moldavia</option> <option value="mc">mónaco</option> <option value="mn">mongolia</option> <option value="ms">montserrat</option> <option value="mz">mozambique</option> <option value="na">namibia</option> <option value="nr">nauru</option> <option value="np">nepal</option> <option value="ni">nicaragua</option> <option value="ne">níger</option> <option value="ng">nigeria</option> <option value="nu">niue</option> <option value="nf">norfolk</option> <option value="no">noruega</option> <option value="nc">nueva caledonia</option> <option value="nz">nueva zelanda</option> <option value="om">omán</option> <option value="nl">países bajos</option> <option value="pa">panamá</option> <option value="pg">papúa nueva guinea</option> <option value="pk">paquistán</option> <option value="py">paraguay</option> <option value="pe" selected>perú</option> <option value="pn">pitcairn</option> <option value="pf">polinesia francesa</option> <option value="pl">polonia</option> <option value="pt">portugal</option> <option value="pr">puerto rico</option> <option value="qa">qatar</option> <option value="uk">reino unido</option> <option value="cf">república centroafricana</option> <option value="cz">república checa</option> <option value="za">república de sudáfrica</option> <option value="do">república dominicana</option> <option value="sk">república eslovaca</option> <option value="re">reunión</option> <option value="rw">ruanda</option> <option value="ro">rumania</option> <option value="ru">rusia</option> <option value="eh">sahara occidental</option> <option value="kn">saint kitts y nevis</option> <option value="ws">samoa</option> <option value="as">samoa americana</option> <option value="sm">san marino</option> <option value="vc">san vicente y granadinas</option> <option value="sh">santa helena</option> <option value="lc">santa lucía</option> <option value="st">santo tomé y príncipe</option> <option value="sn">senegal</option> <option value="sc">seychelles</option> <option value="sl">sierra leona</option> <option value="sg">singapur</option> <option value="sy">siria</option> <option value="so">somalia</option> <option value="lk">sri lanka</option> <option value="pm">st pierre y miquelon</option> <option value="sz">suazilandia</option> <option value="sd">sudán</option> <option value="se">suecia</option> <option value="ch">suiza</option> <option value="sr">surinam</option> <option value="th">tailandia</option> <option value="tw">taiwán</option> <option value="tz">tanzania</option> <option value="tj">tayikistán</option> <option value="tf">territorios franceses del sur</option> <option value="tp">timor oriental</option> <option value="tg">togo</option> <option value="to">tonga</option> <option value="tt">trinidad y tobago</option> <option value="tn">túnez</option> <option value="tm">turkmenistán</option> <option value="tr">turquía</option> <option value="tv">tuvalu</option> <option value="ua">ucrania</option> <option value="ug">uganda</option> <option value="uy">uruguay</option> <option value="uz">uzbekistán</option> <option value="vu">vanuatu</option> <option value="ve">venezuela</option> <option value="vn">vietnam</option> <option value="ye">yemen</option> <option value="yu">yugoslavia</option> <option value="zm">zambia</option> <option value="zw">zimbabue</option>

                        </select>
                    </div>
                    </fieldset>
                    <fieldset>
                        <div class="input-group">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Ingrese teléfono" />
                        </div>
                        <div class="input-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Su correo" />
                        </div>
                        <div class="input-group">
                            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingrese una clave">
                        </div>

                </div>
                <div class="modal-footer" id="btnShow">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

                <div class="modal-footer" style="display: none;"  id="btnhidden">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" disabled="" class="btn btn-primary">Registrando...</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- modal success -->
<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Éxito</h4>

            </div>
            <div class="modal-body">
                <div style="text-align: center;" ><img src="/img/success.png" width="100px" height="100px">
                    <p></p>
                    <span class="center" style="width: 10px;">{{session('success')}}</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@include('copyright.footer')
@include('layouts.admin.piehome')
</body>