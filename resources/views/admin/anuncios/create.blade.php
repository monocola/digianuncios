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
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>NUEVO ANUNCIO</h4>
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



                                    <form method="POST" action="/manager/ManagerAnuncio" enctype="multipart/form-data" onsubmit="return checkSubmit();" >
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <div class="col-sm-12">Seleccione  Categor??a
                                                <select class="js-example-basic-single col-sm-12" name="category_name">
                                                    <option value="" >Seleccione...</option>
                                                    @foreach ($categorias as $key => $cat)
                                                        <option value="{{ $cat->name }}">{{ $cat->name }} - [ {{ $cat->country }} ]</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Titulo del Anuncio ?? Empresa
                                                <input type="text" name="titulo" class="form-control form-txt-success" style="width: 100%;" value="{{ old('titulo') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Descripci??n
                                                <textarea type="text" name="descripcion" class="form-control form-txt-success" style="width: 100%;">{{ old('descripcion') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Direcci??n del anuncio
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
                                                    <option value="af">Afganist??n</option>
                                                    <option value="al">Albania</option>
                                                    <option value="de">Alemania</option>
                                                    <option value="ad">Andorra</option>
                                                    <option value="ao">Angola</option>
                                                    <option value="ai">Anguilla</option>
                                                    <option value="aq">Ant??rtida</option>
                                                    <option value="ag">Antigua y Barbuda</option>
                                                    <option value="an">Antillas Holandesas</option>
                                                    <option value="sa">Arabia Saud??</option>
                                                    <option value="dz">Argelia</option>
                                                    <option value="ar">Argentina</option>
                                                    <option value="am">Armenia</option>
                                                    <option value="aw">Aruba</option>
                                                    <option value="au">Australia</option>
                                                    <option value="at">Austria</option>
                                                    <option value="az">Azerbaiy??n</option>
                                                    <option value="bs">Bahamas</option>
                                                    <option value="bh">Bahrein</option>
                                                    <option value="bd">Bangladesh</option>
                                                    <option value="bb">Barbados</option>
                                                    <option value="be">B??lgica</option>
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
                                                    <option value="bt">But??n</option>
                                                    <option value="cv">Cabo Verde</option>
                                                    <option value="kh">Camboya</option>
                                                    <option value="cm">Camer??n</option>
                                                    <option value="ca">Canad??</option>
                                                    <option value="td">Chad</option>
                                                    <option value="cl">Chile</option>
                                                    <option value="cn">China</option>
                                                    <option value="cy">Chipre</option>
                                                    <option value="va">Ciudad del Vaticano (Santa Sede)</option>
                                                    <option value="co">Colombia</option>
                                                    <option value="km">Comores</option>
                                                    <option value="cg">Congo</option>
                                                    <option value="cd">Congo, Rep??blica Democr??tica del</option>
                                                    <option value="kr">Corea</option>
                                                    <option value="kp">Corea del Norte</option>
                                                    <option value="ci">Costa de Marf??l</option>
                                                    <option value="cr">Costa Rica</option>
                                                    <option value="hr">Croacia (Hrvatska)</option>
                                                    <option value="cu">Cuba</option>
                                                    <option value="dk">Dinamarca</option>
                                                    <option value="dj">Djibouti</option>
                                                    <option value="dm">Dominica</option>
                                                    <option value="ec">Ecuador</option>
                                                    <option value="eg">Egipto</option>
                                                    <option value="sv">El Salvador</option>
                                                    <option value="ae">Emiratos ??rabes Unidos</option>
                                                    <option value="er">Eritrea</option>
                                                    <option value="si">Eslovenia</option>
                                                    <option value="es">Espa??a</option>
                                                    <option value="us">Estados Unidos</option>
                                                    <option value="ee">Estonia</option>
                                                    <option value="et">Etiop??a</option>
                                                    <option value="fj">Fiji</option>
                                                    <option value="ph">Filipinas</option>
                                                    <option value="fi">Finlandia</option>
                                                    <option value="fr">Francia</option>
                                                    <option value="ga">Gab??n</option>
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
                                                    <option value="ht">Hait??</option>
                                                    <option value="hn">Honduras</option>
                                                    <option value="hu">Hungr??a</option>
                                                    <option value="in">India</option>
                                                    <option value="id">Indonesia</option>
                                                    <option value="iq">Irak</option>
                                                    <option value="ir">Ir??n</option>
                                                    <option value="ie">Irlanda</option>
                                                    <option value="bv">Isla Bouvet</option>
                                                    <option value="cx">Isla de Christmas</option>
                                                    <option value="is">Islandia</option>
                                                    <option value="ky">Islas Caim??n</option>
                                                    <option value="ck">Islas Cook</option>
                                                    <option value="cc">Islas de Cocos o Keeling</option>
                                                    <option value="fo">Islas Faroe</option>
                                                    <option value="hm">Islas Heard y McDonald</option>
                                                    <option value="fk">Islas Malvinas</option>
                                                    <option value="mp">Islas Marianas del Norte</option>
                                                    <option value="mh">Islas Marshall</option>
                                                    <option value="um">Islas menores de Estados Unidos</option>
                                                    <option value="pw">Islas Palau</option>
                                                    <option value="sb">Islas Salom??n</option>
                                                    <option value="sj">Islas Svalbard y Jan Mayen</option>
                                                    <option value="tk">Islas Tokelau</option>
                                                    <option value="tc">Islas Turks y Caicos</option>
                                                    <option value="vi">Islas V??rgenes (EEUU)</option>
                                                    <option value="vg">Islas V??rgenes (Reino Unido)</option>
                                                    <option value="wf">Islas Wallis y Futuna</option>
                                                    <option value="il">Israel</option>
                                                    <option value="it">Italia</option>
                                                    <option value="jm">Jamaica</option>
                                                    <option value="jp">Jap??n</option>
                                                    <option value="jo">Jordania</option>
                                                    <option value="kz">Kazajist??n</option>
                                                    <option value="ke">Kenia</option>
                                                    <option value="kg">Kirguizist??n</option>
                                                    <option value="ki">Kiribati</option>
                                                    <option value="kw">Kuwait</option>
                                                    <option value="la">Laos</option>
                                                    <option value="ls">Lesotho</option>
                                                    <option value="lv">Letonia</option>
                                                    <option value="lb">L??bano</option>
                                                    <option value="lr">Liberia</option>
                                                    <option value="ly">Libia</option>
                                                    <option value="li">Liechtenstein</option>
                                                    <option value="lt">Lituania</option>
                                                    <option value="lu">Luxemburgo</option>
                                                    <option value="mk">Macedonia, Ex-rep??blica yugoslava de</option>
                                                    <option value="mg">Madagascar</option>
                                                    <option value="my">Malasia</option>
                                                    <option value="mw">Malawi</option>
                                                    <option value="mv">maldivas</option>
                                                    <option value="ml">mal??</option>
                                                    <option value="mt">malta</option>
                                                    <option value="ma">marruecos</option>
                                                    <option value="mq">martinica</option>
                                                    <option value="mu">mauricio</option>
                                                    <option value="mr">mauritania</option>
                                                    <option value="yt">mayotte</option>
                                                    <option value="mx">m??xico</option>
                                                    <option value="fm">micronesia</option>
                                                    <option value="md">moldavia</option>
                                                    <option value="mc">m??naco</option>
                                                    <option value="mn">mongolia</option>
                                                    <option value="ms">montserrat</option>
                                                    <option value="mz">mozambique</option>
                                                    <option value="na">namibia</option>
                                                    <option value="nr">nauru</option>
                                                    <option value="np">nepal</option>
                                                    <option value="ni">nicaragua</option>
                                                    <option value="ne">n??ger</option>
                                                    <option value="ng">nigeria</option>
                                                    <option value="nu">niue</option>
                                                    <option value="nf">norfolk</option>
                                                    <option selected value="{{ strtolower($arr_ip->iso_code) }}">{{ $arr_ip->country }}</option>
                                                    <option value="no">noruega</option>
                                                    <option value="nc">nueva caledonia</option>
                                                    <option value="nz">nueva zelanda</option>
                                                    <option value="om">om??n</option>
                                                    <option value="nl">pa??ses bajos</option>
                                                    <option value="pa">panam??</option>
                                                    <option value="pg">pap??a nueva guinea</option>
                                                    <option value="pk">paquist??n</option>
                                                    <option value="py">paraguay</option>
                                                    <option value="pe">per??</option>
                                                    <option value="pn">pitcairn</option>
                                                    <option value="pf">polinesia francesa</option>
                                                    <option value="pl">polonia</option>
                                                    <option value="pt">portugal</option>
                                                    <option value="pr">puerto rico</option>
                                                    <option value="qa">qatar</option>
                                                    <option value="uk">reino unido</option>
                                                    <option value="cf">rep??blica centroafricana</option>
                                                    <option value="cz">rep??blica checa</option>
                                                    <option value="za">rep??blica de sud??frica</option>
                                                    <option value="do">rep??blica dominicana</option>
                                                    <option value="sk">rep??blica eslovaca</option>
                                                    <option value="re">reuni??n</option>
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
                                                    <option value="lc">santa luc??a</option>
                                                    <option value="st">santo tom?? y pr??ncipe</option>
                                                    <option value="sn">senegal</option>
                                                    <option value="sc">seychelles</option>
                                                    <option value="sl">sierra leona</option>
                                                    <option value="sg">singapur</option>
                                                    <option value="sy">siria</option>
                                                    <option value="so">somalia</option>
                                                    <option value="lk">sri lanka</option>
                                                    <option value="pm">st pierre y miquelon</option>
                                                    <option value="sz">suazilandia</option>
                                                    <option value="sd">sud??n</option>
                                                    <option value="se">suecia</option>
                                                    <option value="ch">suiza</option>
                                                    <option value="sr">surinam</option>
                                                    <option value="th">tailandia</option>
                                                    <option value="tw">taiw??n</option>
                                                    <option value="tz">tanzania</option>
                                                    <option value="tj">tayikist??n</option>
                                                    <option value="tf">territorios franceses del sur</option>
                                                    <option value="tp">timor oriental</option>
                                                    <option value="tg">togo</option>
                                                    <option value="to">tonga</option>
                                                    <option value="tt">trinidad y tobago</option>
                                                    <option value="tn">t??nez</option>
                                                    <option value="tm">turkmenist??n</option>
                                                    <option value="tr">turqu??a</option>
                                                    <option value="tv">tuvalu</option>
                                                    <option value="ua">ucrania</option>
                                                    <option value="ug">uganda</option>
                                                    <option value="uy">uruguay</option>
                                                    <option value="uz">uzbekist??n</option>
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
                                            <div class="col-sm-6">Tel??fono
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
                                            <div class="col-sm-6">P??gina Web
                                                <input type="text" name="sitioweb" class="form-control form-txt-success" style="width: 100%;" value="{{ old('sitioweb') }}">
                                                <span style="color:#A4A4A4;">Ejemplo: www.mipagina.com</span>
                                            </div>
                                            <div class="col-sm-6">Subir mi Arte &nbsp;<a href="#" data-toggle="modal" data-target="#exampleModal"><span style="color:white" class="badge badge-info"> Ver Restricciones de subida de archivos</span></a>
                                                <input type="file" accept="image/jpeg,image/png" name="archivo" class="form-control form-txt-success" style="width: 100%;">
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
                                                                <li><strong>Dimensiones Aceptadas:</strong></br> Altura m??xima: 475px | Ancho M??ximo: 370px </li>
                                                                <li><strong>Tama??o M??ximo Aceptado:</strong></br> 3Mb</li>
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
                                                        <label>He leido y aceptado los <a href="#" data-toggle="modal" data-target="#exampleModalLong-x" class="border-checkbox-label" > t??rminos y condiciones.</a></label>
                                                    </div>
                                                    @include('pages.terms')
                                                </div>
                                            </div>


                                        </div>







                                        <div class="row" style="text-align: right;" id="btnShow">
                                            <label class="col-sm-12"></label>
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-success m-b-0" value="Agregar" name="btTutorial" disabled>
                                                <a href="{{ url()->previous() }}" class="btn btn-outline-warning m-b-0">Volver</a>
                                            </div>
                                        </div>

                                        <div style="display: none;" class="text-right" id="btnhidden">
                                            <label class="col-sm-12"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" disabled=""  class="btn btn-success m-b-0">Guardando...</button>
                                                <a href="{{ url()->previous() }}" class="btn btn-outline-warning m-b-0">Volver</a>
                                            </div>
                                        </div>




                                    </form>
                                </div>





                                <!-- Modal static-->
                                <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">??xito</h4>

                                            </div>
                                            <div class="modal-body">
                                                <div style="text-align: center;" ><img src="/img/success.png" width="100px" height="100px">
                                                    <p></p>
                                                    <span class="center" style="width: 10px;">Su Anuncio ha sido creado satisfact??riamente,</br> estaremos procesando para aprobaci??n.</span>
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
                <!-- Basic Form Inputs card end -->
                <!-- Input Grid card start -->

                <!-- Input Grid card end -->
                <!-- Input Validation card start -->

                <!-- Input Validation card end -->
                <!-- Input Alignment card start -->
                <!-- Input Alignment card end -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
</div>
</div>
@include('copyright.footer')
@include('layouts.admin.piehome')
</body>
</html>
