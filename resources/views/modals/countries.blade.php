<div class="modal fade" id="exampleModalx-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar en otro Pais</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-4" style="text-align: center;">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_pe.png') }}">
                                    PERÚ
                                </button>

                            </div>
                            <input type="hidden" name="country" value="pe">
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_chile.png') }}">
                                    CHILE
                                </button>
                            </div>
                            <input type="hidden" name="country" value="cl">
                        </form>
                    </div>


                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_us.jpg') }}">
                                    USA
                                </button>
                            </div>
                            <input type="hidden" name="country" value="us">
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_ec.png') }}">
                                    ECUADOR
                                </button>
                            </div>
                            <input type="hidden" name="country" value="ec">
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_ve.png') }}">
                                    VENEZUELA
                                </button>
                            </div>
                            <input type="hidden" name="country" value="ve">
                        </form>
                    </div>


                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_co.png') }}">
                                    COLOMBIA
                                </button>
                            </div>
                            <input type="hidden" name="country" value="co">
                        </form>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_br.png') }}">
                                    BRASIL
                                </button>
                            </div>
                            <input type="hidden" name="country" value="br">
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_bo.png') }}">
                                    BOLIVIA
                                </button>
                            </div>
                            <input type="hidden" name="country" value="bo">
                        </form>
                    </div>


                    <div class="col-sm-4">
                        <form method="POST" action="/changecountry" onsubmit="return checkSubmit();">
                            {{ csrf_field() }}
                            <div class="card">
                                <button type="submit">
                                    <img src="{{ asset('flags/flag_ar.png') }}">
                                    ARGENTINA
                                </button>
                            </div>
                            <input type="hidden" name="country" value="ar">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>