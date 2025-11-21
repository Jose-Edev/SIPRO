<?php
require '../../../../php/conexion.php';
$db = new MySQL();

$requisicion_id = $_POST["requisicion_id"];
$fecha_elab = $_POST["fecha_elab"];
$idClienteSM = $_POST["idClienteSM"];

$db->EditarOT($requisicion_id, $fecha_elab);


if (isset($_POST['partidas']) && is_array($_POST['partidas'])) {
    foreach ($_POST['partidas'] as $partida) {
        $partida_id = $partida['id'];
        $muestra = $partida['muestra'];
        $sobre_pieza = $partida['sobre_pieza'];
        $material = $partida['material'];
        $fecha_entrega = $partida['fecha_entrega'];
        // Actualizar cada partida
        $db->EditarPartidaOT($partida_id, $muestra, $sobre_pieza, $material, $fecha_entrega);
    }
}
header('Location: ../../OrdenesTrabajo.php?cliente=' . $idClienteSM . '');
exit();
?>