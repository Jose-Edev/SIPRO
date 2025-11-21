<?php 
    require '../../php/conexion.php';
    $db = new Mysql();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $db->eliminarTrabajo($id);
        header('Location: ../trabajo.php');
        exit();
    }
?>