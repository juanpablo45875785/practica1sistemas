<?php
include("conexion.php");

$id = $_POST["id_contacto"];
$nombre = $_POST['nombre_cont'];
$apellido = $_POST['apelldio_cont'];
$codigo1 = $_POST['cod_car_1'];
$codigo2 = $_POST['cod_car_2'];
$telefono1 = $_POST['telefono_1'];
$telefono2 = $_POST['telefono_2'];
$propietario = $_POST['propietario_cont'];
$origen = $_POST['cod_origen_dato'];
$codigoEstado = $_POST['cod_estado_cont'];
$descripcion = $_POST['descripcion_cont'];
$estado = $_POST['estado_cont'];

$sql = "UPDATE tbl_contacto SET nombre_cont='$nombre', apellido_cont='$apellido', cod_car_1='$codigo1', cod_car_2='$codigo2', telefono_1='$telefono1', telefono_2='$telefono2', propietario_cont='$propietario', cod_origen_dato='$origen', cod_estado_cont='$codigoEstado', descripcion_cont='$descripcion', estado_cont='$estado' WhERE id_contacto='$id'";
$query = mysqli_query($conexion, $sql);
if ($query) {
    header("Location: admin.php");
} else {
    echo "error al insertar";
}
