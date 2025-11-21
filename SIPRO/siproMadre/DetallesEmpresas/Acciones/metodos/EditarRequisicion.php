<?php
require '../../../../php/conexion.php';
$db = new MySQL();

$requisicion_id = $_POST["requisicion_id"];
$fecha_envio = $_POST["fecha_envio"];
$idClienteSM = $_POST["idClienteSM"];

$db->EditarRequi($requisicion_id, $fecha_envio);


if (isset($_POST['partidas']) && is_array($_POST['partidas'])) {
    foreach ($_POST['partidas'] as $partida) {
        $partida_id = $partida['id'];
        $ganancia_ingreso = $partida['ganancia_ingreso'];
        $ganancia_porcentaje = $partida['ganancia_porcentaje'];
        // Actualizar cada partida
        $db->EditarPartidaReq($partida_id, $ganancia_ingreso,$ganancia_porcentaje);
    }
}
header('Location: ../../Requisiciones.php?cliente=' . $idClienteSM . '');
exit();
?>