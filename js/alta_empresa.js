$(document).ready(function () {

    console.log('El documento esta preparado');


    /*$('#btnEnviar').on("click", function () {

        alert('Ha pulsado enviar');

    });*/

    $('#confirmDelete').on("click", function () {

        $('#name').val("");
        $('#direccion').val("");
        $('#email').val("");
        $('#movil').val("");
        $('#pass').val("");
        $('#repass').val("");
        $('#empresa').val("");
        $('#town').val("");
        $('#cp').val("");
        $('#pais').val("");
        $('#activ').val("");
    });



});
