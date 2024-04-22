<?php

include ("conexion.php");
// verifica si se paso el id por la URL
if (!isset($_GET['id_orig']) || empty($_GET['id_orig'])) {
    echo "ID de usuario no proporcionado.";
    exit;
}

// Obtener el ID del usuario de la URL
$id = $_GET['id_orig'];



// Realizar consulta SQL para obtener los datos del usuario
$sql = "SELECT * FROM origen_contacto  WHERE id_orig='$id'";
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
                        <h1 class="text-center mb-4" style="color: black;">DATOS DE LA CARRERA A ACTUALIZAR</h1>
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="admin_origen_editar_activador.php" method="POST">
                                            <input type="hidden" name="id_orig" id="id_orig"
                                                value="<?= ($row['id_orig']) ?>">
                                            <!-- <input type="hidden" name="tipo_funcion" id="tipo_funcion" value="edita_Car"> -->
                                            <div class="container text-center">
                                                <div class="row justify-content-center">
                                                    <div class="col-4">
                                                        <label for="nombre_orig" class="form-label"
                                                            style="color: black;"><h5>Modifica el Nombre de la Carrera:</h5 ></label>
                                                        <input type="text" class="form-control" name="nombre_orig"
                                                            placeholder="Nombre" value="<?= $row['nombre_orig'] ?>">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class=" gap-2 ">
                                                <input type="submit" class="btn btn-primary col-4 " value="Actualizar"
                                                    onclick="return actualizar()">
                                                <?php if ($row['estado_car'] == 0): ?>
                                                    <button type="submit" class="btn btn-success col-4 mt-4"
                                                        name="reactivar">Reactivar</button>
                                                <?php endif; ?>
                                                <a href="admin_origen_tabla.php"
                                                    class="btn btn-secondary col-4 mt-4">Salir</a>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function actualizar() {
            var continuar = confirm("Esta Seguro De Modificar los Datos");
            return continuar;
        }
    </script>
    <!-- <script>
        $("#btn_acualizar_car").click(function(){
            var formData = new FormData();
            formData.append('nombre_car', $("#nombre_car").val());
            formData.append('id_car', $("#id_car").val());
            formData.append('tipo_funcion', 'edita_Car');
            // var datos = $('#datos_ENV').serializeArray();
            console.log(datos)
            $.ajax({
                url: "admin_carrera_editar.php",
                type: "POST",
                contentType: false,
                processData: false,
                data: datos,
                success: function(data_bd) {
                    console.log(data_bd)
                    if (data_bd == 1) {
                        alert("SE ACTAULIZO CORRECTAMENTE")
                    }
                    // $("#resultado_busqueda").html(data_bd);
                    // atrr();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
                complete: function() {
                }
            })
        });
        $('#datos_ENV').submit(function(event) {
        event.preventDefault();
        var data = $(this).serialize();
       console.log(data)
        $.ajax({
            type: 'POST',
            url: "admin_carrera_editar.php",
            data: data,
            success: function(response) {
                // Manejar la respuesta del servidor aquí
                console.log(response);
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    </script> -->
</body>

</html>