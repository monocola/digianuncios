

<!--Modal: modalPush-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-left">
                <p class="heading">MENSAJE DE CONFIRMACIÓN</p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>

                <p>{{ session('textoAlerta') }}</p>

            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <a type="button" class="btn btn-sm btn-default"  data-dismiss="modal">Aceptar</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalPush-->