<?php
    //Leer
    $user = $_POST["username"];
    $contraseña = $_POST["password"];

    //Validar Usuario

    if ($user == "" && $contraseña == "") {
        session_start();
        $_SESSION["admin"] = "";
        $_SESSION["user"] = "";
        header('Location: ../adminpag/siproAdmin.php');
    } elseif ($user == "" && $contraseña == "") {
        session_start();
        $_SESSION["admin"] = "";
        $_SESSION["user"] = "";
        header('Location:../adminpag/siproAdmin.php'); 
    } elseif ($user == "" && $contraseña == "") {
        session_start();
        $_SESSION["admin"] = "";
        $_SESSION["user"] = "";
        header('Location: ../adminpag/siproAdmin.php');
    } elseif ($user == "" && $contraseña == ""){
        session_start();
        $_SESSION["admin"] = "";
        $_SESSION["user"] = "";
        header('Location: ../adminpag/siproAdmin.php');
    } else{
        header('Location: ../iniciosesion.php');
    }
?>