<?php
include("conexion.php");

// Verificar si se envió el formulario y si los datos están presentes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_contacto'])) {

    // Obtener el ID del contacto a editar
    $id = $_POST['id_contacto'];

    // Preparar la consulta para actualizar los datos del contacto
    $sql = "UPDATE tbl_contacto SET ";

    // Crear un array para almacenar los fragmentos de la consulta SET
    $set_array = array();

    // Verificar y añadir los campos que tienen valores
    if (!empty($_POST['nombre_cont'])) {
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre_cont']);
        $set_array[] = "nombre_cont='$nombre'";
    }
    if (!empty($_POST['apellido_cont'])) {
        $apellido = mysqli_real_escape_string($conexion, $_POST['apellido_cont']);
        $set_array[] = "apellido_cont='$apellido'";
    }
    if (!empty($_POST['cod_car_1'])) {
        $codigo1 = mysqli_real_escape_string($conexion, $_POST['cod_car_1']);
        $set_array[] = "cod_car_1='$codigo1'";
    }
    if (!empty($_POST['cod_car_2'])) {
        $codigo2 = mysqli_real_escape_string($conexion, $_POST['cod_car_2']);
        $set_array[] = "cod_car_2='$codigo2'";
    }
    if (!empty($_POST['telefono_1'])) {
        $telefono1 = mysqli_real_escape_string($conexion, $_POST['telefono_1']);
        $set_array[] = "telefono_1='$telefono1'";
    }
    if (!empty($_POST['telefono_2'])) {
        $telefono2 = mysqli_real_escape_string($conexion, $_POST['telefono_2']);
        $set_array[] = "telefono_2='$telefono2'";
    }
    if (!empty($_POST['propietario_cont'])) {
        $propietario = mysqli_real_escape_string($conexion, $_POST['propietario_cont']);
        $set_array[] = "propietario_cont='$propietario'";
    }
    if (!empty($_POST['cod_origen_dato'])) {
        $origen = mysqli_real_escape_string($conexion, $_POST['cod_origen_dato']);
        $set_array[] = "cod_origen_dato='$origen'";
    }
    if (!empty($_POST['cod_estado_cont'])) {
        $codigoestado = mysqli_real_escape_string($conexion, $_POST['cod_estado_cont']);
        $set_array[] = "cod_estado_cont='$codigoestado'";
    }
    if (!empty($_POST['descripcion_cont'])) {
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion_cont']);
        $set_array[] = "descripcion_cont='$descripcion'";
    }
    if (!empty($_POST['estado_cont'])) {
        $estado = mysqli_real_escape_string($conexion, $_POST['estado_cont']);
        $set_array[] = "estado_cont='$estado'";
    }

    // Construir la parte SET de la consulta
    $sql .= implode(", ", $set_array);

    // Agregar la condición WHERE
    $sql .= " WHERE id_contacto='$id'";

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
    // Si no se enviaron los datos del formulario o el ID del contacto, redirigir al formulario de edición con un mensaje de error
    header("Location: admin_editar.php?error=datos_incompletos");
    exit;
}
?>

