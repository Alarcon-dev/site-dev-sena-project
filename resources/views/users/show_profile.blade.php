@extends('layouts.master')
@section('content')
    <div class="section-body" style="margin-top: 8%">
        <h2 class="section-title">Hola, {{ $user->user_name }}</h2>
        <p class="section-lead">
            Aquí puedes cambiar la información publica de tu perfil.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="upload_file_update">
                        <img src='{{ route('get.profile', ['image_name' => $user->user_image]) }}' alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 28%;">
                            <div class="form-group col-md-12 col-12">
                                <label>Cambiar imagen</label>
                                <input type="file" class="form-control" value="Ujang" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" class="needs-validation" novalidate="">
                        <div class="card-header">
                            <h4>Editar Perfil</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="user_name">Nombre</label>
                                    <input type="text" class="form-control" name="user_name"
                                        value="{{ $user->user_name }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="last_name">Apellido</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ $user->last_name }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the last name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                        required="">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>Nombre de usuario</label>
                                    <input type="tel" name="nick_name" class="form-control"
                                        value="{{ $user->nick_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
