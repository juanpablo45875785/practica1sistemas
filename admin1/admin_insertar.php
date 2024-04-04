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
        <div id="layoutSidenav_content">
            <div class="container mt-5">
                <div class="card-body">
                    <h1 class="text-center" style="color: black;">REGISTRO DE USUARIO</h1>
                    <div class="row justify-content-center">
                        <div class="col-lg-16">
                            <div class="card">
                                <form action="admin_insertar_registro.php" method="POST">
                                    <br>
                                    <h2 class="text-center" class="mb-4" style="color: black;">Crear Usuario</h2>

                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label for="nombre_cont" class="form-label"
                                                    style="color: black;">Nombre:</label>
                                                <input type="text" class="form-control" name="nombre_cont"
                                                    placeholder="Nombre">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="apellido_cont" class="form-label"
                                                    style="color: black;">Apellido:</label>
                                                <input type="text" class="form-control" name="apellido_cont"
                                                    placeholder="apellido">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="cod_car_1" class="form-label" style="color: black;">Codigo
                                                    1:</label>
                                                <input type="text" class="form-control" name="cod_car_1"
                                                    placeholder="codigo 1">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="cod_car_2" class="form-label" style="color: black;">Codigo
                                                    2:</label>
                                                <input type="text" class="form-control" name="cod_car_2"
                                                    placeholder="codigo 2">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="telefono_1" class="form-label"
                                                    style="color: black;">Telefono
                                                    1:</label>
                                                <input type="text" class="form-control" name="telefono_1"
                                                    placeholder="telefono 1">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="telefono_2" class="form-label"
                                                    style="color: black;">Telefono
                                                    2:</label>
                                                <input type="text" class="form-control" name="telefono_2"
                                                    placeholder="telefono 2">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="propietario_cont" class="form-label"
                                                    style="color: black;">Propietario:</label>
                                                <input type="text" class="form-control" name="propietario_cont"
                                                    placeholder="propietario">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="cod_origen_dto" class="form-label"
                                                    style="color: black;">Origen:</label>
                                                <input type="text" class="form-control" name="cod_origen_dato"
                                                    placeholder="origen">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="cod_estado_cont" class="form-label"
                                                    style="color: black;">Codigo_estado:</label>
                                                <input type="text" class="form-control" name="cod_estado_cont"
                                                    placeholder="estado">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="descripcion_cont" class="form-label"
                                                    style="color: black;">Descripcion:</label>
                                                <input type="text" class="form-control" name="descripcion_cont"
                                                    placeholder="descripcion">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="estado_cont" class="form-label"
                                                    style="color: black;">Estado:</label>
                                                <input type="text" class="form-control" name="estado_cont"
                                                    placeholder="estado">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Insertar Usuario</button>
                                        <a href="index.php" class="btn btn-secondary">Salir</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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