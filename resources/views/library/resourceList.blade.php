@extends('layouts.master')
@section('content')
    @if ($resources !== null && $resources->count() > 0)
        <div class="col-lg-12 col-md-12 col-12 col-sm-12" style="margin-top: 7%;">
            <div class="card">
                @include('includes.alerts')
                <div class="card-header">
                    <h4>Lista de Publicaciones</h4>
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
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">título</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resources as $resource)
                                    <tr>
                                        <td class="text-center">{{ $resource->id_resources }}</td>
                                        <td class="text-center">{{ $resource->User->user_name }}</td>
                                        <td class="text-center">{{ $resource->resource_title }}</td>
                                        <td class="text-center">{{ $resource->category->categorie_name }}</td>
                                        <td class="text-center">{{ $resource->created_at }}</td>
                                        <td class="text-center">
                                            <a href="/resource/delete/{{ $resource->id_resources }}"
                                                class="btn btn-danger btn-action" data-toggle="tooltip" title="Eliminar">
                                                <i class="fas fa-trash"></i></a>
                                            <a href="/resource/detail/{{ $resource->id_resources }}"
                                                class="btn btn-primary btn-action" data-toggle="tooltip" title="Ver">
                                                <i class="fas fa-eye"></i></a>
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
        <div class="section">
            <div class="row justify-content-center" style="margin-top: 3%">
                <div class="container">
                    <div class="col-md-12">
                        <h1 class="text-align-center" style="margin: 20% 50vh">No hay recursos</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
