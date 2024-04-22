<?php

include ("conexion.php");
// verifica si se paso el id por la URL
if (!isset($_GET['id_contacto']) || empty($_GET['id_contacto'])) {
    echo "ID de usuario no proporcionado.";
    exit;
}

// Obtener el ID del usuario de la URL
$id = $_GET['id_contacto'];



// Realizar consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM tbl_contacto WHERE id_contacto='$id'";
$query = mysqli_query($conexion, $sql);

// Verificar si se encontraron resultados
if (!$query || mysqli_num_rows($query) === 0) {
    echo "No se encontró el usuario.";
    exit;
}

// Obtener los datos del usuario
$row = mysqli_fetch_assoc($query);


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
                    ajustes
                </div>

            </nav>
        </div>

        <!-- principal -->
        <div id="layoutSidenav_content">
            <main>

                <div class="container mt-5">
                    <div class="card-body">
                        <h1 class="text-center mb-4" style="color: black;">DATOS DEL USUARIO</h1>
                        <div class="row justify-content-center">
                            <div class="col-lg-16">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="admin_usuario_editar_activador.php" method="POST">
                                            <input type="hidden" name="id_contacto"
                                                value="<?= ($row['id_contacto']) ?>">
                                            <div class="container text-center">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="nombre_cont" class="form-label"
                                                            style="color: black;">Nombre:</label>
                                                        <input type="text" class="form-control" name="nombre_cont"
                                                            placeholder="Nombre" value="<?= $row['nombre_cont'] ?>">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="apellido_cont" class="form-label"
                                                            style="color: black;">Apellido:</label>
                                                        <input type="text" class="form-control" name="apellido_cont"
                                                            placeholder="apellido_cont"
                                                            value="<?= $row['apellido_cont'] ?>">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="cod_car_1" class="form-label"
                                                            style="color: black;">CARRERAS 1:</label>
                                                        <?php
                                                        $sqli = "SELECT * FROM carrera_1";
                                                        $resultado = mysqli_query($conexion, $sqli);
                                                        // Obtener la carrera actual 
                                                        $carrera_actual = $row['cod_car_1']; // Obtener la carrera actual del usuario
                                                        
                                                        ?>
                                                        <select name="cod_car_1" class="form-select">
                                                            
                                                            <option disabled value="">SELECCIONA UNA CARRERA</option>
                                                          
                                                            <?php while ($rows = mysqli_fetch_assoc($resultado)): ?>
                                                            
                                                                <?php if ($carrera_actual == $rows['id_car']): ?>
                                                                
                                                                    <option value="<?= $rows['id_car'] ?>" selected>
                                                                        <?= $rows['nombre_car'] ?>
                                                                    </option>
                                                                <?php else: ?>
                                                                    <!-- Si no coincide, agregar la opción normalmente -->
                                                                    <option value="<?= $rows['id_car'] ?>">
                                                                        <?= $rows['nombre_car'] ?>
                                                                    </option>
                                                                <?php endif; ?>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="cod_car_2" class="form-label"
                                                            style="color: black;">CARRERAS 2:</label>
                                                        <select name="cod_car_2" class="form-select">
                                                            <option disabled value="">SELECCIONA UNA CARRERA</option>
                                                            <option value="borrar" <?= ($row['cod_car_2'] == "borrar") ? "selected" : "" ?>>Borrar Segunda Carrera</option>
                                                            <?php
                                                            $sqli = "SELECT * FROM carrera_1";
                                                            $resultado = mysqli_query($conexion, $sqli);
                                                            while ($rows = mysqli_fetch_assoc($resultado)):
                                                                $selected = ($row['cod_car_2'] == $rows['id_car']) ? "selected" : "";
                                                                ?>
                                                                <option value="<?= $rows['id_car'] ?>" <?= $selected ?>>
                                                                    <?= $rows['nombre_car'] ?></option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>


                                                    <div class="col-4">

                                                        <label for="telefono_1" class="form-label"
                                                            style="color: black;">Telefono_1:</label>
                                                        <input type="text" class="form-control" name="telefono_1"
                                                            placeholder="telefono_1" value="<?= $row['telefono_1'] ?>">

                                                    </div>
                                                    <div class="col-4">

                                                        <label for="telefono_2" class="form-label"
                                                            style="color: black;">Telefono_2:</label>
                                                        <input type="text" class="form-control" name="telefono_2"
                                                            placeholder="telefono_2" value="<?= $row['telefono_2'] ?>">

                                                    </div>
                                                    <div class="col-4">

                                                        <label for="propietario_cont" class="form-label"
                                                            style="color: black;">Propietario:</label>
                                                        <input type="text" class="form-control" name="propietario_cont"
                                                            placeholder="propietario_cont"
                                                            value="<?= $row['propietario_cont'] ?>">

                                                    </div>
                                                    <div class="col-4">

                                                        <label for="cod_origen_dto" class="form-label"
                                                            style="color: black;">COD_ORIGEN_PAIS:</label>
                                                        <input type="text" class="form-control" name="cod_origen_dato"
                                                            placeholder="cod_origen_dato"
                                                            value="<?= $row['cod_origen_dato'] ?>">

                                                    </div>
                                                    <div class="col-4">

                                                        <label for="cod_estado_cont" class="form-label"
                                                            style="color: black;">COD_CIVIL:</label>
                                                        <input type="text" class="form-control" name="cod_estado_cont"
                                                            placeholder="cod_estado_cont"
                                                            value="<?= $row['cod_estado_cont'] ?>">

                                                    </div>
                                                    <div class="col-4">

                                                        <label for="descripcion_cont" class="form-label"
                                                            style="color: black;">Descripcion:</label>
                                                        <input type="text" class="form-control" name="descripcion_cont"
                                                            placeholder="descripcion_cont"
                                                            value="<?= $row['descripcion_cont'] ?>">

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="gap-2">
                                                <input type="submit" class="btn btn-primary col-lg-4" value="Actualizar"
                                                    onclick="return actualizar()">
                                                <a href="admin_usuario.php" class="btn btn-secondary col-lg-4 mt-4">Salir</a>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function actualizar() {
            var continuar = confirm("Esta Seguro De Modificar los Datos");

            return continuar;
        }
    </script>
</body>

</html>