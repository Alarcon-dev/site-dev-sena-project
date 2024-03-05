@extends('layouts.master')
@section('content')
    <section class="section" style="margin-top: 8%;">
        <div class="section-body">
            <h2 class="section-title">Crear nueva publicación</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Post</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoría</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric">
                                        @foreach ($categories as $category)
                                            <option>{{ $category->categorie_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple @error('public_content') is-invalid @enderror"></textarea>
                                    @error('public_content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagen</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Cargar archivo</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Create Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
