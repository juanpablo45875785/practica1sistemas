<?php
include("conexion.php");

if(isset($_POST['cod_car_1']) && !empty($_POST['cod_car_1'])) {
    // Obtener los datos del formulario y escaparlos 
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre_cont']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido_cont']);
    $codigo1 = mysqli_real_escape_string($conexion, $_POST['cod_car_1']);
    // Verificar si se ha enviado un valor para cod_car_2 y asegurarse de que no esté vacío
    if(isset($_POST['cod_car_2']) && !empty($_POST['cod_car_2'])) {
        $codigo2 = mysqli_real_escape_string($conexion, $_POST['cod_car_2']);
    } else {
        // Si no se ha enviado ningún valor para cod_car_2 o se ha enviado un valor vacío, asigna un valor nulo para cod_car_2
        $codigo2 = null;
    }
    $telefono1 = mysqli_real_escape_string($conexion, $_POST['telefono_1']);
    $telefono2 = mysqli_real_escape_string($conexion, $_POST['telefono_2']);
    $propietario = mysqli_real_escape_string($conexion, $_POST['propietario_cont']);
    $origen = mysqli_real_escape_string($conexion, $_POST['cod_origen_dato']);
    $codigoestado = mysqli_real_escape_string($conexion, $_POST['cod_estado_cont']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion_cont']);
    $estado = 1;

    // Obtener el ID del usuario a editar 
    $id = $_POST['id_contacto'];

    // Preparar la consulta para actualizar los datos del usuario
    $sql = "UPDATE tbl_contacto SET nombre_cont='$nombre', apellido_cont='$apellido', cod_car_1='$codigo1', cod_car_2='$codigo2', telefono_1='$telefono1', telefono_2='$telefono2', propietario_cont='$propietario', cod_origen_dato='$origen', cod_estado_cont='$codigoestado', descripcion_cont='$descripcion', estado_cont='$estado' WHERE id_contacto='$id'";

    // Ejecutar la consulta
    $query = mysqli_query($conexion, $sql);

    // Verificar si la actualización fue exitosa
    if ($query) {
        // Redirigir al panel de administración
        header("Location: admin_usuario.php");
        exit;
    } else {
        // Si hay un error en la actualización, mostrar un mensaje
        echo "ERROR AL ACTUALIZAR";
    }
} else {
    // Si no se ha enviado un valor para cod_car_1 o se ha enviado un valor vacío, redirigir de vuelta al panel de administración
    header("Location: admin.php");
    exit;
}
?>