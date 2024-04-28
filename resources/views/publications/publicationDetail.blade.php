@extends('layouts.master')
@section('content')
    <div class="section">
        @if (Auth::user() !== null && $publication->count() > 0)
            @include('includes.alerts')
            <div class="row justify-content-center mt-3">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card card-publication shadow" style="margin-top: 3%;">
                        <div class="card-header" style="margin: 2% 3%">
                            <div class="col_md_6">
                                @if ($publication->user->user_image)
                                    <div class="profile_publication float-left">
                                        <img src="/publication/profile/{{ $publication->user->user_image }}" alt="">
                                    </div>
                                @else
                                    <div class="profile_publication float-left">
                                        <img src="{{ asset('images/no_profile.png') }}" alt="">
                                    </div>
                                @endif

                            </div>
                            <div class="col-md-6 ">
                                <h4 class="card-title ml-3">{{ $publication->public_title }}</h4>
                                <h4 class="card-title ml-3">
                                    publicado {{ $publication->created_at->locale('es')->diffForHumans() }}</h4>
                                <h4 class="card-title ml-3 mb-3">
                                    Por:
                                    <a href="" class="text-decoration-none">
                                        {{ $publication->user->nick_name }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body" style="height: 95%; width:95%">
                            @if ($publication->public_image !== null)
                                @php
                                    $imageNames = json_decode($publication->public_image);

                                @endphp
                                <div class="container p_img_container">
                                    <div class="row justify-content-center">

                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                @foreach ($imageNames as $index => $imageName)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <img src="/publication/image/{{ $imageName }}" alt="Image">
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-10 ml-5 mb-3">
                                <div class="code-container">
                                    <div class="code">{!! highlight_string($publication->public_content, true) !!}</div>
                                </div>
                            </div>
                        </div>
                        <div class="line border-bottom" style="width: 95%; margin:auto"></div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-10">
                                <div class="card-body shadow mb-3">
                                    <div class="col-12 col-lg-12 justify-content-end mb-3">
                                        <div class="d-flex justify-content-center">
                                            <h4 class="bg-primary text-white pl-5 pr-5 pb-2 pt-2 rounded">Añadir respuesta
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="line border-bottom mb-2" style="width: 95%; margin:auto"></div>
                                    <form action="/comment/store/{{ $publication->id_publication }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4 editor">
                                            <label for="comment_content"
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Respuesta:
                                            </label>
                                            <div class="col-sm-12 col-md-8">
                                                <textarea id="myTextarea" class="shadow @error('comment_content') is-invalid @enderror" name="comment_content"></textarea>
                                                @error('comment_content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <script>
                                            var editor = CodeMirror.fromTextArea(document.getElementById('myTextarea'), {
                                                lineNumbers: true,
                                                mode: 'javascript', // modo de lenguaje
                                                extraKeys: {
                                                    "Ctrl-Space": "autocomplete"
                                                }, // activar autocompletado (opcional)
                                                autoCloseBrackets: true, // cerrar automáticamente corchetes (opcional)
                                                indentUnit: 4 // establecer la unidad de indentación (opcional)
                                            });

                                            editor.on("beforeChange", function(instance, changeObj) {
                                                // Obtener la posición del cursor
                                                var cursorPos = editor.getCursor();
                                                // Si se está pegando texto y no es una sola línea
                                                if (changeObj.origin == "paste" && changeObj.text.length > 1) {
                                                    // Obtener el texto pegado
                                                    var pastedText = changeObj.text.join("\n");
                                                    // Aplicar indentación al texto pegado
                                                    var indentedText = editor.options.indentWithTabs ? pastedText.replace(/^\t*/mg, "") : pastedText
                                                        .replace(new RegExp("^" + " ".repeat(editor.options.indentUnit), "mg"), "");
                                                    // Actualizar el texto en el editor con la indentación aplicada
                                                    instance.replaceRange(indentedText, {
                                                        line: cursorPos.line,
                                                        ch: 0
                                                    }, {
                                                        line: cursorPos.line,
                                                        ch: 0
                                                    }, "+input");
                                                    // Cancelar el cambio predeterminado
                                                    changeObj.cancel();
                                                }
                                            });
                                        </script>

                                        <div class="form-group row mb-4">
                                            <label for="files"
                                                class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cargar
                                                Imágenes</label>
                                            <div class="col-sm-12 col-md-8">
                                                <div class="border p-3">
                                                    <label for="files" class="btn btn-light btn-block mb-3">
                                                        <i class="fas fa-upload mr-2"></i>Seleccionar imágenes
                                                    </label>
                                                    <input type="file" id="files" name="comment_image[]"
                                                        accept="image/*" multiple style="display: none;">
                                                    <div id="imagePreview"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById('files').addEventListener('change', function() {
                                                var imagePreview = document.getElementById('imagePreview');

                                                for (var i = 0; i < this.files.length; i++) {
                                                    var file = this.files[i];

                                                    // Verificar si el archivo es una imagen
                                                    if (!file.type.startsWith('image/')) {
                                                        continue;
                                                    }

                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        var img = document.createElement('img');
                                                        img.src = e.target.result;
                                                        img.classList.add('img-thumbnail', 'mr-2', 'mb-2');
                                                        img.style.maxWidth = '150px'; // Ajustar el tamaño máximo de la imagen
                                                        imagePreview.appendChild(img);
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        </script>
                                        <div class="form-group row mb-4">
                                            <input class="btn btn-primary" type="submit" value="Comentar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="line border-bottom" style="width: 95%; margin:auto"></div>
                        @if ($comments != false)
                            @foreach ($comments as $comment)
                                <div class="row justofy-content-center mt-3 ml-5">
                                    <div class="col-12 col-md-11 col-lg-11">
                                        <div class="card shadow ">
                                            <div class="card-header">

                                            </div>
                                            <div class="card-body">
                                                <div class="col-10 col-md-8">
                                                    {{-- <div class="code">{!! highlight_string($comment->comment_content, true) !!}</div> --}}
                                                    <p>
                                                    <div class="code">{!! highlight_string($comment->comment_content, true) !!}</div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <div class="section">
                                <div class="row justify-content-center" style="margin: 3% 28%">
                                    <div class="container">
                                        <div class="col-md-12">
                                            <h3 class="text-align-center">No hay comentarios</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            @else
                <div class="section">
                    <div class="row justify-content-center" style="margin-top: 3%">
                        <div class="container">
                            <div class="col-md-12">
                                <h1 class="text-align-center" style="margin: 20% 50vh">Bienvenido</h1>
                            </div>
                        </div>
                    </div>
                </div>
        @endif

    @endsection
