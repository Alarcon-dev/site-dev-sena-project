@extends('layouts.master')
@section('content')
    @if ($users && $users->count() > 0)
        <div class="col-lg-12 col-md-12 col-12 col-sm-12" style="margin-top: 8%;">
            <div class="card">
                <div class="card-header">
                    <h4>Lista de usuarios</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary"></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Apellido</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Perfil</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    @if ($user->id_user !== 1)
                                        <tr>
                                            <td class="text-center">{{ $user->id_user }}</td>
                                            <td class="text-center">{{ $user->user_name }}</td>
                                            <td class="text-center">{{ $user->last_name }}</td>
                                            <td class="text-center">{{ $user->nick_name }}</td>
                                            <td class="text-center">
                                                <div class="profile_list">
                                                    <img src="{{ route('get.profile', ['image_name' => $user->user_image]) }}"
                                                        alt="">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="/destroy/user/{{ $user->id_user }}"
                                                    class="btn btn-danger btn-action" data-toggle="tooltip"
                                                    title="Eliminar">
                                                    <i class="fas fa-trash"></i></a>
                                                <a href="" class="btn btn-primary btn-action" data-toggle="tooltip"
                                                    title="Ver">
                                                    <i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
