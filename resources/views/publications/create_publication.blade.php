@extends('layouts.master')
@section('content')
    <section class="section" style="margin-top: 8%;">
        <div class="section-body">
            <h2 class="section-title">Crear nueva publicación</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>!!crea tu publicación!!</h4>
                        </div>
                        <div class="card-body">
                            <form action="/save/publication" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="public_title"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="public_title"
                                            class="form-control @error('public_title') is-invalid @enderror">
                                        @error('public_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="cate_public_id"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoría</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('cate_public_id') is-invalid @enderror"
                                            name="cate_public_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id_categorie }}">
                                                    {{ $category->categorie_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('cate_public_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="name"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple @error('public_content') is-invalid @enderror" name="public_content"></textarea>
                                        @error('public_content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="public_image"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagen</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="public_image" id="image-label">Cargar archivo</label>
                                            <input class="@error('public_image') is-invalid @enderror" type="file"
                                                name="public_image" id="image-upload" />
                                            @error('public_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="submit" class="btn btn-primary" value="Publicar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
