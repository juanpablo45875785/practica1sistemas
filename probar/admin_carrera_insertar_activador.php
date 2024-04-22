<?php
include "conexion.php";
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre_car']);

$sql = "INSERT INTO carrera_1 (nombre_car) VALUES ('$nombre')";
$query = mysqli_query($conexion, $sql);
if ($query) {
    // Redirigir al panel de administración
    header("Location: admin_carrera_tabla.php");
    exit;
} else {
    // Si hay un error en la inserción, mostrar un mensaje
    echo "ERROR AL INSERTAR";
}


?>