<?php
	spl_autoload_register( function( $NombreClase ) {
		//Incluir clases del modelo y de la vista
        if (file_exists('views/' . $NombreClase . '.php')) {
            include_once('views/' . $NombreClase . '.php');
        }
        if (file_exists('models/' . $NombreClase . '.php')) {
            include_once('models/' . $NombreClase . '.php');
        }        
	} );

	class Controlador {

		//Constructor, pero podría ser una clase con métodos estáticos
		function __construct() {
	        
	    }

	    function inicio() {
			echo VistaInicio::render("index.html");
	    }

	    //Muestra las ranking
	    function ranking() {
			//Obtengo mis cervezas favoritas del modelo
			$ranking = BDRanking::mostrar();
			//Mostrar devuelve false si hay un error en la BD
			if (!$ranking) {
				echo VistaError::render("Error en la Base de Datos, consulta con tu administrador");
			} else {
				//Llamo a la vista para que genere html. Lo devuelvo Ajax
				echo VistaRanking::render($ranking);
			}
	    }

		//Añade una cerveza a mis favoritas
		function insertar() {
			//Decodificamos objeto Javascript/Json pasado por POST
			//$objeto = json_decode($_POST["parametros"],false);
			//Insertamos puntuacion en BD favoritos llamando al modelo
			$estado = BDRanking::insertar($_POST['nick'], $_POST['puntuacion']);
			if ($estado) {
				$this->ranking();
			} else {
				echo VistaError::render("Error en la Base de Datos, consulta con tu administrador");
			}

		}

		//En caso de no ser una url/método válido mostramos vista de error
		function error() {
			echo VistaError::render("Anda, prueba con otra");

		}
}



?>