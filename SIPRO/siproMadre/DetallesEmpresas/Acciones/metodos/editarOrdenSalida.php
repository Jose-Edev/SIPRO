<?php
require '../../../../php/conexion.php';
$db = new MySQL();

$requisicion_id = $_POST["requisicion_id"];
$fecha_de_entrega = $_POST["fecha_de_entrega"];
$idClienteSM = $_POST["idClienteSM"];

$db->EditarOS($requisicion_id, $fecha_de_entrega);

header('Location: ../../Salidas.php?cliente=' . $idClienteSM . '');
exit();
?>