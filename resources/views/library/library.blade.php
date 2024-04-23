@extends('layouts.master')
@section('content')
    @if ($resources->count() > 0)
        <div class="row" style="margin-top: 8%; margin-right: 8%">
            @foreach ($resources as $resource)
                <div class="col-4">
                    <div class="card card-resource">
                        <div class="card-body resource-image">
                            <img src="/resource/image/{{ $resource->resource_image }}" alt="">
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-12 col-lg-12 mb-2">
                                    <b>Titulo: </b> {{ $resource->resource_title }}
                                </div>
                                <hr>
                                <div class="col-12 col-md-12 col-lg-12 mb-2">
                                    <b>Sipnópsis</b>
                                    {!! Illuminate\Support\Str::limit($resource->resource_description, 150) !!}
                                    <b>Edición: </b>{{ $resource->resource_edition }}
                                </div>
                                <div class=" col-12 col-md-12 col-lg-12 btn btn-primary">Ver dedecripción</a></div>
                                <div class="col-12 col-md-12 col-lg-12 mt-3 text-center">
                                    <a class="btn btn-primary"
                                        href="/file/download/{{ $resource->resource_file }}">Descargar recurso</a>
                                    @role('admin')
                                        <a href="" class="btn btn-danger btn-action mr-2 ml-2" data-toggle="tooltip"
                                            title="Eliminar">
                                            <i class="fas fa-trash"></i></a>
                                        <a href="/resource/edit/{{ $resource->id_resources }}"
                                            class="btn btn-success btn-action" data-toggle="tooltip" title="Editar">
                                            <i class="fas fa-edit"></i></a>
                                    @endrole
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
