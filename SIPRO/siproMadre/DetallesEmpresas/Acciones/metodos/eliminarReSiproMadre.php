<?php 
require '../../../../php/conexion.php';
$db = new Mysql();
if (isset($_GET['requisicion_id'])){
    $requisicion_id = $_GET['requisicion_id'];
    $db->borrarSiproMadreYPartidas($requisicion_id);
    header('Location: ../../../sipromadre.php');
    exit();
}
?>
