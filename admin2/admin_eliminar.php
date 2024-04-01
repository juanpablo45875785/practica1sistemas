<?php
include("conexion.php");

// Verificar si se recibió el ID del usuario
if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Definir el nuevo estado
    $estado = 0;

    // Construir la consulta SQL
    $sql = "UPDATE user SET estado = '$estado' WHERE id = '$id'";

    // Ejecutar la consulta SQL
    $query = mysqli_query($conexion, $sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($query) {
        // Redirigir de vuelta a la página de administración
        header("Location: admin.php");
        exit;
    } else {
        // Imprimir el error si hubo algún problema con la consulta SQL
        echo "Error al actualizar el estado del usuario: " . mysqli_error($conexion);
    }
} else {
    // Si no se recibió el ID del usuario, mostrar un mensaje de error
    echo "ID del usuario no recibido.";
}
?>
