<?php
include "conexion.php";

$sql = "SELECT * FROM tbl_contacto";
$query = mysqli_query($conexion, $sql);;

header("Content-Type: aplication/xls");
header("Content-Disposition: attachment; Filename = Archivo.xls");
?>
<h1 align="center">USUARIOS REGISTRADOS</h1>
<table class="table table-success  table-striped table-bordered table-hover table-sm border-primary" id="DataTable">
    <div class="card-body">
        <thead class=" text-center table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">COD_CARRERA_1</th>
                <th scope="col">COD_CARRERA_2</th>
                <th scope="col">TELEFONO_1</th>
                <th scope="col">TELEFONO_2</th>
                <th scope="col">PROPIETARIO</th>
                <th scope="col">COD_ORIGEN_PAIS</th>
                <th scope="col">COD_CIVIL</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">ESTADO</th>
                
            </tr>
        </thead>
        <tbody class="text-center">
            <?php while ($row = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td>
                        <?= $row['id_contacto'] ?>
                    </td>
                    <td>
                        <?= $row['nombre_cont'] ?>
                    </td>
                    <td>
                        <?= $row['apellido_cont'] ?>
                    </td>
                    <td>
                        <?= $row['cod_car_1'] ?>
                    </td>
                    <td>
                        <?= $row['cod_car_2'] ?>
                    </td>
                    <td>
                        <?= $row['telefono_1'] ?>
                    </td>
                    <td>
                        <?= $row['telefono_2'] ?>
                    </td>
                    <td>
                        <?= $row['propietario_cont'] ?>
                    </td>
                    <td>
                        <?= $row['cod_origen_dato'] ?>
                    </td>
                    <td>
                        <?= $row['cod_estado_cont'] ?>
                    </td>
                    <td>
                        <?= $row['descripcion_cont'] ?>
                    </td>
                    <!-- COLORES DEL ESTADO -->
                    <?php
                    if ($row['estado_cont'] == 1) {
                        $estado_name = "Activo";
                        $color = "text-success";
                    } elseif ($row['estado_cont'] == 0) {
                        $estado_name = "Inactivo ";
                        $color = "text-danger";
                    } else {
                        $estado_name = "Estado desconocido";
                        $color = "text-dark";
                    }

                    ?>
                    <!-- IMPRIMIR -->
                    <th class="<?php echo $color ?>">
                        <?php echo $estado_name ?>
                    </th>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </div>
</table>
