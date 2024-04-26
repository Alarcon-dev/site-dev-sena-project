@extends('layouts.master')
@section('content')
    <div class="section">
        @if (Auth::user() !== null && $publication->count() > 0)
            @include('includes.alerts')
            <div class="row justify-content-center mt-3">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card card-publication shadow" style="margin-top: 3%;">
                        <div class="card-header" style="margin: 2% 3%">
                            <div class="col_md_6">
                                @if ($publication->user->user_image)
                                    <div class="profile_publication float-left">
                                        <img src="/publication/profile/{{ $publication->user->user_image }}" alt="">
                                    </div>
                                @else
                                    <div class="profile_publication float-left">
                                        <img src="{{ asset('images/no_profile.png') }}" alt="">
                                    </div>
                                @endif

                            </div>
                            <div class="col-md-6 ">
                                <h4 class="card-title ml-3">{{ $publication->public_title }}</h4>
                                <h4 class="card-title ml-3">
                                    publicado {{ $publication->created_at->locale('es')->diffForHumans() }}</h4>
                                <h4 class="card-title ml-3 mb-3">
                                    Por:
                                    <a href="" class="text-decoration-none">
                                        {{ $publication->user->nick_name }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body" style="height: 95%; width:95%">
                            @if ($publication->public_image !== null)
                                @php
                                    $imageNames = json_decode($publication->public_image);

                                @endphp
                                <div class="container p_img_container">
                                    <div class="row justify-content-center">

                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                @foreach ($imageNames as $index => $imageName)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <img src="/publication/image/{{ $imageName }}" alt="Image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-10 ml-5">
                                <div class="code-container">
                                    <div class="code">{!! highlight_string($publication->public_content, true) !!}</div>
                                </div>
                            </div>
                        </div>
                        <div class="line border-bottom" style="width: 95%; margin:auto"></div>

                        <div class="row justify-content-center" style="margin: 2% 13%">
                            <!-- Centra los elementos horizontalmente -->
                            <div class="col-6 co-md-3 mt-2">
                                <h3 class="text-align-center">Añadir respuesta</h3>
                            </div>
                            <form action="/comment/store/{{ $publication->id_publication }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4 mt-3">
                                    <label for="comment_content"></label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 mt-1">
                                        <textarea name="comment_content" class="summernote"></textarea>
                                    </div>
                                    <div class="col-6 text-align-end">
                                        <input class="btn btn-primary" type="submit" value="Comentar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="line border-bottom" style="width: 95%; margin:auto"></div>
                </div>
            @else
                <div class="section">
                    <div class="row justify-content-center" style="margin-top: 3%">
                        <div class="container">
                            <div class="col-md-12">
                                <h1 class="text-align-center" style="margin: 20% 50vh">Bienvenido</h1>
                            </div>
                        </div>
                    </div>
                </div>
        @endif

    @endsection
