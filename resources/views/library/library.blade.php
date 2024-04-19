@extends('layouts.master')
@section('content')
    @if ($resources->count() > 0)
        <div class="row" style="margin-top: 8%">
            @foreach ($resources as $resource)
                <div class="col-4 col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h4><code>{{ $resource->resource_title }}</code></h4>
                        </div>
                        <div class="card-body text-center resource-image">
                            <img src="/resource/image/{{ $resource->resource_image }}" alt="">
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            {{ $resource->resource_description }}
                            <a href="/file/download/{{ $resource->resource_file }}">Descargar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
