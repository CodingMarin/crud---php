<?php

require_once 'config/conexion.php';

$obj = new conexion();
$conexion = $obj->getConnection();

#start definition no conection
if (!isset($conexion)) {
	header('location:404/error.php');
} else {
	include_once 'view.php';
}
#end definition
?>