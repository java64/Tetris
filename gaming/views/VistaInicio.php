<?php

abstract class VistaInicio {

    function __construct(){
    }

    //Pinta la vista que se mandará por Ajax con los datos de la API
    static function render($codigo) {
    	require_once($codigo);
        return "";

    }
}

?>