<?php
require '../../../../php/conexion.php';
$db = new MySQL();

header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

$response = ['last_number' => null, 'error' => null];

try {
    if (isset($_GET['abreviatura']) && isset($_GET['year'])) {
        $abreviatura = $_GET['abreviatura'];
        $year = $_GET['year'];

        $lastNumber = $db->getLastRequisitionNumber($abreviatura, $year);
        $response['last_number'] = $lastNumber;
    } else {
        $response['error'] = 'Faltan parámetros';
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
?>
