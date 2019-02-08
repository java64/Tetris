<?php

class BDRanking {

	function __construct() {

	}

	//Mostramos todos los editores de la bd
	function mostrar() {
		$conexion = Db::conectar();
		$listaR = [];
		try {
			$consulta = $conexion->query('SELECT * FROM ranking ORDER BY puntuacion DESC');
			foreach($consulta->fetchAll(PDO::FETCH_OBJ) as $player) {
				$myPlayer[0] = $player->id;
				$myPlayer[1] = $player->nick;
				$myPlayer[2] = $player->puntuacion;
				array_push($listaR, $myPlayer);
			}
		} catch (PDOException $e){
			    echo $e->getMessage();
			    return false;
		}

		$conexion = null;
		return $listaR;
	}


	//Método para insertar un editor nuevo en la BD
	function insertar($unNick, $unaPuntuacion) {
			try {
				$conexion = Db::conectar();
				$insert=$conexion->prepare('INSERT INTO ranking (nick, puntuacion) values(:nick,:puntuacion)');
				$insert->bindValue('nick',$unNick);
				$insert->bindValue('puntuacion',$unaPuntuacion);
				$insert->execute();
			} catch (PDOException $e){
			    file_put_contents('bd.log', $e->getMessage());
			    return false;
			}	
			$conexion = null;

			return true;

	}

}


?>