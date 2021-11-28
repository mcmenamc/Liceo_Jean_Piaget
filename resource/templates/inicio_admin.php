<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="shortcut icon" href="../../assets/img/M&Y.png">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&display=swap" rel="stylesheet">
    <!---->

    <!--Importar Scripts para los iconos desde fontawesome-->
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <title>LICEO JEAN PIAGET</title>

    <link rel="stylesheet" href="css/style_inicio.css">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!--Sidebar starts here-->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="me-2">
                    <img src="assets/img/Logo.png" width="100px">
                </i>
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Inicio") ?>" id="inicio" class="list-group-item list-group-item-action bg-transparent second-text">
                    <i class="fas fa-tachometer-alt me-2"></i>Inicio
                </a>
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Administradores") ?>" id="admin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user-ninja me-2"></i>Administradores
                </a>
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Docentes") ?>" id="doce" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user-tie me-2"></i>Docentes
                </a>
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Alumnos") ?>" id="alumnos" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user-graduate me-2"></i>Alumnos
                </a>
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Database") ?>" id="base" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-compact-disc me-2"></i> Database
                </a>
                <a href="models/salir.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-project-diagram me-2"></i>Cerrar Sesión
                </a>
            </div>
        </div>
        <!--Sidebar ends here-->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item-dropdown">
                            <!-- <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><span> <?php echo ($Datos["nombre"] . " " . $Datos["paterno"] . " " . $Datos["materno"]);   ?></span>
                            </a> -->
                            <a data-bs-toggle="modal" data-bs-target="#perfil" href="" class="nomUser">
                                <i class="fas fa-users-cog me-2"></i><span> <?php echo ($Datos["nombre"] . " " . $Datos["paterno"] . " " . $Datos["materno"]);   ?></span>
                            </a>

                            <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                               
                                <li>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#perfil">
                                        perfil
                                    </button>
                                </li>     

                            </ul> -->
                        </li>
                    </ul>
                </div>
            </nav>

            <?php
            if (isset($_GET["matricula"], $_GET["tools"])) {

                if ($_GET["tools"] == "Inicio") {
                    include_once("resource/layout/admin/inicio.php");
                    echo "
                        <script>
                            document.getElementById('inicio').classList.add('active');
                        </script>
                    ";
                } elseif ($_GET["tools"] == "Administradores") {


                    require_once("resource/layout/admin/admin.php");
                    echo "<script>document.getElementById('admin').classList.add('active');</script>";
                } elseif ($_GET["tools"] == "Docentes") {
                    require_once("resource/layout/admin/docente.php");
                    echo "
                    <script>
                        document.getElementById('doce').classList.add('active');
                    </script>
                    ";
                } elseif ($_GET["tools"] == "Alumnos") {
                    require_once("resource/layout/admin/alumno.php");
                    echo "
                    <script>
                        document.getElementById('alumnos').classList.add('active');
                    </script>
                    ";
                } elseif ($_GET["tools"] == "Database") {
                    require_once("resource/layout/admin/database.php");
                    echo "
                    <script>
                        document.getElementById('base').classList.add('active');
                    </script>
                    ";
                } else {
                    echo '<script>window.location.replace("http://localhost/principal/404")</script>';
                }
            } else {
                echo '<script>window.location.replace("http://localhost/principal/404")</script>';
            }
            ?>
            <?php   ?>



            <div class="modal fade" id="perfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog alert-primary">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title " id="staticBackdropLabel">Perfil</h5>
                            <button type="button" onclick="fotoUpdateNull(); returnDivImage()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body ">
                            <form action="models/validar.php" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <center>
                                        <img src="data:imagen/*;base64,<?php echo base64_encode(($Datos["foto"])); ?>" width="45%" class="" id="fotoPerfil">
                                        <div id="imagePreview"></div>
                                    </center>
                                </div>
                                <div class="mb-3">
                                    <input type="file" require accept=".jpg, .jpeg, .png" name="Foto" id="file" onclick="foto_charge()" onchange="return fileValidation()">


                                </div>
                                <div class="mb-3">

                                    <label for="recipient-name" class="col-form-label">Matricula:</label>
                                    <input type="text" disabled name="Matricula" class="form-control" value="<?php echo ($Datos["matricula"]); ?>" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" name="Nombre" class="form-control" value="<?php echo ($Datos["nombre"]); ?>" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                                    <input type="text" name="Paterno" class="form-control" value="<?php echo ($Datos["paterno"]); ?>" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                                    <input type="text" name="Materno" class="form-control" value="<?php echo ($Datos["materno"]); ?>" id="recipient-name">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Correo:</label>
                                    <input type="text" name="Correo" disabled class="form-control" value="<?php echo ($Datos["correo"]); ?>" id="recipient-name">
                                </div>

                                <button type="submit" class="btn btn-primary" name="UpdatePerfil">Actualizar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="fotoUpdateNull(); returnDivImage()">Cerrar</button>

                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>




            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="js/admin.js"></script>
            <script src="js/registro.js"></script>
            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function() {
                    el.classList.toggle("toggled");
                }
                document.getElementById('inputGroupSelect02').style.display = 'none';
                document.getElementById('inputGroupSelect04445').style.display = 'none';
            </script>


</body>

</html>

<?php

if (isset($_SESSION["error2"])) {
    echo "<script>" . $_SESSION["error2"] . "</script>";
    unset($_SESSION["error2"]);
}
?>