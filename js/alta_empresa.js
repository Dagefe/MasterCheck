$(document).ready(function () {

    console.log('El documento esta preparado');


    $('#btnEnviar').on("click", function () {

        alert('Ha pulsado enviar');

    });

    $('#btnBorrar').on("click", function () {

        $('#nombre').val("");
        $('#direccion').val("");
        $('#email').val("");
        $('#telefono').val("");

    });


    
});