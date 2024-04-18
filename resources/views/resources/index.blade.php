@extends('layouts.master')
@section('content')
    <section class="section">
        @include('includes.alerts')
        <div class="section-body" style="margin-top: 8%">
            <h2 class="section-title">Crea tus recursos !!</h2>
            <p class="section-lead">
                Aquí puedes crear recursos descargables para tus usuarios.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Post</h4>
                        </div>
                        <div class="card-body">
                            <form action="/create/resource" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="resource_title"
                                            @error('resource_title') is-invalid @enderror">
                                        @error('resource_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Categoria</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="cate_resource_id"
                                            @error('cate_resource_id') is-invalid @enderror>
                                            @error('cate_resource_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if ($categories->count() > 0)
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id_categorie }}">
                                                        {{ $categorie->categorie_name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">No hay categorias creadas</option>
                                            @endif


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripción</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple" name="resource_description" @error('resource_description') is-invalid @enderror">
                                        </textarea>
                                        @error('resource_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="form-group row mb-4">
                                        <label for="resource_file"
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Archivo</label>
                                        <div class="col-sm-12 col-md-7">
                                            <label for="resource_file"></label>
                                            <input type="file" name="resource_file"
                                                class="form-control @error('resource_file') is-invalid @enderror">
                                            @error('resource_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-center col-12 col-md-3 col-lg-3">Imagen</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <img id="preview-image" />
                                                <label for="image-upload" id="file-label">Cargar imagen</label>
                                                <input type="file" name="resource_image" id="image-upload" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tu código JavaScript aquí -->
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            var imageUpload = document.getElementById('image-upload');
                                            var previewImage = document.getElementById('preview-image');
                                            var fileLabel = document.getElementById('file-label');

                                            imageUpload.addEventListener('change', function() {
                                                var file = this.files[0];
                                                if (file) {
                                                    var reader = new FileReader();
                                                    reader.onload = function() {
                                                        previewImage.src = reader.result;
                                                        fileLabel.textContent = file.name;
                                                    }
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    previewImage.src = "#";
                                                    fileLabel.textContent = "Choose File";
                                                }
                                            });
                                        });
                                    </script>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Autor</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="resource_author"
                                                @error('resource_author') is-invalid @enderror">
                                            @error('resource_author')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Año de
                                            edición</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" class="form-control inputtags" name="resource_edition"
                                                @error('resource_edition') is-invalid @enderror">
                                            @error('resource_edition')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Create Post</button>
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
