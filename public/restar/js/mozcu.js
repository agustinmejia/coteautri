//
$(function(){
  $('body').hide().fadeIn(500);
});

//MENU LATERAL PARA RESOLUCIONES PEQUEÑAS
$(document).ready(function () {
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });
});

//OCULTAR MOSTRAR CAMPO DE EMAIL DE PAYPAL
$(document).ready(function() {
    $("#emailPaypal").hide();
})
$(document).ready(function(){
		$('#btnPaypal').click(function(){
            $('#emailPaypal').fadeIn();
            $( "#btnPaypal" ).addClass( "active" );
            $('#btnMp').removeClass("active");
        });
        $('#btnMp').click(function(){
            $( '#btnMp' ).addClass( "active" );
            $('#emailPaypal').fadeOut();
            $('#btnPaypal').removeClass("active");

        })
	});

//Inicio loader documento

$(window).load(function(){
	$('#preloader').fadeOut('slow',function(){$(this).remove();});
});
