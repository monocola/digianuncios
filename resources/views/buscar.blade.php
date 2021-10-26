<div class="container" style="background: #FAFAFA;">
    </br>
    <small style="margin-bottom:14px; " id="emailHelp" class="form-text text-muted">
        <input class="pago"  name="pago1" type="radio" value="Deposito" checked>&nbsp; Por detalle.&nbsp; &nbsp;
        <input  class="pago" name="pago1" type="radio" value="Deposito1"/> &nbsp; Por código.&nbsp; &nbsp;
    </small>

    <div id="div1" style="display;">
    <form action="/buscar" method="get" name="frm" id="frm"  onsubmit="return checkSubmit();" >
        <div class="row">
            <div class="col-sm-6">
                @if($categories)
                    <input class="typeahead form-control" type="text" name="buscar"  onkeyup="manage(this)" placeholder="Estoy buscando..." >
                @else
                    <input class="typeahead form-control" type="text" name="buscar" id="txt" onkeyup="manage(this)" placeholder="Estoy buscando..." value="{{ $categoryName }}">
                @endif

                <script type="text/javascript">
                    var path = "{{ route('autocomplete') }}";
                    $('input.typeahead').typeahead({
                        source:  function (query, process) {
                            return $.get(path, { query: query }, function (data) {
                                return process(data);
                            });
                        }
                    });
                </script>


                <small id="emailHelp" class="form-text text-muted">
                    @if($comments)
                    &nbsp;  <input name="concomentarios" type="checkbox" checked> Anuncios solo con comentarios.
                    @else
                        <input name="concomentarios" type="checkbox"> Anuncios solo con comentarios.
                    @endif
                </small>
            </div>
            <div class="col-sm-6">
                <select class="form-control select2-single1" name="lugar">
                    <option></option>
                    @foreach ($ubicaciones as $key => $ubi)
                        <option value="{{ $ubi->distrito }}">{{ $ubi->distrito }}, {{ $ubi->departamento }}</option>
                    @endforeach
                </select>
            </div>


        </div>

        <div class="row">
            <div class="col-sm-12" id="btnShow">
                <button style="width: 100%;height: 40px;" type="submit"   class="btn btn-outline-default"  ><i class="fas fa-binoculars"></i> Encontrar Anuncio</button>
            </div>

            <div class="col-sm-12" style="display: none;"  id="btnhidden">
                <button style="width: 100%;height: 40px;"  disabled=true  class="btn btn-outline-default"><i class="fas fa-binoculars"></i> Buscando Anuncios...</button>
            </div>

        </div>
    </form>
    </div>

    <div id="div2" style="display:none;">
            <form  action="/buscarporcodigo" method="get">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" name="txt0" id="txt3" onkeyup="managecode(this)" class="form-control" style="width: 100%;text-align: center;" required placeholder="Ingrese código...">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button style="width: 100%;" type="submit" id="btSubmit3" disabled  class="btn  btn-outline-default"><i class="fas fa-binoculars"></i> Encontrar Anuncio</button>
                    </div>
                </div>
            </form>
        <br/>
    </div>
    <div id="div3" style="display:none;">
        <form  action="/buscarporpalabra" method="get" name="form1">
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="txt0" id="txt2" onkeyup="manageword(this)" class="form-control" id="texto" style="width: 100%;text-align: center;"  required placeholder="Ingrese alguna palabra a buscar...">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button style="width: 100%;" name="sub"   id="btSubmit2" disabled  type="submit" id="btn1" class="btn  btn-outline-default"><i class="fas fa-binoculars"></i> Encontrar Anuncio</button>
                </div>
            </div>
        </form>

    </div>


    @if($result == -2)
    @else
    <div class="col-12" style="text-align: right;font-size: 12px;color:#6c757d;" >
      <strong style="font-size: 14px;"> @if($categoryName) {{ $categoryName }} | @endif </strong> Resultado: {{ $result }}  @if($result > 1)anuncios encontrados. @elseif($result == 0) anuncios encontrados. @else anuncio encontrado. @endif
    </div>
    @endif
</div>











