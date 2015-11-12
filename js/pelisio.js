var opc ;
var info, votos;
$(document).ready(function() {
	
	$.getJSON("php/getPeliculas.php",function(e){
		opc = e;
		$('.optn:first').addClass('btn-primary');
		var frst = $('.optn:first').data('opcion');
		cargarPeli(frst-1);
		$.get("php/getVotos.php",function(data){if(data){ votos = data; }},'json');
		console.log(e);
	});
    
    $('.optn').on('click',function(e){
		e.preventDefault();
        $('.optn').removeClass('btn-primary');
        $(this).addClass('btn-primary');
        var ind = $(this).data('opcion');
        cargarPeli(ind-1);
    })

    function cargarPeli(numero){
    	$.get("https://api.themoviedb.org/3/movie/" + opc[numero] + "?api_key=07d6f07cb6ce3275257947db68e7abb2&append_to_response=videos&language=es",mostrarPelicula); }

    $('.votar').on('click',function(){
        var ind = $('.btn-primary').attr('href').substring(1);
        var data = {id:opc[ind-1]};
        $.post('php/votar.php',data,function(data){votos = data; alert('Se registro tu voto por ' + info.title + '\n' + 'Total votos : '+ data[info.id].votos); },'json'); 
    }); 
    
});



function mostrarPelicula(response){
	info = response;
    $('#divframe').attr('src','https://www.youtube.com/embed/'+info.videos.results[0].key+'?rel=0');
    var datos = $('#datos');
    datos.text('');
    datos.append("<br/><strong>Nombre</strong>: " + info.title);
    datos.append("<br/><strong>Duracion</strong>: " + info.runtime +" min");
    datos.append("<br/><strong>Sinopsis</strong>: " + info.overview);
    datos.append("<br/><strong>IMDB</strong>: " + info.vote_average);
}