@extends('layouts.master')
@section('content')
    @if ($publications !== null && $publications->count() > 0)
        <section class="section">
            @include('includes.alerts')
            @foreach ($publications as $publication)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="col_md_6">
                                    <div class="profile_publication float-left">
                                        <img src="/publication/profile/{{ $publication->User->user_image }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title ml-3">{{ $publication->public_title }}</h4>
                                    <h4 class="card-title ml-3">{{ $publication->user->nick_name }}</h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="card-body">
                                <div class="container p_img_container">
                                    <div class="row justify-content-center">
                                        <img src="/publication/image/{{ $publication->public_image }}" alt="">
                                    </div>
                                </div>
                                <p class="card-text">{!! $publication->public_content !!}</p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @else
        <div class="row justify-content-center">
            <div class="container">
                <h1 class="text-align-center">No hay publicaciones</h1>
            </div>
        </div>
    @endif
@endsection
