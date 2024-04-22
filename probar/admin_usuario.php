<?php


include("conexion.php");


// Procesar la búsqueda
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    // Obtener el término de búsqueda
    $buscar = '%' . mysqli_real_escape_string($conexion, $_GET['buscar']) . '%';

    // Preparara la consulta 
    $sql = "SELECT cont.*, car.nombre_car AS nombre_car_1, car2.nombre_car AS nombre_car_2 
    FROM tbl_contacto cont
    LEFT JOIN carrera_1 car ON cont.cod_car_1 = car.id_car 
    LEFT JOIN carrera_1 car2 ON cont.cod_car_2 = car2.id_car 
    WHERE cont.nombre_cont LIKE ? OR cont.apellido_cont LIKE ?";
    $resultado = mysqli_prepare($conexion, $sql);

    // Verificar si la preparación de la consulta fue exitosa
    if ($resultado) {
        // Vincular los parámetros de búsqueda a los marcadores de posición
        mysqli_stmt_bind_param($resultado, "ss", $buscar, $buscar);

        // Ejecutar la consulta preparada
        mysqli_stmt_execute($resultado);

        // Obtener el resultado de la consulta
        $query = mysqli_stmt_get_result($resultado);
    } else {
        // Manejar el error si la preparación de la consulta falla
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
        exit;
    }
} else {
    // Si no se proporciona un término de búsqueda, mostrar todos los usuarios activos
    $sql = "SELECT cont.*, car.nombre_car AS nombre_car_1, car2.nombre_car AS nombre_car_2
    FROM tbl_contacto cont 
    INNER JOIN carrera_1 car ON cont.cod_car_1 = car.id_car 
    LEFT JOIN carrera_1 car2 ON cont.cod_car_2 = car2.id_car WHERE estado_cont = 1 order by id_contacto asc limit 10"; //limit 10
    $query = mysqli_query($conexion, $sql);


    // Verificar si la consulta se ejecutó correctamente
    if (!$query) {
        // Manejar el error si la consulta falla
        echo "Error al obtener usuarios activos: " . mysqli_error($conexion);
        exit;
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">MENU</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="index.php">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Juan Pablo</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            INICIO
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Opciones
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">otros</div>

                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <!-- principal -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="text-center" style="color: black;">Buscar Usuario</h2>
                                        <form action="" method="GET">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="buscar" placeholder="Nombre o Apellido">
                                                <button class="btn btn-primary" type="submit">Buscar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <div class="users-table">
                            <div class="col-xl-16 col-md-16">
                                <!-- <div class="table-responsive"> -->
                                <!-- boton excel -->
                                <div class="align-night mt-1">
                                    <a href="admin_exportar_excel.php" class="btn btn-success" onclick="return exportarExcel()"><i class="fas fa-file-excel"></i> Exportar a
                                        Excel</a>
                                </div>
                                <!-- boton pdf -->
                                <div class="align-night mt-2">
                                    <a href="admin_exportar_pdf.php" class="btn btn-danger" onclick="return exportarPdf()"><i class="fas fa-file-pdf"></i> Exportar a
                                        pdf</a>
                                </div>
                                <div class="align-night mt-2">
                                <a href="admin_usuario_insertar.php" class="btn btn-success">Agregar Usuario</a>
                                </div>
                                <table class="table table-success  table-striped table-bordered table-hover table-sm border-primary" id="DataTable">
                                    <div class="card-body">
                                        <h1 class="text-center">USUARIOS REGISTRADOS</h1>
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
                                                <th scope="col">EDITAR</th>
                                                <th scope="col">ELIMINAR</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php while ($row = mysqli_fetch_array($query)) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?= $row['id_contacto'] ?>
                                                    </th>
                                                    <td>
                                                        <?= $row['nombre_cont'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['apellido_cont'] ?>
                                                    </td>

                                                    <td>
                                                        <?= /*$row['cod_car_1'] . " " .*/ $row['nombre_car_1']; ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        if ($row['cod_car_2'] == 0) {
                                                            echo "Sin Carrera";
                                                        } else {
                                                            echo /*$row['cod_car_2'] . " " . */ $row['nombre_car_2'];
                                                        }
                                                        ?>
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
                                                    <td>
                                                        <a href="admin_usuario_editar.php?id_contacto=<?= $row['id_contacto'] ?>" class="btn btn-primary">Editar</a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger" onclick="ConfirmarEliminacion(<?= $row['id_contacto'] ?>)">Eliminar</a>
                                                    </td>
                                                   



                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>



    <script>
        function ConfirmarEliminacion(id_contacto) {
            var confirmar = confirm("desea eliminar este usuario");
            if (confirmar) {
                return window.location.href = "admin_usuario_eliminar.php?id_contacto=" + id_contacto;
            } else {
                return false;
            }
        }
    </script>
    <script>
        function exportarExcel() {
            var confirmar = confirm("Exportar Tabla a Excel");

            return confirmar;
        }
    </script>
    <script>
        function exportarPdf() {
            var confirmar = confirm("Exportar Tabla a PDF");

            return confirmar;
        }
    </script>


</body>

</html>