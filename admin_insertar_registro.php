<?php
include("conexion.php");

// Verificar que se reciben los datos del formulario y que no están vacíos
if (
    isset($_POST['nombre_cont'], $_POST['apellido_cont'], $_POST['cod_car_1'], $_POST['cod_car_2'], $_POST['telefono_1'], $_POST['telefono_2'], $_POST['propietario_cont'], $_POST['cod_origen_dato'], $_POST['cod_estado_cont'], $_POST['descripcion_cont'], $_POST['estado_cont'])
    && !empty($_POST['nombre_cont']) && !empty($_POST['apellido_cont']) && !empty($_POST['cod_car_1']) && !empty($_POST['cod_car_2'])
    && !empty($_POST['telefono_1']) && !empty($_POST['telefono_2']) && !empty($_POST['propietario_cont']) && !empty($_POST['cod_origen_dato'])
    && !empty($_POST['cod_estado_cont']) && !empty($_POST['descripcion_cont']) && !empty($_POST['estado_cont'])
) {
    // Obtener los datos del formulario y escaparlos para prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre_cont']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido_cont']);
    $codigo1 = mysqli_real_escape_string($conexion, $_POST['cod_car_1']);
    $codigo2 = mysqli_real_escape_string($conexion, $_POST['cod_car_2']);
    $telefono1 = mysqli_real_escape_string($conexion, $_POST['telefono_1']);
    $telefono2 = mysqli_real_escape_string($conexion, $_POST['telefono_2']);
    $propietario = mysqli_real_escape_string($conexion, $_POST['propietario_cont']);
    $rigen = mysqli_real_escape_string($conexion, $_POST['cod_origen_dato']);
    $codigoestado = mysqli_real_escape_string($conexion, $_POST['cod_estado_cont']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion_cont']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado_cont']);





    // Preparar la consulta para insertar el nuevo usuario
    $sql = "INSERT INTO tbl_contacto (nombre_cont, apellido_cont, cod_car_1, cod_car_2, telefono_1, telefono_2, propietario_cont, cod_origen_dato, cod_estado_cont, descripcion_cont, estado_cont) VALUES ('$nombre', '$apellido', '$codigo1', '$codigo2', '$telefono1', '$telefono2', '$propietario', '$origen', '$codigoestado', '$descripcion', '$estado')";

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
} else {
    // Si no se recibieron los datos del formulario o algún campo está vacío, redirigir al formulario de registro con un mensaje de error
    header("Location: admin_insertar.php?error=datos_incompletos");
    exit;
}
