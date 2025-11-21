<?php 
    require '../../php/conexion.php';
    $db = new Mysql();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $db->eliminarAbreviatura($id);
        header('Location: ../abreviaturas.php');
        exit();
    }
?>