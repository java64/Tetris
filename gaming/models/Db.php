<?php
	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){

			try {
			    $dsn = "mysql:host=localhost;dbname=mvc";
			    self::$conexion = new PDO($dsn, "root", "");
			    self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e){
			    echo $e->getMessage();
			}

			return self::$conexion;
		}		
	} 
?>