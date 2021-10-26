<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')
@if (session('notification'))

    <script>
        $( document ).ready(function() {
            $('#default-Modal').modal('toggle')
        });
    </script>
@endif
<body class="header-fixed">

<!-- Menu header start -->
@include('layouts.admin.menu')
<!-- Menu header end -->
<!-- Menu aside start -->
@include('layouts.admin.vertical')
<!-- Menu aside end -->
<!-- Sidebar chat start -->

<!-- Sidebar inner chat start-->

<!-- Sidebar inner chat end-->
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>NUEVO ANUNCIO </h4>
                <span></span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('/misAnuncios')}}">Mis Anuncios</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Nuevo Anuncio</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page header end -->
        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Form Inputs card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Formulario de Nuevo Anuncio</h5>
                            <span></span>

                        </div>
                        <div class="card-block">


                            <div class="row">
                                <div class="col-sm-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger icons-alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>

                                            Error<br/>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </div>
                                    @endif



                                        @if (session('notification1'))

                                            <div class="alert alert-danger icons-alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled"></i>
                                                </button>

                                                Error<br/>

                                                    <li>{{ session('notification1') }}</li>
                                            </div>

                                        @endif

                                        @if (session('notification2'))

                                            <div class="alert alert-danger icons-alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="icofont icofont-close-line-circled"></i>
                                                </button>

                                                Error<br/>

                                                <li>{{ session('notification2') }}</li>
                                            </div>

                                        @endif



                                    <form method="POST" action="/admin/miAnuncio" enctype="multipart/form-data" onsubmit="return checkSubmit();" >
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <div class="col-sm-12">Seleccione  Categoría
                                                <select class="js-example-basic-single col-sm-12" name="category_name">
                                                        <option value="" >Seleccione...</option>
                                                    @foreach ($categorias as $key => $cat)
                                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Titulo del Anuncio ó Empresa
                                                <input type="text" name="titulo" class="form-control form-txt-success" style="width: 100%;" value="{{ old('titulo') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Descripción
                                                <textarea type="text" name="descripcion" class="form-control form-txt-success" style="width: 100%;">{{ old('descripcion') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Dirección del anuncio
                                                <input type="text" name="direccion" class="form-control form-txt-success" style="width: 100%;" value="{{ old('direccion') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">Distrito
                                                <input type="text" name="distrito" class="form-control form-txt-success" style="width: 100%;" value="{{ old('distrito') }}">
                                            </div>
                                            <div class="col-sm-6">Provincia
                                                <input type="text" name="provincia" class="form-control form-txt-success" style="width: 100%;" value="{{ old('provincia') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">Departamento
                                                <input type="text" name="departamento" class="form-control form-txt-success" style="width: 100%;" value="{{ old('departamento') }}">
                                            </div>
                                            <div class="col-sm-6">Seleccione  Pais
                                                <select class="js-example-basic-single col-sm-12" name="pais">
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
                                                    <option selected value="{{ strtolower($arr_ip->iso_code) }}">{{ $arr_ip->country }}</option>
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
                                        <div class="form-group row">
                                            <div class="col-sm-6">Teléfono
                                                <input type="text" name="telefono" class="form-control form-txt-success" style="width: 100%;" value="{{ old('telefono') }}">
                                            </div>
                                            <div class="col-sm-6">Correo
                                                <input type="text" name="correo" class="form-control form-txt-success" style="width: 100%;" value="{{ old('correo') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">Facebook
                                                <input type="text" name="url_facebook" class="form-control form-txt-success" style="width: 100%;" value="{{ old('url_facebook') }}">
                                            </div>
                                            <div class="col-sm-6">Twitter
                                                <input type="text" name="url_twitter" class="form-control form-txt-success" style="width: 100%;" value="{{ old('url_twitter') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">Instagram
                                                <input type="text" name="url_instagram" class="form-control form-txt-success" style="width: 100%;" value="{{ old('url_instagram') }}">
                                            </div>
                                            <div class="col-sm-6">Pinterest
                                                <input type="text" name="url_pinterest" class="form-control form-txt-success" style="width: 100%;" value="{{ old('url_pinterest') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6">Página Web
                                                <input type="text" name="sitioweb" class="form-control form-txt-success" style="width: 100%;" value="{{ old('sitioweb') }}">
                                                <span style="color:#A4A4A4;">Ejemplo: www.mipagina.com</span>
                                            </div>
                                            <div class="col-sm-6">Subir mi Arte<a href="#" data-toggle="modal" data-target="#exampleModal"> [Ver Restricciones]</a>
                                                <input type="file" accept="image/jpeg,image/png" name="archivo" class="form-control form-txt-success" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="background:#f3f3f3">

                                            <div class="col-sm-3">
                                                <div class="border-checkbox-section">

                                                    <div>
                                                        <input  type="checkbox" value="1" name="card">
                                                        <label>Se Acepta Pago con tarjeta.</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="border-checkbox-section">

                                                    <div>
                                                        <input  type="checkbox" value="1" name="delivery">
                                                        <label>Se Acepta Envio a domicilio.</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="border-checkbox-section">

                                                    <div>
                                                        <input  type="checkbox" value="1" name="delivery_international">
                                                        <label>Se Acepta Envios Internacionales.</label>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-6">
                                                <div class="border-checkbox-section">

                                                    <div>
                                                        <input  type="checkbox" value="1" name="chTermYCond" onclick="btTutorial.disabled = !this.checked">
                                                        <label>He leido y aceptado los <a href="#" data-toggle="modal" data-target="#exampleModalLong-x" class="border-checkbox-label" > términos y condiciones.</a></label>
                                                    </div>

                                                </div>
                                            </div>
                                            @include('pages.terms')
                                        </div>



                                        <div class="row" style="text-align: right;" id="btnShow">
                                            <label class="col-sm-12"></label>
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-success m-b-0" value="Agregar" name="btTutorial" disabled>
                                                <a href="{{url('/admin/misAnuncios')}}" class="btn btn-outline-warning m-b-0">Volver</a>
                                            </div>
                                        </div>

                                        <div style="display: none;" class="text-right" id="btnhidden">
                                            <label class="col-sm-12"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" disabled=""  class="btn btn-success m-b-0">Enviando...</button>
                                                <a href="{{ url()->previous() }}" class="btn btn-outline-warning m-b-0">Volver</a>
                                            </div>
                                        </div>




                                    </form>
                                </div>



                                <!-- modal -->
                                <div class="col-sm-12">
                                    <div>

                                        <div class="card-block">

                                            <div class="animation-model">

                                                <div class="md-modal md-effect-1" id="modal-1">
                                                    <div class="md-content">
                                                        <h3>Restricciones</h3>
                                                        <div>
                                                            <ul>
                                                                <li><strong>Formatos Aceptados:</strong></br> jpg, png, jpeg.</li>
                                                                <li><strong>Dimensiones Aceptadas:</strong></br> Altura máxima: 475px | Ancho Máximo: 370px </li>
                                                                <li><strong>Tamaño Máximo Aceptado:</strong></br> 3Mb</li>
                                                                <p></p>
                                                                <li><strong>Importante: Requisitos Obligatorios.</strong></li>
                                                            </ul>
                                                            <button type="button" class="btn btn-primary waves-effect md-close">Entiendo!</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--animation modal  Dialogs ends -->
                                                <div class="md-overlay"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Restricciones</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <ul>
                                                        <li><strong>Formatos Aceptados:</strong></br> jpg, png, jpeg.</li>
                                                        <li><strong>Dimensiones Aceptadas:</strong></br> Altura máxima Permitida: 370px | Ancho Permitido: 475px </li>
                                                        <li><strong>Tamaño Aceptado:</strong></br> 3 Mb</li>
                                                        <p></p>
                                                        <li><strong>Importante: Requisitos Obligatorios.</strong></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Entiendo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal static-->
                               <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Éxito</h4>

                                            </div>
                                            <div class="modal-body">
                                                <div style="text-align: center;" ><img src="/img/success.png" width="100px" height="100px">
                                                <p></p>
                                                <span class="center" style="width: 10px;">Su Anuncio ha sido creado satisfactóriamente,</br> estaremos procesando para aprobación.</span>
                                                </div>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Page body end -->
</div>
</div>
@include('copyright.footer')
</body>
</html>
