@extends('layouts.master')
@section('content')
    <section class="section" style="margin-top: 8%;">
        <div class="section-body">
            <h2 class="section-title">Editar Coemntario</h2>
            <div class="row">
                @include('includes.alerts')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>!!edita tu publicación!!</h4>
                        </div>
                        <div class="card-body">
                            <form action="/comment/update/{{ $comment->id_comment }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id_publication"
                                    value="{{ isset($publication) ? $publication->id_publication : '' }}">
                                <div class="form-group row mb-4 editor">
                                    <label for="name"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-8">
                                        <textarea id="myTextarea" class="shadow @error('public_content') is-invalid @enderror" name="comment_content">{{ isset($comment->comment_content) ? $comment->comment_content : '' }}</textarea>
                                        @error('public_content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <script>
                                        var editor = CodeMirror.fromTextArea(document.getElementById('myTextarea'), {
                                            lineNumbers: true, // activar números de línea
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
                                </div>
                                <div class="form-group row mb-4 mt-3">
                                    <div class="form-group row mb-4">
                                        <label for="files"
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cargar
                                            Imágenes</label>
                                        <div class="col-sm-12 col-md-8">
                                            <div class="border p-3">
                                                <label for="files" class="btn btn-light btn-block mb-3">
                                                    <i class="fas fa-upload mr-2"></i>Seleccionar imágenes
                                                </label>
                                                <input type="file" id="files" name="comment_image[]" accept="image/*"
                                                    multiple style="display: none;">
                                                <div id="imagePreview" style="overflow-y: auto; max-height: 200px;">
                                                    @if ($comment->comment_image)
                                                        @php
                                                            $images = json_decode($comment->comment_image);
                                                        @endphp
                                                        @foreach ($images as $image)
                                                            <img src="/comment/image/{{ $image }}" alt="">
                                                        @endforeach
                                                    @endif
                                                </div>
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

                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="submit" class="btn btn-primary" value="Editar">
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
