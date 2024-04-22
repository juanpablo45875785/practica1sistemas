<?php
include("conexion.php");

// Verificar si se recibió el ID del usuario
if(isset($_GET['id_contacto']) && !empty($_GET['id_contacto'])) {
    $id = $_GET['id_contacto'];

    // Definir el nuevo estado
    $estado = 0;

    // Construir la consulta SQL
    $sql = "UPDATE tbl_contacto SET estado_cont = '$estado' WHERE id_contacto = '$id'";

    // Ejecutar la consulta SQL
    $query = mysqli_query($conexion, $sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($query) {
        header("Location: admin_usuario.php");
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
