<?php 
    require '../../php/conexion.php';
    $db = new Mysql();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $db->eliminarCliente($id);
        header('Location: ../clientes.php');
        exit();
    }
?>