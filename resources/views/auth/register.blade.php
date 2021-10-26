


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrarme - digianuncios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->
    
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/flag-icon/flag-icon.min.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/menu-search/css/component.css">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/pages/multi-step-sign-up/css/reset.min.css">
    <link rel="stylesheet" href="assets/pages/multi-step-sign-up/css/style.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css')  }}">
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="assets/css/color/color-1.css" id="color" />
</head>

<body class="multi-step-sign-up backgr-img-bg">
@include('pages.terms')
@if ($errors->any())
        <div style="background: #e74c3c;color:white;text-align: center;" class="alert alert-warning alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <strong>Ups!</strong> {{ $error }}
            @endforeach
        </div>
@endif

    <form id="msform" method="POST" action="{{ route('register') }}">
    @csrf
        <!-- progressbar -->
        <br/>
        <div class="text-center">
            <a href="{{ url('/') }}" ><img src="{{asset('img/logo-digianuncios-negro.png')}}" alt="logo.png"></a>
        </div>
        <br/>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Datos Personales</h2>
            <h3 class="fs-subtitle">Queremos saber algo de tí</h3>
            <div class="input-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ingrese Nombres" title="Ingrese Nombres">
            </div>

            <div class="input-group">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" placeholder="Ingrese sus Apellidos" />
            </div>
            <div class="input-group">
                <select class="form-control" required name="type" title="Seleccione Tipo">
                    <option value="">Seleccione tipo de registro...</option>
                    <option value="1">Digivisitante</option>
                    <option value="2">Digianunciante</option>
                </select>
            </div>
            <div style="text-align: left;">Fecha de Nacimiento:
                <input  type="date" style="width:100%;" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" title="Fecha de Nacimiento" placeholder="Fecha de Nacimiento (año-mes-dia)" />
            </div>
            <?php
            //Obtener IP y seleccionar el pais
            //$ip = '189.183.96.1';
            $ip = $_SERVER["REMOTE_ADDR"];
            $arr_ip = geoip()->getLocation($ip);
            ?>
            <br/>
            <div class="input-group">
                <select class="form-control" name="country" title="Seleccione su Pais" required>
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
            <button type="button" name="next" class="btn btn-danger next" value="Next">Siguiente</button>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Datos de Acceso</h2>
            <h3 class="fs-subtitle">Queremos ofrecer muchos beneficios</h3>
            <div class="input-group">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Ingrese teléfono" />
            </div>
            <div class="input-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Su correo" />
            </div>
            <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingrese una clave">
            </div>
            <div class="input-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar clave" />
            </div>
            <div class="col-sm-12">
                <input  type="checkbox" value="1" required name="chTermYCond" onclick="btTutorial.disabled = !this.checked"> He leido y aceptado los <a href="#" data-toggle="modal" data-target="#exampleModalLong-x" class="border-checkbox-label" > términos y condiciones.</a>
            </div>

           <br/>
            <button type="button" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Anterior</button>
            <button type="submit" name="btTutorial"  class="btn btn-danger" value="submit" disabled>Registrarme</button>

        </fieldset>

    </form>

   
    <!-- Required Jquery -->
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- classie js -->
    <script type="text/javascript" src="bower_components/classie/classie.js"></script>
    <script src='../../../../cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="assets/pages/multi-step-sign-up/js/main.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="bower_components/jquery-i18next/jquery-i18next.min.js"></script>

    <script type="text/javascript" src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <!--color js-->

</body>
</html>

