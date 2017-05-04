$(document).ready(function () {

  console.log('El documento esta preparado');


  $('#btnBuscar').on("click", function() {

    alert('Ha pulsado buscar');

  });


  $('.dropdown-menu li a').click(function(){
    var selText = $(this).text();
    $(this).parents().find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');


  });
});
