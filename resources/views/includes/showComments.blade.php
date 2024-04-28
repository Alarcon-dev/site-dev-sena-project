@if ($comments != false)
    @foreach ($comments as $comment)
        <div class="row justofy-content-center mt-3 ml-5">
            <div class="col-12 col-md-11 col-lg-11">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="col-md-12">
                            <h6>Usuario: <a href="">{{ $comment->user->nick_name }}</a></h6>
                            <h6>hace {{ $comment->created_at->locale('es')->diffForHumans() }}</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-12">
                            @if ($comment->comment_image !== null)
                                @php
                                    $commentImages = json_decode($comment->comment_image);
                                @endphp
                                <div class="container comment_image">
                                    <div class="row justify-content-center">

                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                @foreach ($commentImages as $index => $commentImage)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <img src="/comment/image/{{ $commentImage }}" alt="Image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleControls"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="col-md-10">
                            <p>
                            <div class="code">{!! highlight_string($comment->comment_content, true) !!}</div>
                            </p>
                        </div>
                        <div class="row">
                            @if (Auth::user()->id_user === $comment->user->id_user)
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="/publication/destroy/{{ $comment->id_comment }}"
                                        class="btn btn-danger btn-action mr-3" data-toggle="tooltip" title="Eliminar">
                                        <i class="fas fa-trash"></i></a>
                                    <a href="/comment/edit/{{ $comment->id_comment }}"
                                        class="btn btn-success btn-action" data-toggle="tooltip" title="Editar">
                                        <i class="fas fa-edit"></i></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="section">
        <div class="row justify-content-center" style="margin: 3% 28%">
            <div class="container">
                <div class="col-md-12">
                    <h3 class="text-align-center">No hay comentarios</h3>
                </div>
            </div>
        </div>
    </div>
@endif
</div>
