<div class="container">
    <div class="row">
        <div class="content-area col-sm-12">
            <!-- Row -->
            <div class="row blog-masonry-list">


                @foreach ($anuncios as $key => $anun)
                    @if($anun->sitioweb == null)
                        <div class="col-lg-4 col-sm-6 blog-masonry-box">
                            <div class="type-post">
                                <div class="entry-cover">
                                    <div class="post-meta">
                                        <span style="font-size: 10px;" class="byline"><a  title="Indesign"><strong><i class="fas fa-home"></i> {{$anun->titulo}} ({{$anun->pais}})</strong></a></span>
                                        <span style="font-size: 10px;margin-left: 25%;" class="post-date"><a data-toggle="modal" data-target="#exampleModalLong-{{$anun->id}}" href="#"><i class="fas fa-comments"></i> {{$anun->comentarios_count }}</a></span>
                                        <span style="font-size: 10px;" class="post-date"><a ><i class="fas fa-info-circle"></i> info</a></span>
                                    </div>
                                    <a href="{{ url("/visto/$anun->id/$anun->user_id/anuncio") }}" ><img  src="anuncios/{{$anun->banner}}" title="click para ver detalle" /></a>
                                </div>

                            </div>
                        </div>
                        @include('modal-detalle')
                        @include('modal-comentarios')
                    @else
                        <div class="col-lg-4 col-sm-6 blog-masonry-box">
                            <div class="type-post">
                                <div class="entry-cover">
                                    <div class="post-meta">

                                        <span style="font-size: 10px;" class="byline"><a  title="Indesign"><strong><i class="fas fa-home"></i> {{$anun->titulo}} ({{$anun->pais}})</strong></a></span>
                                        <span style="font-size: 10px;margin-left: 12%;" class="post-date"><a data-toggle="modal" data-target="#exampleModalLong-{{$anun->id}}" href="#"><i class="fas fa-comments"></i> {{$anun->comentarios_count }}</a></span>
                                    </div>
                                    <a  href="{{ url("/visto/$anun->id/$anun->user_id/anuncio") }}"  title="click para ver detalle"><img  src="anuncios/{{$anun->banner}}"  title="{{$anun->sitioweb}}"/></a>
                                </div>

                            </div>
                        </div>
                        @include('modal-detalle')
                        @include('modal-comentarios')

                    @endif


                @endforeach



            </div><!-- Row /- -->


            <!-- Pagination -->
            <nav class="navigation pagination">
                <h2 class="screen-reader-text">Posts navigation</h2>
                <div class="nav-links">
                    {{ $anuncios->links() }}
                </div>
            </nav><!-- Pagination /- -->






        </div>
    </div>
</div>