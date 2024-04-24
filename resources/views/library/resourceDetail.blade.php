@extends('layouts.master')
@section('content')
    @if ($resource !== null)
        <div class="row justify-content-center" style="margin: 8% auto">
            <div class="col-4">
                <div class="card card-resource">
                    <div class="card-footer bg-whitesmoke">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-12 col-lg-12 mb-2" style="text-align-last: center">
                                <b>Titulo: </b> {{ $resource->resource_title }}
                            </div>
                            <hr>
                            <div class="col-12 col-md-12 col-lg-12 mb-2">
                                <b>Autor: </b>{{ $resource->resource_author }}
                                <br>
                                <b>Sipnópsis:</b>
                                <br>
                                {!! $resource->resource_description !!}
                                <br>
                                <b>Edición: </b>{{ $resource->resource_edition }}
                            </div>
                            {{-- <div class=" col-12 col-md-12 col-lg-12 btn btn-primary">Ver dedecripción</a></div>
                            <div class="col-12 col-md-12 col-lg-12 mt-3 text-center"> --}}
                            <a class="btn btn-primary" href="/file/download/{{ $resource->resource_file }}">Descargar
                                recurso</a>
                            @role('admin')
                                <a href="/resource/delete/{{ $resource->id_resources }}"
                                    class="btn btn-danger btn-action mr-2 ml-2" data-toggle="tooltip" title="Eliminar">
                                    <i class="fas fa-trash"></i></a>
                                <a href="/resource/edit/{{ $resource->id_resources }}" class="btn btn-success btn-action"
                                    data-toggle="tooltip" title="Editar">
                                    <i class="fas fa-edit"></i></a>
                            @endrole
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
    @else
        <div class="section">
            <div class="row justify-content-center" style="margin-top: 3%">
                <div class="container">
                    <div class="col-md-12">
                        <h1 class="text-align-center" style="margin: 20% 50vh">No hay recurso</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
