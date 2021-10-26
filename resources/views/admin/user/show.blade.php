<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')

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


<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>INFORMACIÓN DEL USUARIO</h4>
                <span>Usuarios registrados</span>
            </div>

        </div>
        <!-- Page-header end -->
        <!-- Page-body start -->

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table class="table table-bordered">
                                    @foreach ($user as $key => $us)
                                        <tbody>
                                        <tr>
                                            <th>APELLIDOS: </th>
                                            <td>{{ $us->name }}</td>
                                            <td><strong>NOMBRES:</strong> </td>
                                            <td colspan="2">{{ $us->lastname }}</td>
                                            <td STYLE="text-align: center;" rowspan="2"><img  height="120px;" width="120px;" src="/avatars/{{$us->avatar}}">
                                            <br/>
                                            NIVEL: {{ $us->levelUser($us->level) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><strong>CORREO:</strong></th>
                                            <td >{{ $us->email }}</td>
                                            <th><strong>TELÉFONO:</strong></th>
                                            <td >{{ $us->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th><strong>TIPO:</strong></th>
                                            <td>{{ $us->getType($us->tipo) }}</td>
                                            <th><strong>CUMPLEAÑOS:</strong></th>
                                            <td colspan="2">{{ $us->birthdate }}</td>
                                            <td style="text-align: center;"><i class="flag-icon flag-icon-{{ $us->country }} m-r-5"> </i>{{ strtoupper($us->country) }}</td>
                                        </tr>
                                        <tr>
                                            <th><strong>ESTADO:</strong></th>
                                            <td>{{ $us->getState($us->state) }}</td>
                                            <th><strong>REGISTRADO:</strong></th>
                                            <td colspan="2">{{ $us->created_at }}</td>
                                            <td style="text-align: center;">{{ $us->visitor }}</td>
                                        </tr>
                                        <tr>
                                            <th><strong>ACTUALIZADO:</strong></th>
                                            <td>{{ $us->updated_at }}</td>
                                            <th><strong>EMAIL VERIFICADO:</strong></th>
                                            <td style="text-align: center;" colspan="3"><span style="color:darkgreen;">{{ $us->getEmailVerified($us->email_verified_at) }}</span></td>

                                        </tr>

                                        </tbody>
                                    @endforeach
                                </table>
                            </div>

                            <div class="dt-responsive table-responsive">
                                <table class="table table-bordered">

                                        <tbody>
                                        <tr>
                                            <td>CANT. DE ANUNCIOS: </td>
                                            <td style="text-align: center;">{{ $ad_count }}</td>
                                            <td>CANT COMENTARIOS:</td>
                                            <td colspan="2" style="text-align: center;">{{ $comm_count }}</td>
                                        </tr>
                                        <tr>
                                            <td>CANT. DE VISTOS: </td>
                                            <td style="text-align: center;">{{ $views_count }}</td>
                                            <td>CANT CLIKS SITIO WEBS:</td>
                                            <td colspan="2" style="text-align: center;">{{ $urls_count }}</td>
                                        </tr>
                                        <form action="/manager/changelevel" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $id }}">
                                            <tr>
                                                <td colspan="4">
                                                    NIVEL DE ANUNCIANTE:
                                                    <select style="width: 100%;" class="form-control" name="level">
                                                        @if($level == 2)
                                                            <option selected value="2">ANUNCIANTE ORO</option>
                                                            <option value="1">ANUNCIANTE PLATA</option>
                                                            <option value="0">ANUNCIANTE BRONCE</option>
                                                        @elseif($level == 1)
                                                            <option value="2">ANUNCIANTE ORO</option>
                                                            <option selected value="1">ANUNCIANTE PLATA</option>
                                                            <option value="0">ANUNCIANTE BRONCE</option>
                                                        @elseif($level == 0)
                                                            <option value="2">ANUNCIANTE ORO</option>
                                                            <option value="1">ANUNCIANTE PLATA</option>
                                                            <option selected value="0">ANUNCIANTE BRONCE</option>
                                                        @endif
                                                    </select>
                                                    <br/>
                                                    <button type="submit" style="width: 100%;" class="btn btn-sm btn-success">ACTUALIZAR NIVEL DEL ANUNCIANTE</button>
                                                </td>
                                            </tr>

                                        </form>


                                        </tbody>

                                </table>
                            </div>
                        </div>
                    </div>




                </div>
            </div>


        </div>

        <!-- Page-body end -->


    </div>
</div>
@include('copyright.footer')
@include('layouts.admin.piehome')
</body>
</html>