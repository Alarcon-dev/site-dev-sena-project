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
                                    <div class="col-sm-12 col-md-8">
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
                                    <div class="col-sm-12 col-md-8">
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
                                <div class="form-group row mb-4 editor">
                                    <label for="name"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-8">
                                        <textarea id="myTextarea" class="shadow @error('public_content') is-invalid @enderror" name="public_content"></textarea>
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
