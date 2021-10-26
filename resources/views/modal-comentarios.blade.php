<!-- Modal -->
    <div class="modal fade" id="exampleModalLong-{{$anun->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalScrollableTitle"><string>COMENTARIOS</string></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>

            <?php
                    Carbon\Carbon::setLocale('es');
                    setLocale(LC_TIME, 'es_ES');

                    $anuncio = App\Anuncio::find($anun->id);
                    $comentarios =  $anuncio->comentarios()
                                            ->orderBy('id','desc')
                                            ->where('anuncio_id', $anun->id)
                                            ->get();
            ?>




            <div class="modal-body">
                @guest
                    <div class="alert alert-primary" role="alert" style="font-size: 13px;text-align: center;">
                        <i class="fas fa-lock"></i> Usted debe <a  href="{{ url('login') }}">Iniciar sessión</a> ó <a  href="{{ url('register') }}">registrarse</a> para poder comentar.
                    </div>





                    @foreach ($comentarios as $key => $com)
                        <div class="card">
                            <div class="card-body">
                                <table  style="font-size: 10px;">

                                    <tbody>
                                    <tr>
                                        <td style="text-align: left;">
                                            <table border="0">
                                                <tr>
                                                    <td><img width="35" height="35" src="img/user-icon.jpg"/></td>
                                                    <td style="font-size: 12px;">&nbsp;  {{ $com->obtenerUsuario->name }} {{ $com->obtenerUsuario->lastname }}<br/>
                                                    </td>

                                                </tr>
                                            </table>
                                            <table>
                                                <br/>
                                                <tr>
                                                    <td style="color: #5e696d;text-align: justify;">{{$com->comentario}}
                                                        <br/><i class="fas fa-calendar-alt"></i> Publicado {{ $com->created_at->diffForHumans() }}.</td>
                                                </tr>
                                            </table>


                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br/>
                    @endforeach




                @else
                    @if(Auth::user()->state ==0 )
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="/comentario">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea style="font-size: 12px;" required name="comentario" type="text" class="form-control"></textarea>
                                    <input name="anuncio_id" value="{{ $anun->id }}" type="hidden">
                                </div>
                                <div class="row" style="text-align: right;" id="btnShow">
                                    <label class="col-sm-12"></label>
                                    <div class="col-sm-12">
                                        <button style="width: 100%;height: 40px;" type="submit" class="btn  btn-dark"> Enviar Comentario</button>
                                    </div>
                                </div>

                                @if($anun->comentarios_count == 0)
                                    <input name="estado" type="hidden" value="0" >
                                @else
                                    <input name="estado" type="hidden" value="1" >
                                @endif
                            </form>
                        </div>

                    </div>
                    @endif
                    <br/>

                    @if($anun->comentarios_count == 0)
                    <div class="modal-body">

                        <p style="color: #5e696d;text-align: justify;font-size: 12px;">No existen comentarios para este anuncio. </p>
                    </div>
                    @endif

                    @foreach ($comentarios as $key => $com)
                    <div class="card">
                        <div class="card-body">
                            <table  style="font-size: 10px;">

                                <tbody>
                                <tr>
                                    <td style="text-align: left;">
                                        <table border="0">
                                            <tr>
                                                <td><img width="35" height="35" src="img/user-icon.jpg"/></td>
                                                <td style="font-size: 12px;">&nbsp; {{ $com->obtenerUsuario->name }} {{ $com->obtenerUsuario->lastname }}<br/>
                                                    @if($com->user_id == Auth::user()->id || Auth::user()->id == $anun->user_id )
                                                    <span style="font-size: 10Px;"><a href="/comentario/{{$com->id}}/{{$anun->id}}/eliminar" style="text-decoration:none;color:#8b9ab0;" >&nbsp; Eliminar</a> </span>
                                                    @endif

                                                </td>

                                            </tr>
                                        </table>
                                        <table>
                                            <br/>
                                            <tr>
                                                <td style="color: #5e696d;text-align: justify;">{{$com->comentario}}
                                                        <br/><i class="fas fa-calendar-alt"></i> Publicado {{ $com->created_at->diffForHumans() }}.</td>
                                            </tr>
                                        </table>


                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <br/>
                    @endforeach

                @endguest
            </div>

        </div>
    </div>
</div>