var movies = [];
$(document).ready(function() {
	
	cargarPelis();
    posteadas();
});

function guardarPeli(input){

    if(movies.indexOf(input.id) > -1){
        alert('Esta pelicula ya esta posteada');
    }else{
        movies.pop();
        movies.unshift(input.id);
        $.post(
            "php/guardarPeli.php",
            {"movies":movies},
            function procesarEventos(resultado){
                //console.log(resultado);
                posteadas();
            }
        );
    }
    //console.log(movies);
}

function posteadas(){
    $.getJSON("php/getPeliculas.php",function(data){
        $('#posteadas').html('');
        movies = [];
        for (var i = 0; i < data.length; i++) {
            movies.push(''+data[i]);
            $.get( "https://api.themoviedb.org/3/movie/"+data[i]+"?api_key=07d6f07cb6ce3275257947db68e7abb2&append_to_response=videos&language=es", function( data2 ) {
                $('#posteadas').append('<div class="col-sm-12 thumbnail">'+
                                            '<h4>'+data2.title+'</h4>'+
                                              '<img class="img-rounded img-responsive" src="https://image.tmdb.org/t/p/w185/'+data2.poster_path+'" width="140" height="140">'+
                                        '</div>');
            });
        }
        //console.log(movies);
    });
    
}

function cargar_Trailer(input){
    $('#trailer').attr('src','//www.youtube.com/embed/'+input.id+'?rel=0');
    $('#modalTrailer').click(function () {          
            $('#trailer').attr('src','');
    });
}

function cargarPelis(){
    $.get( "https://api.themoviedb.org/3/discover/movie?api_key=07d6f07cb6ce3275257947db68e7abb2&sort_by=popularity.desc&language=es&page=1", function( data1 ) {
     

    for (var i = 0; i < data1.results.length; i++) { 
        $.get( "https://api.themoviedb.org/3/movie/"+data1.results[i].id+"?api_key=07d6f07cb6ce3275257947db68e7abb2&append_to_response=videos&language=es", function( data2 ) {
            
            if(data2.videos.results.length === 0){
                $('#movies').append('<div class="col-sm-12 thumbnail">'+
                '<div class="col-sm-2">'+
                      '<img class="img-rounded img-responsive" src="https://image.tmdb.org/t/p/w185'+data2.poster_path+'" width="140" height="140">'+
                    '</div>'+
                    '<div class="col-sm-10">'+
                        '<h2>'+data2.title+'</h2>'+
                        '<p class="text-justify">'+data2.overview+'</p>'+
                        '<div class="col-sm-3"><p>No tiene trailer</p></div>'+
                    '<div class="col-sm-off-2"><p class="text-right"><a id="'+data2.id+'" onclick="guardarPeli(this)" class="btn btn-sm btn-success">GUARDAR</a></p></div>'+
                    '</div>'+
                '</div>');
            }else{
                $('#movies').append('<div class="col-sm-12 thumbnail">'+
                    '<div class="col-sm-2">'+
                          '<img class="img-rounded img-responsive" src="https://image.tmdb.org/t/p/w185'+data2.poster_path+'" width="140" height="140">'+
                        '</div>'+
                        '<div class="col-sm-10">'+
                            '<h2>'+data2.title+'</h2>'+
                            '<p class="text-justify">'+data2.overview+'</p>'+
                            '<div class="col-sm-3"><p><a id="'+data2.videos.results[0].key+'" onclick="cargar_Trailer(this)" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Ver Trailer</a></p></div>'+
                        '<div class="col-sm-off-2"><p class="text-right"><a id="'+data2.id+'" onclick="guardarPeli(this)" class="btn btn-sm btn-success">GUARDAR</a></p></div>'+
                        '</div>'+
                    '</div>');
            }

            //console.log(data2);
        });
    }
        //console.log(data1);
    });
}