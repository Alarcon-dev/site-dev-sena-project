@extends('layouts.master')
@section('content')
    @include('includes.alerts')
    <div class="container" style="margin-top: 10%; margin-bottom: 10%">
        @if ($category !== null)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Crear categoría') }}</div>

                        <div class="card-body">
                            <form method="POST" action="/update/categorie/{{ $category->id_categorie }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="categorie_name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre categoría') }}</label>

                                    <div class="col-md-6">
                                        <input id="categorie_name" type="text"
                                            class="form-control @error('categorie_name') is-invalid @enderror"
                                            name="categorie_name" value="{{ $category->categorie_name }}" required
                                            autocomplete="email" autofocus>

                                        @error('categorie_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Actualizar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
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

    </div>
@endsection
