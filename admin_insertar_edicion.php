<?php
include("conexion.php");

// Verificar si se envió el formulario y si los datos están presentes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre_cont'], $_POST['apellido_cont'], $_POST['cod_car_1'], $_POST['cod_car_2'], $_POST['telefono_1'], $_POST['telefono_2'], $_POST['propietario_cont'], $_POST['cod_origen_dato'], $_POST['cod_estado_cont'], $_POST['descripcion_cont'], $_POST['estado_cont'])) {

    // Obtener los datos del formulario y escaparlos para prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre_cont']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido_cont']);
    $codigo1 = mysqli_real_escape_string($conexion, $_POST['cod_car_1']);
    $codigo2 = mysqli_real_escape_string($conexion, $_POST['cod_car_2']);
    $telefono1 = mysqli_real_escape_string($conexion, $_POST['telefono_1']);
    $telefono2 = mysqli_real_escape_string($conexion, $_POST['telefono_2']);
    $propietario = mysqli_real_escape_string($conexion, $_POST['propietario_cont']);
    $origen = mysqli_real_escape_string($conexion, $_POST['cod_origen_dato']);
    $codigoestado = mysqli_real_escape_string($conexion, $_POST['cod_estado_cont']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion_cont']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado_cont']);

    // Obtener el ID del usuario a editar (supongamos que se pasa como un parámetro GET llamado 'id')
    $id = $_POST['id_contacto'];

    // Preparar la consulta para actualizar los datos del usuario
    $sql = "UPDATE tbl_contacto SET nombre_cont='$nombre', apellido_cont='$apellido', cod_car_1='$codigo1', cod_car_2='$codigo2', telefono_1='$telefono1', telefono_2='$telefono2', propietario_cont='$propietario', cod_origen_dato='$origen', cod_estado_cont='$codigoestado', descripcion_cont='$descripcion', estado_cont='$estado' WHERE id_contacto='$id'";

    // Ejecutar la consulta
    $query = mysqli_query($conexion, $sql);

    // Verificar si la actualización fue exitosa
    if ($query) {
        // Redirigir al panel de administración
        header("Location: admin.php");
        exit;
    } else {
        // Si hay un error en la actualización, mostrar un mensaje
        echo "ERROR AL ACTUALIZAR";
    }
} else {
    // Si no se enviaron los datos del formulario, redirigir al formulario de edición con un mensaje de error
    header("Location: admin_editar.php?error=datos_incompletos");
    exit;
}
?>
