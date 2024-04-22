<?php
include "conexion.php";

$sql = "SELECT * FROM carrera_1 WHERE estado_car=1";
$query = mysqli_query($conexion, $sql);
$sql2 = "SELECT * FROM carrera_1 WHERE estado_car=1";
$query2 = mysqli_query($conexion, $sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>REGISTROS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            /* Cambia el color de fondo aquí */
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
                        <div class="sb-sidenav-menu-heading">juan pablo</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            INICIO
                        </a>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Opciones
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
                                        <a class="nav-link" href="login.php">admin</a>
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
        <!-- principal -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-5">
                    <div class="card-body">
                    <nav  class="navbar-dark bg-success text-center">
                        <h1 class="mb-4" style="color: white;">FORMULARIO DE REGISTRO DE USUARIO</h1>
                        </nav>
                        <div class="row justify-content-center">
                            <div class="col-lg-16">
                                <div class="card">
                           
                                    <form  action="admin_usuario_insertar_activador.php" method="POST" >
                                        <h2 class="text-center" class="mb-4" style="color: black;">Crear Usuario</h2>

                                        <div class="container text-center">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="nombre_cont" class="form-label"
                                                        style="color: black;">Nombre:</label>
                                                    <input type="text" class="form-control" name="nombre_cont"
                                                        placeholder="Nombre">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="apellido_cont" class="form-label"
                                                        style="color: black;">Apellido:</label>
                                                    <input type="text" class="form-control" name="apellido_cont"
                                                        placeholder="Apellido">
                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="cod_car_1" class="form-label"
                                                        style="color: black;">CARRERAS
                                                        1:</label>

                                                    <select name="cod_car_1" class="form-select">
                                                        <option selected>SELECCIONA UNA CARRERA</option>
                                                        <?php while ($row = mysqli_fetch_array($query)): ?>
                                                            <option value="<?= $row['id_car'] ?>"><?= $row['nombre_car'] ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>


                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="cod_car_2" class="form-label"
                                                        style="color: black;">CARRERAS
                                                        2:</label>

                                                    <select name="cod_car_2" class="form-select">
                                                        <option selected>SELECCIONA UNA CARRERA</option>
                                                        <?php while ($row = mysqli_fetch_array($query2)): ?>
                                                            <option value="<?= $row['id_car'] ?>"><?= $row['nombre_car'] ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>

                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="telefono_1" class="form-label"
                                                        style="color: black;">Telefono_1:</label>
                                                    <input type="text" class="form-control" name="telefono_1"
                                                        placeholder="Telefono 1">

                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="telefono_2" class="form-label"
                                                        style="color: black;">Telefono_2:</label>
                                                    <input type="text" class="form-control" name="telefono_2"
                                                        placeholder="Telefono 2">

                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="propietario_cont" class="form-label"
                                                        style="color: black;">Propietario:</label>
                                                    <input type="text" class="form-control" name="propietario_cont"
                                                        placeholder="Propietario">

                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="cod_origen_dto" class="form-label"
                                                        style="color: black;">Origen:</label>
                                                    <input type="text" class="form-control" name="cod_origen_dato"
                                                        placeholder="Ciudad">

                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="cod_estado_cont" class="form-label"
                                                        style="color: black;">Codigo_estado:</label>
                                                    <input type="text" class="form-control" name="cod_estado_cont"
                                                        placeholder="Codigo estado">

                                                </div>
                                                <div class="col-lg-4">

                                                    <label for="descripcion_cont" class="form-label"
                                                        style="color: black;">Descripcion:</label>
                                                    <input type="text" class="form-control" name="descripcion_cont"
                                                        placeholder="Descripcion">

                                                </div>

                                            </div>
                                        </div>
                                        <br>
                                        <div  class=" gap-2 text-center" >
                                            <input type="submit" class="btn btn-success col-lg-4" value="REGISTRAR"
                                                onclick="insertar()">
                                            <a href="index.php" class="btn btn-dark col-lg-4">SALIR</a>
                                        </div>
                                    </form>
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
        function insertar() {
            var confirmar = confirm("Confirme el Registro");
            return confirmar;
        }
    </script>
</body>

</html>