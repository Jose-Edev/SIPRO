<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../../img/SIPROviñe.png" />
    <title>SIPRO Madre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<?php
    $cliente = $_POST["cliente"];
    $usuario = $_POST["usuario"];
    $fecha = $_POST["fecha"];
    $total_f = $_POST["total_f"];
    $requisicion_id = $_POST["requisicion_id"];
    $orden_salida = $_POST["orden_salida"];
    $cot_no = $_POST["cot_no"];
    $orden_compra = $_POST["orden_compra"];
    $fact_no = $_POST["fact_no"];
    $idClienteSM = $_POST["clienteSM"];


    require '../../../../php/conexion.php';
    $db = new MySQL();


    // Conectar a la base de datos usando mysqli
    $mysqli = new mysqli("localhost", "u108477797_sipro", "97402679Jlls", "u108477797_siproadmin");

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    // Verificar si el requisicion_id ya existe
    $check_query = "SELECT COUNT(*) AS count FROM sipromadre WHERE requisicion_id = ?";
    $stmt = $mysqli->prepare($check_query);
    $stmt->bind_param("s", $requisicion_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Si ya existe, redirigir con un mensaje de error
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Requisición Duplicada',
                        text: 'Esta requisición ya existe, favor de verificar los datos',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../../../sipromadre.php';
                        }
                    });
                });
            </script>";
    } else {
        // Insertar en orden_salida
        $insert_query = "INSERT INTO sipromadre (cliente, usuario, fecha, total_f, requisicion_id, orden_salida, cot_no, orden_compra,fact_no, idClienteSM) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)";
        $stmt = $mysqli->prepare($insert_query);
        $stmt->bind_param("sssssssssi", $cliente, $usuario, $fecha, $total_f, $requisicion_id, $orden_salida, $cot_no,$orden_compra ,$fact_no ,$idClienteSM);
        $stmt->execute();

        // Insertar particiones
        foreach ($_POST["partidas"] as $partida) {
            $db->agregarPartidaSM($partida ["num_partida"], $partida["cantidad"], $partida["u_m"], $partida["descripcion"],$partida["cot_no"], $partida["orden_trabajo"], $partida["plano"],$partida["orden_compra"],$partida["orden_salida"],$partida["rep_fotografico"],$partida["fact_no"],$partida["precio_uni"],$partida["c_c"],$partida["rf"],$partida["porcentaje"],$requisicion_id,);
        }

        // Redirigir a la página principal
        header('Location: ../../../sipromadre.php');
        exit();
    }

    // Cerrar la conexión
    $stmt->close();
    $mysqli->close();
?>
</body>
</html>


<!-- $cliente = $_POST["cliente"];
    $usuario = $_POST["usuario"];
    $fecha = $_POST["fecha"];
    $requisicion_id = $_POST["requisicion_id"];
    $idClienteSM = $_POST["clienteSM"];

    require '../../../../php/conexion.php';
    $db = new MySQL();

    // Insertar en orden_salida
    $db->agregarsiproMadre($cliente, $usuario, $fecha, $requisicion_id, $idClienteSM);

    // Insertar particiones
    foreach ($_POST["partidas"] as $partida) {
        $db->agregarPartidaSM($partida["cantidad"], $partida["u_m"], $partida["descripcion"],$partida["cot_no"], $partida["orden_trabajo"], $partida["plano"],$partida["orden_compra"],$partida["orden_salida"],$partida["rep_fotografico"],$partida["fact_no"],$partida["precio_uni"],$partida["total_f"],$partida["c_c"],$partida["rf"],$partida["porcentaje"],$requisicion_id,);
    }

    header('Location: ../../../sipromadre.php');
    exit(); -->
