<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hola";

// Establecer conexión a la base de datos
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Verificar errores en la conexión a la base de datos
if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$campo1 = $data['campo1'];
$campo2 = $data['campo2'];
$campo3 = $data['campo3'];
$id = $data['id'];

// Manejo de operaciones CRUD
if ($method === 'POST') {
    
    $insertQuery = "INSERT INTO contacto(campo1, campo2, campo3,  id) VALUES ('$campo1', '$campo2', '$campo3', '$id')";
    
    if (mysqli_query($connection, $insertQuery)) {
        $response = array('status' => 'success', 'message' => 'Datos insertados correctamente');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Error al insertar datos: ' . mysqli_error($connection));
        echo json_encode($response);
    }
}
mysqli_close($connection);
?>