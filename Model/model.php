<?php 

Class Paginas{
	
        public static function enlacesPaginasModel($enlacesModel){

            if ( $enlacesModel == "promociones" || $enlacesModel == "premios" || $enlacesModel == "visitas" || $enlacesModel == "clima" ||
                $enlacesModel == "mapa" || $enlacesModel == "horario" || $enlacesModel == "contra"|| $enlacesModel == "acerca" || $enlacesModel == "salir") {

            //mostramos el url concatenado con la variable $enlacesModel
            $module = "Views/modules/".$enlacesModel.".php";

        }		

        //una vez que action viene vacio (validando en el controlador) entonces se consulta si la variable $enlacesModel es igual a la cadea "index" para de ser asi se muestre index.php

        else if ($enlacesModel == "index") {
            $module = "Views/modules/inicio.php";


        }
        
            // Validar una LISTA BLANCA
        else{

            $module = "Views/modules/inicio.php";

        }

        return $module;
        }
    }



?>