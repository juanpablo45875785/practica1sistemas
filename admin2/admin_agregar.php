<?php
include("conexion.php");

// Verificar que se reciben los datos del formulario y que no están vacíos
if (
    isset($_POST['nombre'], $_POST['carnet'], $_POST['email'], $_POST['contrasena'], $_POST['id_rol'])
    && !empty($_POST['nombre']) && !empty($_POST['carnet']) && !empty($_POST['email']) && !empty($_POST['contrasena'])
    && !empty($_POST['id_rol']))
 {
    // Obtener los datos del formulario y escaparlos para prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $carnet = mysqli_real_escape_string($conexion, $_POST['carnet']);
    $correo = mysqli_real_escape_string($conexion, $_POST['email']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
    $roles = mysqli_real_escape_string($conexion, $_POST['id_rol']);
    $estado = 1;

    // Verificar si el correo o carnet ya existen en la base de datos
    $verif = "SELECT * FROM user WHERE correo = '$correo' OR carnet = '$carnet'";
    $resultado = mysqli_query($conexion, $verif);

    // Si el correo o carnet ya existe, redirigir al formulario de registro con un mensaje de error
    if (mysqli_num_rows($resultado) > 0) {
        header('Location: admin.php?error=correo_carnet_existente');
        exit;
    } else {
        // Preparar la consulta para insertar el nuevo usuario
        $sql = "INSERT INTO user (nombre, carnet, correo, contrasena, id_rol, estado) VALUES ('$nombre', '$carnet', '$correo', '$contrasena', '$roles' , '$estado')";

        // Ejecutar la consulta
        $query = mysqli_query($conexion, $sql);

        // Verificar si la inserción fue exitosa
        if ($query) {
            // Redirigir al panel de administración
            header("Location: admin.php");
            exit;
        } else {
            // Si hay un error en la inserción, mostrar un mensaje
            echo "ERROR AL INSERTAR";
        }
    }
} else {
    // Si no se recibieron los datos del formulario o algún campo está vacío, redirigir al formulario de registro con un mensaje de error
    header("Location: admin.php?error=datos_incompletos");
    exit;
}
?>
