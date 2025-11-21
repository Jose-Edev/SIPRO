<?php
require '../../../../php/conexion.php';
$db = new MySQL();

// Datos principales de la requisición
$requisicion_id = $_POST["requisicion_id"];
$requisicion2 = $_POST["requisicion2"];
$cliente = $_POST["cliente"];
$usuario = $_POST["usuario"];
$fecha = $_POST["fecha"];
$total_f = $_POST["total_f"];
$orden_salida = $_POST["orden_salida"];
$cot_no = $_POST["cot_no"];
$orden_compra = $_POST["orden_compra"];
$fact_no = $_POST["fact_no"];
$idClienteSM = $_POST['clienteSM'];

// Actualizar la información principal de la requisición
$db->EditarSiproMadre($requisicion_id, $cliente, $usuario, $fecha, $total_f,$orden_salida,$cot_no,$orden_compra,$fact_no, $idClienteSM, $requisicion2);

// Procesar las partidas
if (isset($_POST['partidas']) && is_array($_POST['partidas'])) {
    foreach ($_POST['partidas'] as $partida) {
        $partida_id = $partida['id'];
        $cantidad = $partida['cantidad'];
        $u_m = $partida['u_m'];
        $descripcion = $partida['descripcion'];
        $orden_trabajo = $partida['orden_trabajo'];
        $plano = $partida['plano'];
        $rep_fotografico = $partida['rep_fotografico'];
        $precio_uni = $partida['precio_uni'];
        $c_c = $partida['c_c'];
        $rf = $partida['rf'];
        $porcentaje = $partida['porcentaje'];
        $estatus = $partida['estatus'];

        // Actualizar cada partida
        $db->EditarPartidaSM($partida_id, $cantidad, $u_m, $descripcion, $cot_no, $orden_trabajo, $plano, $orden_compra, $orden_salida, $rep_fotografico, $fact_no, $precio_uni, $c_c, $rf, $porcentaje, $estatus, $requisicion_id);
    }
}

header('Location: ../../../sipromadre.php');
exit();
?>