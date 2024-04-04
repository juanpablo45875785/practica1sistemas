<?php


include ("conexion.php");

// Procesar la búsqueda
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    // Obtener el término de búsqueda y escaparlo para evitar inyección SQL
    $buscar = '%' . mysqli_real_escape_string($conexion, $_GET['buscar']) . '%';

    // Preparar la consulta con marcadores de posición
    $sql = "SELECT * FROM tbl_contacto WHERE  nombre_cont LIKE ? OR apellido_cont LIKE ? ";
    $stmt = mysqli_prepare($conexion, $sql);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Vincular los parámetros de búsqueda a los marcadores de posición
        mysqli_stmt_bind_param($stmt, "ss", $buscar, $buscar);

        // Ejecutar la consulta preparada
        mysqli_stmt_execute($stmt);

        // Obtener el resultado de la consulta
        $query = mysqli_stmt_get_result($stmt);
    } else {
        // Manejar el error si la preparación de la consulta falla
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
        exit;
    }
} else {
    // Si no se proporciona un término de búsqueda, mostrar todos los usuarios activos
    $sql = "SELECT * FROM tbl_contacto WHERE estado_cont= 1";
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
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
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

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.php">Login</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>

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
        <div id="layoutSidenav_content">
            <main>
                <div class="card-body">
                    <h1 class="text-center">USUARIOS REGISTRADOS</h1>
                    <div class="container">
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="text-center" style="color: black;">Buscar Usuario</h2>
                                            <form action="" method="GET">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="buscar"
                                                        placeholder="Nombre o Apellido">
                                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="users-table">
                                <div class="col-xl-16 col-md-16">
                                    <!-- <div class="table-responsive"> -->

                                    <table class="table table-success table-striped table-bordered border-primary"
                                        id="DataTable">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">APELLIDO</th>
                                                <th scope="col">CODIGO_1</th>
                                                <th scope="col">CODIGO_2</th>
                                                <th scope="col">TELEFONO_1</th>
                                                <th scope="col">TELEFONO_2</th>
                                                <th scope="col">PROPIETARIO</th>
                                                <th scope="col">COD_ORIGEN</th>
                                                <th scope="col">COD_ESTADO</th>
                                                <th scope="col">DESCRIPCION</th>
                                                <th scope="col">ESTADO</th>
                                                <th scope="col">EDITAR</th>
                                                <th scope="col">ELIMINAR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($query)): ?>
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
                                                    <td>
                                                        <?= $row['estado_cont'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="admin_editar.php?id_contacto=<?= $row['id_contacto'] ?>"
                                                            class="btn btn-primary">Editar</a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger" onclick="confirmarEliminar(<?= $row['id_contacto'] ?>)">Eliminar</a>
                                                    </td>

                                                    <script>
                                                        function confirmarEliminar(id_contacto) {
                                                        //muestra mensaje
                                                            var confirmacion = confirm("Esta seguro que desea eliminar este Usuario");

                                                            //si le da confirmar hace la eliminacion
                                                            if (confirmacion) {
                                                                window.location.href = "admin_eliminar.php?id_contacto=" + id_contacto;
                                                            } else {
                                                                // cuando le de cancelar no hace la eliminacion
                                                                return false;
                                                            }
                                                        }
                                                    </script>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>



</body>

</html>