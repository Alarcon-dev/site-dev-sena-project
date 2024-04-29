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
            <form action="/comment/store/{{ $publication->id_publication }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4 editor">
                    <label for="comment_content"
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Respuesta:
                    </label>
                    <div class="col-sm-12 col-md-8">
                        <textarea id="myTextarea" class="shadow @error('comment_content') is-invalid @enderror" name="comment_content">
                        </textarea>
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
                    <label for="files" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cargar
                        Imágenes</label>
                    <div class="col-sm-12 col-md-8">
                        <div class="border p-3">
                            <label for="files" class="btn btn-light btn-block mb-3">
                                <i class="fas fa-upload mr-2"></i>Seleccionar imágenes
                            </label>
                            <input type="file" id="files" name="comment_image[]" accept="image/*" multiple
                                style="display: none;">
                            <div id="imagePreview">
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
                <div class="form-group row mb-4">
                    <input class="btn btn-primary" type="submit" value="Comentar">
                </div>
            </form>
        </div>
    </div>
</div>
