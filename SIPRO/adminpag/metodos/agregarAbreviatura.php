<?php
require '../../php/conexion.php';
$db = new MySQL();

$nombreEmpresa = $_POST["nombre"];
$abreviatura = $_POST["abreviatura"];

$db->agregarAbreviatura($nombreEmpresa, $abreviatura);

header('Location: ../abreviaturas.php');
exit();
?>