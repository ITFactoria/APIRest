<?php 
require_once "controladores/plantilla.controlador.php";
require_once "controladores/formularios.controlador.php";
require_once "modelos/formularios.modelo.php";
#require_once "modelos/conexion.php";


#$conexion = Conexion::conectar();
#print_r($conexion);


$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPLantilla();


?>