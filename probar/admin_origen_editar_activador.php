<?php
include("conexion.php");


// Obtener los datos del formulario y escaparlos 
$nombres = mysqli_real_escape_string($conexion, $_POST['nombre_orig']);

// Obtener el ID del usuario a editar 
$id = $_POST['id_orig'];
$nombres = $_POST['nombre_orig'];
$estado=1;

// Preparar la consulta para actualizar los datos del usuario
$sql = "UPDATE origen_contacto SET nombre_orig='$nombres', estado_orig='$estado' WHERE id_orig='$id'";

// Ejecutar la consulta
$query = mysqli_query($conexion, $sql);

// Verificar si la actualización fue exitosa
if ($query) {
    // Redirigir al panel de administración
    header("Location: admin_origen_tabla.php");
    exit;
} else {
    // Si hay un error en la actualización, mostrar un mensaje
    echo "ERROR AL ACTUALIZAR";
}
