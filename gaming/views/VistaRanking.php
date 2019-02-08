<?php

abstract class VistaRanking {

    function __construct(){
    }

    static function render($codigo) {

        $cadena = "";
        $cadena .= "<h3 class='text-info'>RANKING</h3>";
        $cadena .= "<ul class='list-group'>";
        foreach($codigo as $player) {
            $cadena .= "<li class='list-group-item'>".$player[1]." con ".$player[2]." puntos&nbsp;</li>";
        }
        
        $cadena .= "</ul><br>";

        return $cadena;

    }
}

?>