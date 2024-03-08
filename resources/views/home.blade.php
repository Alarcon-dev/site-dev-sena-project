@extends('layouts.master')
@section('content')
    <div class="section">
        @if (Auth::user() !== null)
            @php
                $publications = App\Models\Publication::getAll();
            @endphp
            @include('includes.alerts')
            @foreach ($publications as $publication)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-10">
                        <div class="card card-publication mb-3 shadow" style="margin-top: 8%">
                            <div class="card-header">
                                <div class="col_md_6">
                                    @if ($publication->User->user_image)
                                        <div class="profile_publication float-left">
                                            <img src="/publication/profile/{{ $publication->User->user_image }}"
                                                alt="">
                                        </div>
                                    @else
                                        <div class="profile_publication float-left">
                                            <img src="{{ asset('images/no_profile.png') }}" alt="">
                                        </div>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title ml-3">{{ $publication->public_title }}</h4>
                                    <h4 class="card-title ml-3">
                                        publicado {{ $publication->created_at->locale('es')->diffForHumans() }}</h4>
                                    <h4 class="card-title ml-3">
                                        Por:
                                        <a href="" class="text-decoration-none">
                                            {{ $publication->user->nick_name }}
                                        </a>
                                    </h4>
                                </div>
                            </div>

                            <div class="card-body">
                                @if ($publication->public_image !== null)
                                    <div class="container p_img_container">
                                        <div class="row justify-content-center">
                                            <a href="">
                                                <img src="/publication/image/{{ $publication->public_image }}"
                                                    alt="">
                                            </a>

                                        </div>
                                    </div>
                                @endif
                                <a href="" class="text-decoration-none">
                                    <div class="code-container">
                                        <div class="code">{!! highlight_string($publication->public_content, true) !!}</div>
                                    </div>
                                </a>
                                <div class="row">
                                    <div class="col-md-4 justify-content-start">
                                        <span
                                            class="mr-3"><strong>Comentarios({{ count($publication->comments) }})</strong></span>
                                    </div>

                                    @if (Auth::user()->id_user === $publication->user_public_id)
                                        <div class="col-md-8 d-flex justify-content-end">
                                            <a href="" class="btn btn-danger btn-action mr-3" data-toggle="tooltip"
                                                title="Eliminar">
                                                <i class="fas fa-trash"></i></a>
                                            <a href="" class="btn btn-success btn-action" data-toggle="tooltip"
                                                title="Ver">
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
            <div class="row justify-content-center" style="margin-top: 15%">
                <div class="col-md-6">
                    <div class="card-body justify-content-center">
                        <h1 class="text-align-center" style="margin: auto 30%">Bienvenido</h1>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
