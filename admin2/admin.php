<?php


include ("conexion.php");

// Procesar la búsqueda
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    // Obtener el término de búsqueda y escaparlo para evitar inyección SQL
    $buscar = '%' . mysqli_real_escape_string($conexion, $_GET['buscar']) . '%';
    
    // Preparar la consulta con marcadores de posición
    $sql = "SELECT * FROM user WHERE nombre LIKE ? OR carnet LIKE ? OR correo LIKE ?";
    $stmt = mysqli_prepare($conexion, $sql);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Vincular los parámetros de búsqueda a los marcadores de posición
        mysqli_stmt_bind_param($stmt, "sss", $buscar, $buscar, $buscar);
        
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
    $sql = "SELECT * FROM user WHERE estado = 1";
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
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            /* Cambia el color de fondo aquí */
        }

        .container {
            margin-top: 20px;
            text-align: center;
            color: aliceblue;
        }

        .user-form {
            margin-bottom: 20px;
        }

        .user-form input[type="text"],
        .user-form input[type="submit"] {
            margin: 5px;
            padding: 5px;
            width: 200px;
        }

        .users-table table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }

        .users-table th,
        .users-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .users-table th {
            background-color: #343a40;
            color: #fff;
        }

        .users-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-primary {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">MENU</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto  me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Configuracion</a></li>

                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">juan pablo</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            INICIO
                        </a>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            REGISTROS
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    VERIFICAR USUARIOS
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="Crud/admin.php">admin</a>
                                        <a class="nav-link" href="register.php">Register</a>
                                        <a class="nav-link" href="password.php">Forgot Password</a>
                                    </nav>
                                </div>


                            </nav>
                        </div>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabla
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Setting
                </div>

            </nav>
        </div>
    </div>

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
                                        placeholder="Número de carnet">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="users-table">
            <h1 align="center" style="color: black;">Usuarios Registrados</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Carnet</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>editar</th>
                        <th>eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Aquí deberías tener tu código PHP para mostrar los usuarios.
                    // Asumo que tienes una variable $query con los resultados.
                    while ($row = mysqli_fetch_assoc($query)):
                        ?>
                        <tr>
                            <th>
                                <?= $row['id'] ?>
                            </th>
                            <th>
                                <?= $row['nombre'] ?>
                            </th>
                            <th>
                                <?= $row['carnet'] ?>
                            </th>
                            <th>
                                <?= $row['correo'] ?>
                            </th>
                            <th>
                                <?= $row['contrasena'] ?>
                            </th>
                            <th>
                                <?php
                                if ($row['id_rol'] == 1) {
                                    echo "Administrador";
                                } elseif ($row['id_rol'] == 2) {
                                    echo "Lector";
                                } else {
                                    echo "Rol desconocido";
                                }
                                ?>
                            </th>
                            <th>
                                <?php
                                if ($row['estado'] == 1) {
                                    echo "Activo";
                                } elseif ($row['estado'] == 0) {
                                    echo "Inactivo";
                                } else {
                                    echo "Estado desconocido";
                                }
                                ?>
                            </th>
                            <th><a href="admin_actualizar.php?id=<?= $row['id'] ?>" class="user-table--edit">Editar</a></th>
                            <th>
                                <form action="admin_eliminar.php" method="post">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" class="user-table--delete">Eliminar</button>
                                </form>
                            </th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
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