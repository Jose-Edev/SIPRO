<?php
require '../../../../php/conexion.php';

$db = new MySQL(); // Crear la instancia de MySQL
$numeroSalida = $db->getNumeroSalida();

echo $numeroSalida;
?>