$(document).ready(function () {

  console.log('El documento esta preparado');


  $('#btnBuscar').on("click", function() {



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
      $(this).parents().find('.ofertasDestacadas').css({"margin-top":"184px"});
      $(this).find('span').removeClass('glyphicon-chevron-down');
      $(this).find('span').addClass('glyphicon-chevron-up');


    }
    else {
      {
        $('#bar').prop('checked','');
        $('#restaurante').prop('checked','');
        $('#busquedaAvanzada').css({'display': 'none'});
        $('#busquedaAvanzada').slideUp();
          $(this).parents().find('.ofertasDestacadas').css({"margin-top":"220px"});
        $(this).find('span').removeClass('glyphicon-chevron-up');
        $(this).find('span').addClass('glyphicon-chevron-down');
      }
    }
  });
/*
  $('#bar').on("click", function() {
    if($('#bar').prop('checked') == true)
    {
      alert("Marcado bar");
      //var data = "bar";
      $.post("../html/mostrarBusquedas.php", { tipo: "bar" }, function() {
        alert("Datos enviados");
      });
    }
  });
*/
  function aumentarImg()
  {
    alert("Agrandar");
  }
});
