
<div class="modal fade bd-example-modal-lg" id="exampleModal-{{$anun->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">DETALLE DEL ANUNCIO</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="text-align:center;" class="modal-body">


                <table class="table table-striped table-responsive" style="font-size:12px;font-family: Vegur, 'PT Sans', Verdana, sans-serif;">
                    <span style="text-align: left;font-size: 15px;"><strong>{{ strtoupper($anun->titulo) }}</strong></span>
                    <p></p>
                    <tbody>
                    <tr>
                        <td style="text-align: left;width: 20%;"><strong>CÓDIGO DEL ANUNCIO</strong></td>
                        <td style="text-align: justify;width: 80%;"><i class="fa fa-barcode"></i> {{$anun->codigo}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>DESCRIPCIÓN DEL ANUNCIO</strong></td>
                        <td style="text-align: justify;"><i class="fa fa-info-circle"></i> {{$anun->descripcion}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>DIRECCIÓN REGISTRADA</strong></td>
                        <td style="text-align: justify;"><i class="fas fa-map-marker"></i> {{$anun->direccion}}
                            <br/> <i class="fas fa-map-pin"></i> {{$anun->distrito}}
                                <br/><i class="fas fa-map-marked-alt"></i> {{$anun->provincia}} - {{$anun->departamento}}
                            <br/><i class="fas fa-globe-asia"></i>  <i class="flag-icon flag-icon-{{$anun->pais}} m-r-5"></i> {{$anun->pais}}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>INFORMACIÓN DE CONTACTO</strong></td>
                        <td style="text-align: justify;"><i class="fas fa-mobile-alt"></i> @if($anun->telefono) {{$anun->telefono}} @else  - @endif
                            <br/><i class="fas fa-envelope-open-text"></i> @if($anun->correo) {{$anun->correo}} @else  - @endif
                            <br/><i class="fas fa-globe"></i> @if($anun->sitioweb) <a  href="/http:/{{$anun->titulo}}/{{$anun->id}}/{{$anun->codigo}}/.com"   target="_blank" >{{$anun->sitioweb}}</a>  @else  - @endif </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>CATEGORÍA</strong></td>
                        <td style="text-align: justify;"><i class="fa fa-book"></i> {{ $anun->category_name }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>MEDIO DE PAGOS Y ENVIOS</strong></td>
                        <td style="text-align: justify;">
                            <i class="fa fa-money"></i> Efectivo @if($anun->card) | <img src="{{ asset('img/visa.png')  }}"> @endif <br/>
                            @if($anun->delivery) <i class="fa fa-motorcycle"></i> Se realiza envios. (Consultar disponibilidad de zonas y recargos). @endif<br/>
                            @if($anun->delivery_international) <i class="fa fa-plane"></i> Se realiza envios internacionales. (Consultar Paises y recargos). @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>REDES SOCIALES</strong></td>
                        <td style="text-align: justify;">
                            <i class="fab fa-facebook-square"></i> <a target="_blank" href="{{$anun->facebook}}">{{$anun->facebook}}</a>
                            <br/><i class="fab fa-twitter-square"></i> <a target="_blank" href="{{$anun->twitter}}">{{$anun->twitter}}</a>
                            <br/><i class="fab fa-instagram"></i> <a target="_blank" href="{{$anun->instagram}}">{{$anun->instagram}}</a>
                            <br/><i class="fab fa-pinterest-square"></i> <a target="_blank" href="{{$anun->pinterest}}">{{$anun->pinterest}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>PUBLICADO EL</strong></td>
                        <td style="text-align: justify;"><i class="fa fa-calendar"></i> {{ $anun->created_at->formatLocalized('%A %d %B %Y') }} </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;"><strong>ÚLTIMA ACTUALIZACIÓN</strong></td>
                        <td style="text-align: justify;"><i class="fa fa-calendar"></i> {{ $anun->updated_at->formatLocalized('%A %d %B %Y') }} </td>
                    </tr>


                    </tbody>
                </table>


            </div>

        </div>
    </div>
</div