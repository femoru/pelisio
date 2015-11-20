<?php 
    session_start();
    if(!$_SESSION['userid']){
        header('Location: index.html');
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="@rhadhy">
        <!--<link rel="icon" href="../../favicon.ico">-->
    
        <title>SIO | Viernes de Peliculas</title>
          <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>

    <body>
		<header>
			<nav id="barra" class="navbar-inner navbar-fixed-top">
				<div class="container-fluid">
					<p class="pull-left"> Viernes de Peliculas </p>
					<form class="pull-right" role="search" action="php/cerrarSesion.php">
                    <button data-toggle="modal" data-target=".bs-example-modal-sm" id="unlogin" type="submit" class="btn btn-default btn-sm"><strong>Volver</strong></button>
                  </form>
				</div>
        	</nav>
           
		</header>
        <div class="container-fluid">
            <div class="col-sm-2 fixed-top">
            <h2><ins>Posteadas</ins></h2>
                <div id="posteadas">
                    <!-- div class="col-sm-12 thumbnail">
                        <h4>Spectre</h4>
                          <img class="img-rounded img-responsive" src="https://image.tmdb.org/t/p/w185/1n9D32o30XOHMdMWuIT4AaA5ruI.jpg" width="140" height="140">
                    </div -->
                </div>
            </div>
            <div class="col-sm-10">
            <h1><ins>Disponibles</ins></h1>
                <div id="movies" class="container-fluid">
                    <!-- div class="col-sm-12 thumbnail">
                        <div class="col-sm-2">
                          <img class="img-rounded img-responsive" src="https://image.tmdb.org/t/p/w185/1n9D32o30XOHMdMWuIT4AaA5ruI.jpg" width="140" height="140">
                        </div>
                        <div class="col-sm-10">
                            <h2>Spectre (2015)</h2>
                            <p class="text-justify">Un críptico mensaje del pasado envía a James Bond a una misión secreta a México D.F. y luego a Roma, donde conoce a Lucía Sciarra, la hermosa viuda de un infame criminal. Bond se infiltra en una reunión secreta y descubre la existencia de una siniestra organización conocida como SPECTRE. Mientras tanto, en Londres, el nuevo director del Centro para la Seguridad Nacional cuestiona las acciones de Bond y pone en duda la importancia del MI6, encabezado por M. De modo encubierto Bond recluta a Moneypenny y Q para que le ayuden a buscar a Madeleine Swann, la hija de su antiguo archienemigo, el Sr. White, que quizá tenga la clave para desentrañar el misterio de SPECTRE. A medida que Bond avanza en su misión, descubre una estremecedora conexión entre él mismo y el enemigo que busca.</p>
                            <div class="col-sm-1"><p><a onclick="cargar_Trailer('//www.youtube.com/embed/zpOULjyy-n8?rel=0')" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Ver Trailer</a></p></div>
                            <div class="col-sm-off-2"><p class="text-right"><a class="btn btn-sm btn-success">GUARDAR</a></p></div>
                        </div> 
                    </div -->
                </div>
            </div>
        </div>
        <div id="modalTrailer" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="trailer" class="embed-responsive-item" src="" allowfullscreen=""></iframe>
                </div>
            </div>
          </div>
        </div>

    <!--JavaScript Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/pelisio2.js"></script>
    </body>
</html>