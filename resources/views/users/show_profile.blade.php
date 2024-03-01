@extends('layouts.master')
@section('content')
    <div class="col-12 col-sm-12 col-lg-6" style="margin: auto; margin-top: 8%">
        <div class="card author-box card-primary">
            <div class="card-body mt-3">

                <div class="row">
                    <div class="col-sm-4 float-left profile_show">
                        <div class="container float-left ">
                            <img src="{{ route('get.profile', ['image_name' => $user->user_image]) }}" alt="">
                        </div>
                    </div>

                    <div class="col-sm-8 float-right mt-1">
                        <div class="author-box-name">
                            <h6><span>Nombre: </span>{{ $user->user_name }}</h6>
                            <h6><span>Apellido: </span>{{ $user->last_name }}</h6>
                            <h6><span>Email: </span>{{ $user->email }}</h6>
                            <h6>se unió
                                {{ $user->created_at->locale('es')->diffForHumans() }}
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-12  mt-5">
                    <a href="#" class="btn btn-danger btn-icon icon-right">Ver publicaciones <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
