<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siproadmin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$video_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT archivo FROM imgtrabajos WHERE idTrabajo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $video_id);
$stmt->execute();
$stmt->bind_result($video_data);
$stmt->fetch();
$stmt->close();
$conn->close();

if ($video_data) {
    $file_path = 'videos/' . $video_data; // Asegúrate de ajustar la ruta según corresponda
    if (file_exists($file_path)) {
        header('Content-Type: video/mp4');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    } else {
        echo "Archivo no encontrado.";
    }
} else {
    echo "Video no encontrado.";
}
?>
