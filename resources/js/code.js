$(document).ready(function() {
    // Inicializar Summernote
    $('#summernoteTextarea').summernote();

    // Manejar clic en el botón de guardar
    $("#saveButton").click(function() {
        var content = $('#summernoteTextarea').summernote(
            'code'); // Obtener el contenido de Summernote
        console.log("Contenido guardado:",
            content
        ); // Imprimir el contenido en la consola (puedes cambiar esta acción según tu necesidad)

        // Cerrar el modal
        $("#exampleModal").modal("hide");
    });
});