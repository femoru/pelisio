var opc ;
var info, votos;
$(document).ready(function() {
	$.getJSON("php/getPeliculas.php",function(e){
		opc = e;
		$('.optn:first').addClass('btn-primary');
		var frst = $('.optn:first').data('opcion');
		cargarPeli(frst-1);

        $.post(
            "php/getVotos.php",
            {"cod":opc[frst-1]},
            function procesarEventos(resultado){
                //console.log(resultado);
                $('#totalVotos').html(''+resultado); 
            }
        );
		//console.log(e);
	});
    
    $('.optn').on('click',function(e){
		e.preventDefault();
        $('.optn').removeClass('btn-primary');
        $(this).addClass('btn-primary');
        var ind = $(this).data('opcion');
        cargarPeli(ind-1);

        $.post(
            "php/getVotos.php",
            {"cod":opc[ind-1]},
            function procesarEventos(resultado){
                //console.log(resultado);
                $('#totalVotos').html(''+resultado); 
            }
        );
    })

    
    $( "#inicioSesion" ).click(function() {
        var user = $( "#user" ).val();
        var pass = $( "#pass" ).val();
        $.post(
            "php/getUsuario.php",
            {"user":user,"pass":pass},
            function procesarEventos(resultado){
                if(resultado === "404"){
                    alert("Usuario " + user + " no registrado en el sistema");
                    $( "#user" ).val("");
                    $( "#pass" ).val("");
                    $( "#user" ).focus();
                }
                if(resultado === "3"){
                    alert("Usuario " + user + " esta inactivo");
                    $( "#user" ).focus();
                }
                if(resultado === "2"){
                    alert("Contraseña Incorrecta");
                    $( "#pass" ).val("");
                    $( "#pass" ).focus();
                }
                if(resultado === "1"){
                    $( "#form-logueo" ).submit();
                }
            }
        );


    });

    function cargarPeli(numero){
    	$.get("https://api.themoviedb.org/3/movie/" + opc[numero] + "?api_key=07d6f07cb6ce3275257947db68e7abb2&append_to_response=videos&language=es",mostrarPelicula); }

        $('.votar').on('click',function(){
            var ind = $('.btn-primary').attr('href').substring(1);
            var data = {id:opc[ind-1]};
            $.post(
                'php/votar.php',
                data,
                function(data){
                    if (data === '0') {
                        alert('Su voto ya fue registrado'); 
                    }else{
                        $('#totalVotos').html(''+data); 
                    }
            }); 
    }); 
    
});



function mostrarPelicula(response){
	info = response;
    if(info.videos.results.length === 0){
        $('#divframe').attr('src','https://image.tmdb.org/t/p/w185'+info.poster_path);
    }else{
        $('#divframe').attr('src','https://www.youtube.com/embed/'+info.videos.results[0].key+'?rel=0');
    }
	$('#imag').attr('src','https://image.tmdb.org/t/p/w185'+info.poster_path);
    var datos = $('#datos');
    datos.text('');
    datos.append("<br/><strong>Nombre</strong>: " + info.title);
    datos.append("<br/><strong>Duracion</strong>: " + info.runtime +" min");
    datos.append("<br/><strong>Sinopsis</strong>: " + info.overview);
    datos.append("<br/><strong>IMDB</strong>: " + info.vote_average);
}

function getIP(){
    /*
    $.get("http://ipinfo.io", function(response) {
        alert(response.ip);
    }, "jsonp");
    */
    $.post(
        "php/getIP.php",
        function procesarEventos(resultado){
            alert(resultado);
        }
    );


}