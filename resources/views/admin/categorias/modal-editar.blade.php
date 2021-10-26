<!-- Modal -->
<div class="modal fade" id="exampleModal-{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sugerir Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/manager/categorias/edit">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p></p>
                    <div class="form-group row">
                        <div class="col-sm-12">Nombre Categoría:
                            <input placeholder="Categoría" type="text" name="nombre" class="form-control" required style="width: 100%;" value="{{ $cat->nombre }}">
                        </div>
                        <input type="hidden" name="id" value="{{ $cat->id }}">

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">Descripción:
                            <textarea placeholder="Categoría" type="text" name="descripcion" class="form-control" required style="width: 100%;">{{ $cat->descripcion }}</textarea>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">Estado
                            <div class="form-radio">
                                <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                        <input type="radio" name="estado" checked value="1" data-bv-field="member">
                                        <i class="helper"></i>Activar Categoría
                                    </label>
                                </div>
                                <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                        <input type="radio" name="estado" value="0" data-bv-field="member">
                                        <i class="helper"></i>Desactivar Categoría
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="btnShow">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </form>
        </div>
    </div>
</div>