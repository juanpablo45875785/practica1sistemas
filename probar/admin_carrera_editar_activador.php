<?php
include("conexion.php");


// Obtener los datos del formulario y escaparlos 
$nombres = mysqli_real_escape_string($conexion, $_POST['nombre_car']);

// Obtener el ID del usuario a editar 
$id = $_POST['id_car'];
$nombres = $_POST['nombre_car'];
$estado=1;

// Preparar la consulta para actualizar los datos del usuario
$sql = "UPDATE carrera_1 SET nombre_car='$nombres', estado_car='$estado' WHERE id_car='$id'";

// Ejecutar la consulta
$query = mysqli_query($conexion, $sql);

// Verificar si la actualización fue exitosa
if ($query) {
    // Redirigir al panel de administración
    header("Location: admin_carrera_tabla.php");
    exit;
} else {
    // Si hay un error en la actualización, mostrar un mensaje
    echo "ERROR AL ACTUALIZAR";
}
