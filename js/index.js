$(document).ready(function () {

  console.log('El documento esta preparado');


  $('#btnBuscar').on("click", function() {

    alert('Ha pulsado buscar');

  });


  $('.dropdown-menu li a').click(function(){
    var selText = $(this).text();
    $(this).parents().find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');


  });

  $('#santos').on("", function() {
    $(this).css({'width': '300px', 'height':'300px'});
  });

//Mostrar u ocultar el menu de busqueda avanzada
  $('#btnBusquedaAvanzada').on("click", function() {
    if($(this).find('span').hasClass('glyphicon-chevron-down'))
    {
      $('#busquedaAvanzada').css({'display': 'block'});
      $('#busquedaAvanzada').slideDown();
      $(this).find('span').removeClass('glyphicon-chevron-down');
      $(this).find('span').addClass('glyphicon-chevron-up');
    }
    else {
      {
        $('#busquedaAvanzada').css({'display': 'none'});
        $('#busquedaAvanzada').slideUp();
        $(this).find('span').removeClass('glyphicon-chevron-up');
        $(this).find('span').addClass('glyphicon-chevron-down');
      }
    }
  });

  function aumentarImg()
  {
    alert("Agrandar");
  }
});
