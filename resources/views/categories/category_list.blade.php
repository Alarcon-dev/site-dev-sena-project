@extends('layouts.master')
@section('content')
    @if ($categories && $categories->count() > 0)
        <div class="col-lg-12 col-md-12 col-12 col-sm-12" style="margin-top: 4%;">
            <div class="card">
                @include('includes.alerts')
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
                                    <th class="text-center">Autor</th>
                                    <th class="text-center">Fecha de creación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="text-center">{{ $category->id_categorie }}</td>
                                        <td class="text-center">{{ $category->categorie_name }}</td>
                                        <td class="text-center">
                                            <span>{{ $category->user->user_name }}</span>
                                            <span>{{ $category->user->last_name }}</span>
                                        </td>
                                        <td class="text-center">{{ $category->created_at }}</td>
                                        <td class="text-center">
                                            <a href="/edit/categories/{{ $category->id_categorie }}"
                                                class="btn btn-primary btn-action" data-toggle="tooltip" title="Editar">
                                                <i class="fas fa-edit"></i></a>
                                            <a href="/delete/categories/{{ $category->id_categorie }}"
                                                class="btn btn-danger btn-action" data-toggle="tooltip" title="Eliminar">
                                                <i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-align-center">
                        NO HAY CATEGORÍAS PARA MOSTRAR
                    </h1>
                </div>
            </div>
        </div>
    @endif
@endsection
