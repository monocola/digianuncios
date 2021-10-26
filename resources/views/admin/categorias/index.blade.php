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
<!-- Sidebar inner chat start-->
<!-- Sidebar inner chat end-->
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>{{$titulo}}</h4>
                <span>{{$subtitulo}}</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/manager/categorias/nuevo')}}" class="btn btn-secondary">Nueva Categoría</a>
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

                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Nº</th>
                                        <th>Pais</th>
                                        <th>Categoría</th>
                                        <th>Descripción</th>
                                        <th style="text-align: center;">Estatus</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th style="text-align: center;">Administrar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categorias as $key => $cat)
                                    <tr>
                                        <td style="text-align: center;">{{ $key+1 }}</td>
                                        <td title="{{ strtolower($cat->country) }}">
                                            <a data-toggle="modal" data-target="#exampleModalx-{{ $cat->id }}"><i class="flag-icon flag-icon-{{ strtolower($cat->country) }} m-r-5"></i></a>
                                            </td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->descripcion }}</td>
                                        <td style="text-align: center;">
                                            @if($cat->estatus==0)
                                                <span class="label label-danger">Inactivo</span>
                                            @endif
                                            @if($cat->estatus==1)
                                                <span class="label label-primary">Activo</span>
                                            @endif
                                            @if($cat->estatus==2)
                                                <span class="label label-warning">Sugerida</span>
                                            @endif
                                        </td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>{{ $cat->updated_at }}</td>
                                        <td style="text-align: center;">
                                            <a data-toggle="modal" data-target="#exampleModal-{{$cat->id}}" class="btn btn-sm btn-outline-primary">Editar</a>
                                        </td>
                                        @include('admin.categorias.modal-editar')
                                    </tr>

                                    <div class="modal fade" id="exampleModalx-{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Pais</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="/manager/categoriacountry" onsubmit="return checkSubmit();">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">Seleccione Pais
                                                                        <select class="form-control" style="width: 100%;" name="country" title="Seleccione su Pais">
                                                                            <option value="af">Afganistán</option>
                                                                            <option value="al">Albania</option>
                                                                            <option value="de">Alemania</option>
                                                                            <option value="ad">Andorra</option>
                                                                            <option value="ao">Angola</option>
                                                                            <option value="ai">Anguilla</option>
                                                                            <option value="aq">Antártida</option>
                                                                            <option value="ag">Antigua y Barbuda</option>
                                                                            <option value="an">Antillas Holandesas</option>
                                                                            <option value="sa">Arabia Saudí</option>
                                                                            <option value="dz">Argelia</option>
                                                                            <option value="ar">Argentina</option>
                                                                            <option value="am">Armenia</option>
                                                                            <option value="aw">Aruba</option>
                                                                            <option value="au">Australia</option>
                                                                            <option value="at">Austria</option>
                                                                            <option value="az">Azerbaiyán</option>
                                                                            <option value="bs">Bahamas</option>
                                                                            <option value="bh">Bahrein</option>
                                                                            <option value="bd">Bangladesh</option>
                                                                            <option value="bb">Barbados</option>
                                                                            <option value="be">Bélgica</option>
                                                                            <option value="bz">Belice</option>
                                                                            <option value="bj">Benin</option>
                                                                            <option value="bm">Bermudas</option>
                                                                            <option value="by">Bielorrusia</option>
                                                                            <option value="mm">Birmania</option>
                                                                            <option value="bo">Bolivia</option>
                                                                            <option value="ba">Bosnia y Herzegovina</option>
                                                                            <option value="bw">Botswana</option>
                                                                            <option value="br">Brasil</option>
                                                                            <option value="bn">Brunei</option>
                                                                            <option value="bg">Bulgaria</option>
                                                                            <option value="bf">Burkina Faso</option>
                                                                            <option value="bi">Burundi</option>
                                                                            <option value="bt">Bután</option>
                                                                            <option value="cv">Cabo Verde</option>
                                                                            <option value="kh">Camboya</option>
                                                                            <option value="cm">Camerún</option>
                                                                            <option value="ca">Canadá</option>
                                                                            <option value="td">Chad</option>
                                                                            <option value="cl">Chile</option>
                                                                            <option value="cn">China</option>
                                                                            <option value="cy">Chipre</option>
                                                                            <option value="va">Ciudad del Vaticano (Santa Sede)</option>
                                                                            <option value="co">Colombia</option>
                                                                            <option value="km">Comores</option>
                                                                            <option value="cg">Congo</option>
                                                                            <option value="cd">Congo, República Democrática del</option>
                                                                            <option value="kr">Corea</option>
                                                                            <option value="kp">Corea del Norte</option>
                                                                            <option value="ci">Costa de Marfíl</option>
                                                                            <option value="cr">Costa Rica</option>
                                                                            <option value="hr">Croacia (Hrvatska)</option>
                                                                            <option value="cu">Cuba</option>
                                                                            <option value="dk">Dinamarca</option>
                                                                            <option value="dj">Djibouti</option>
                                                                            <option value="dm">Dominica</option>
                                                                            <option value="ec">Ecuador</option>
                                                                            <option value="eg">Egipto</option>
                                                                            <option value="sv">El Salvador</option>
                                                                            <option value="ae">Emiratos Árabes Unidos</option>
                                                                            <option value="er">Eritrea</option>
                                                                            <option value="si">Eslovenia</option>
                                                                            <option value="es">España</option>
                                                                            <option value="us">Estados Unidos</option>
                                                                            <option value="ee">Estonia</option>
                                                                            <option value="et">Etiopía</option>
                                                                            <option value="fj">Fiji</option>
                                                                            <option value="ph">Filipinas</option>
                                                                            <option value="fi">Finlandia</option>
                                                                            <option value="fr">Francia</option>
                                                                            <option value="ga">Gabón</option>
                                                                            <option value="gm">Gambia</option>
                                                                            <option value="ge">Georgia</option>
                                                                            <option value="gh">Ghana</option>
                                                                            <option value="gi">Gibraltar</option>
                                                                            <option value="gd">Granada</option>
                                                                            <option value="gr">Grecia</option>
                                                                            <option value="gl">Groenlandia</option>
                                                                            <option value="gp">Guadalupe</option>
                                                                            <option value="gu">Guam</option>
                                                                            <option value="gt">Guatemala</option>
                                                                            <option value="gy">Guayana</option>
                                                                            <option value="gf">Guayana Francesa</option>
                                                                            <option value="gn">Guinea</option>
                                                                            <option value="gq">Guinea Ecuatorial</option>
                                                                            <option value="gw">Guinea-Bissau</option>
                                                                            <option value="ht">Haití</option>
                                                                            <option value="hn">Honduras</option>
                                                                            <option value="hu">Hungría</option>
                                                                            <option value="in">India</option>
                                                                            <option value="id">Indonesia</option>
                                                                            <option value="iq">Irak</option>
                                                                            <option value="ir">Irán</option>
                                                                            <option value="ie">Irlanda</option>
                                                                            <option value="bv">Isla Bouvet</option>
                                                                            <option value="cx">Isla de Christmas</option>
                                                                            <option value="is">Islandia</option>
                                                                            <option value="ky">Islas Caimán</option>
                                                                            <option value="ck">Islas Cook</option>
                                                                            <option value="cc">Islas de Cocos o Keeling</option>
                                                                            <option value="fo">Islas Faroe</option>
                                                                            <option value="hm">Islas Heard y McDonald</option>
                                                                            <option value="fk">Islas Malvinas</option>
                                                                            <option value="mp">Islas Marianas del Norte</option>
                                                                            <option value="mh">Islas Marshall</option>
                                                                            <option value="um">Islas menores de Estados Unidos</option>
                                                                            <option value="pw">Islas Palau</option>
                                                                            <option value="sb">Islas Salomón</option>
                                                                            <option value="sj">Islas Svalbard y Jan Mayen</option>
                                                                            <option value="tk">Islas Tokelau</option>
                                                                            <option value="tc">Islas Turks y Caicos</option>
                                                                            <option value="vi">Islas Vírgenes (EEUU)</option>
                                                                            <option value="vg">Islas Vírgenes (Reino Unido)</option>
                                                                            <option value="wf">Islas Wallis y Futuna</option>
                                                                            <option value="il">Israel</option>
                                                                            <option value="it">Italia</option>
                                                                            <option value="jm">Jamaica</option>
                                                                            <option value="jp">Japón</option>
                                                                            <option value="jo">Jordania</option>
                                                                            <option value="kz">Kazajistán</option>
                                                                            <option value="ke">Kenia</option>
                                                                            <option value="kg">Kirguizistán</option>
                                                                            <option value="ki">Kiribati</option>
                                                                            <option value="kw">Kuwait</option>
                                                                            <option value="la">Laos</option>
                                                                            <option value="ls">Lesotho</option>
                                                                            <option value="lv">Letonia</option>
                                                                            <option value="lb">Líbano</option>
                                                                            <option value="lr">Liberia</option>
                                                                            <option value="ly">Libia</option>
                                                                            <option value="li">Liechtenstein</option>
                                                                            <option value="lt">Lituania</option>
                                                                            <option value="lu">Luxemburgo</option>
                                                                            <option value="mk">Macedonia, Ex-república yugoslava de</option>
                                                                            <option value="mg">Madagascar</option>
                                                                            <option value="my">Malasia</option>
                                                                            <option value="mw">Malawi</option>
                                                                            <option value="mv">maldivas</option>
                                                                            <option value="ml">malí</option>
                                                                            <option value="mt">malta</option>
                                                                            <option value="ma">marruecos</option>
                                                                            <option value="mq">martinica</option>
                                                                            <option value="mu">mauricio</option>
                                                                            <option value="mr">mauritania</option>
                                                                            <option value="yt">mayotte</option>
                                                                            <option value="mx">méxico</option>
                                                                            <option value="fm">micronesia</option>
                                                                            <option value="md">moldavia</option>
                                                                            <option value="mc">mónaco</option>
                                                                            <option value="mn">mongolia</option>
                                                                            <option value="ms">montserrat</option>
                                                                            <option value="mz">mozambique</option>
                                                                            <option value="na">namibia</option>
                                                                            <option value="nr">nauru</option>
                                                                            <option value="np">nepal</option>
                                                                            <option value="ni">nicaragua</option>
                                                                            <option value="ne">níger</option>
                                                                            <option value="ng">nigeria</option>
                                                                            <option value="nu">niue</option>
                                                                            <option value="nf">norfolk</option>
                                                                            @if(strtolower($cat->country)=='us')
                                                                                <option selected value="{{ strtolower($cat->country) }}">Estados Unidos</option>
                                                                            @elseif(strtolower($cat->country)=='cl')
                                                                                <option selected value="{{ strtolower($cat->country) }}">Chile</option>
                                                                            @elseif(strtolower($cat->country)=='pe')
                                                                                <option selected value="{{ strtolower($cat->country) }}">Perú</option>
                                                                            @endif
                                                                            <option value="no">noruega</option>
                                                                            <option value="nc">nueva caledonia</option>
                                                                            <option value="nz">nueva zelanda</option>
                                                                            <option value="om">omán</option>
                                                                            <option value="nl">países bajos</option>
                                                                            <option value="pa">panamá</option>
                                                                            <option value="pg">papúa nueva guinea</option>
                                                                            <option value="pk">paquistán</option>
                                                                            <option value="py">paraguay</option>
                                                                            <option value="pe">perú</option>
                                                                            <option value="pn">pitcairn</option>
                                                                            <option value="pf">polinesia francesa</option>
                                                                            <option value="pl">polonia</option>
                                                                            <option value="pt">portugal</option>
                                                                            <option value="pr">puerto rico</option>
                                                                            <option value="qa">qatar</option>
                                                                            <option value="uk">reino unido</option>
                                                                            <option value="cf">república centroafricana</option>
                                                                            <option value="cz">república checa</option>
                                                                            <option value="za">república de sudáfrica</option>
                                                                            <option value="do">república dominicana</option>
                                                                            <option value="sk">república eslovaca</option>
                                                                            <option value="re">reunión</option>
                                                                            <option value="rw">ruanda</option>
                                                                            <option value="ro">rumania</option>
                                                                            <option value="ru">rusia</option>
                                                                            <option value="eh">sahara occidental</option>
                                                                            <option value="kn">saint kitts y nevis</option>
                                                                            <option value="ws">samoa</option>
                                                                            <option value="as">samoa americana</option>
                                                                            <option value="sm">san marino</option>
                                                                            <option value="vc">san vicente y granadinas</option>
                                                                            <option value="sh">santa helena</option>
                                                                            <option value="lc">santa lucía</option>
                                                                            <option value="st">santo tomé y príncipe</option>
                                                                            <option value="sn">senegal</option>
                                                                            <option value="sc">seychelles</option>
                                                                            <option value="sl">sierra leona</option>
                                                                            <option value="sg">singapur</option>
                                                                            <option value="sy">siria</option>
                                                                            <option value="so">somalia</option>
                                                                            <option value="lk">sri lanka</option>
                                                                            <option value="pm">st pierre y miquelon</option>
                                                                            <option value="sz">suazilandia</option>
                                                                            <option value="sd">sudán</option>
                                                                            <option value="se">suecia</option>
                                                                            <option value="ch">suiza</option>
                                                                            <option value="sr">surinam</option>
                                                                            <option value="th">tailandia</option>
                                                                            <option value="tw">taiwán</option>
                                                                            <option value="tz">tanzania</option>
                                                                            <option value="tj">tayikistán</option>
                                                                            <option value="tf">territorios franceses del sur</option>
                                                                            <option value="tp">timor oriental</option>
                                                                            <option value="tg">togo</option>
                                                                            <option value="to">tonga</option>
                                                                            <option value="tt">trinidad y tobago</option>
                                                                            <option value="tn">túnez</option>
                                                                            <option value="tm">turkmenistán</option>
                                                                            <option value="tr">turquía</option>
                                                                            <option value="tv">tuvalu</option>
                                                                            <option value="ua">ucrania</option>
                                                                            <option value="ug">uganda</option>
                                                                            <option value="uy">uruguay</option>
                                                                            <option value="uz">uzbekistán</option>
                                                                            <option value="vu">vanuatu</option>
                                                                            <option value="ve">venezuela</option>
                                                                            <option value="vn">vietnam</option>
                                                                            <option value="ye">yemen</option>
                                                                            <option value="yu">yugoslavia</option>
                                                                            <option value="zm">zambia</option>
                                                                            <option value="zw">zimbabue</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <input type="hidden" name="cat_id" value="{{ $cat->id }} ">
                                                    </div>
                                                    <div class="modal-footer" id="btnShow">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>

                                {{ $categorias->links() }}
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
