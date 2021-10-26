<div class="col-lg-8">
    <div class="row">
        <div class="col-lg-12">
            <div class="card table-1-card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="text-capitalize">
                                <th>Nº</th>
                                <th style="text-align: center;">CÓDIGO</th>
                                <th>ANUNCIO</th>
                                <th style="text-align: center;">VISTO</th>
                                <th>COMENTARIOS</th>
                                <th>CLICKS URL</th>
                                <th>PUBLICADO</th>
                                <th>ESTADO</th>
                                <th>IMAGEN</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($anuncios as $key => $anun)
                            <tr style="font-size: 13px;">
                                <td style="text-align: center;">{{ $key+1 }}</td>
                                <td style="text-align: center;">{{ $anun->codigo }}</td>
                                <td>{{ $anun->titulo }}</td>
                                <td style="text-align: center;"><a href="/admin/{{ $anun->id }}/views" title="Visitas al anuncio"><span class="badge badge-success" >{{ $anun->vistos->count() }}</span></a></td>
                                <td style="text-align: center;"><a href="/admin/{{ $anun->id }}/comments" title="Comentarios del anuncio"><span class="badge badge-info">{{ $anun->comentarios_count }}</span></a></td>
                                @if($anun->sitioweb == null)
                                    <td style="text-align: center;"><a href="#" title="Sin sitio web"><span class="badge badge-default" >-</span></a></td>
                                @else
                                    <td style="text-align: center;"><a href="/admin/{{ $anun->id }}/clicksurl" title="visitas a la página web"><span class="badge badge-danger" >{{ $anun->cliks->count() }}</span></a></td>
                                @endif

                                <td>{{ $anun->created_at->diffForHumans() }}</td>
                                <td style="text-align: center;">
                                    @if($anun->estado == 0)
                                        <span class="badge badge-warning">{{$anun->estado($anun->estado)}}</span>
                                    @elseif($anun->estado == 1)
                                        <span class="badge badge-success">{{$anun->estado($anun->estado)}}</span>
                                    @elseif($anun->estado == 2)
                                        <span class="badge badge-danger">{{$anun->estado($anun->estado)}}</span>
                                    @endif
                                </td>
                                <td style="text-align: center;"><img data-toggle="modal" data-target="#exampleModal-{{$anun->id}}" height="40px;" width="40px;" src="/anuncios/{{$anun->banner}}"></td>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{$anun->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$anun->titulo}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div style="text-align:center;" class="modal-body">
                                                <img src="/anuncios/{{$anun->banner}}">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $anuncios->links() }}
                        <br/>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>