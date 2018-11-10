<?php
ob_start();
require_once("Model/crud.php");
require_once("Model/model.php");
require_once("Controller/controller.php");

$carga = new Controller();
$carga ->pagina();


?>