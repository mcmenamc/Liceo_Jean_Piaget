<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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
                    <img src="assets/img/Logo.png" width="100px" height="60px">
                </i>
            </div>

            <div class="list-group list-group-flush my-3">
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Inicio") ?>" id="inicio" class="list-group-item list-group-item-action bg-transparent second-text">
                    <i class="fas fa-home me-2"></i>Inicio
                </a>
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Tareas") ?>" id="tareas" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-tasks me-2"></i>Tareas
                </a>
                <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Asistencias") ?>" id="asis" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user-check me-2"></i>Asistencias
                </a>

                <!-- <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Horarios") ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-map-marker-alt me-2"></i>Horarios de los Docentes
                </a> -->
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
                    <h2 class="fs-2 m-0">Inicio Alumno</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item-dropdown">
                            <!-- <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-cog me-2"></i><span>Bienvenido <?php echo ($Datos["nombre"]); ?></span>
                            </a> -->
                            <a href="" data-bs-toggle="modal" data-bs-target="#perfil" class="userAlum">
                                <i class="fas fa-user-cog me-2"></i><span>Bienvenido <?php echo ($Datos["nombre"]); ?></span>
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
                include_once("models/alumno.php");
                $_SESSION["tools"] = $_GET["tools"];

                $Materias = Alumno::Materias($Datos["idgrado"]);

                if ($_GET["tools"] == "Inicio") {
                    include_once("resource/layout/alumno/inicio.php");
                    echo "
                        <script>
                            document.getElementById('inicio').classList.add('active');
                        </script>
                    ";
                } elseif ($_GET["tools"] == "Tareas") {
                    include_once("resource/layout/alumno/tareas.php");
                    echo "
                    <script>
                        document.getElementById('tareas').classList.add('active');
                    </script>
                    ";
                } elseif ($_GET["tools"] == "Asistencias") {
                    include_once("resource/layout/alumno/asistencias.php");
                    echo "
                    <script>
                        document.getElementById('asis').classList.add('active');
                    </script>
                    ";
                } elseif ($_GET["tools"] == "Horarios") {
                    include_once("resource/layout/alumno/horarios.php");
                } else {
                    echo '<script>window.location.replace("http://localhost/liceo_piaget/404")</script>';
                }
            } else {
                echo '<script>window.location.replace("http://localhost/liceo_piaget/404")</script>';
            }
            ?>


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
                                    <input type="text" disabled class="form-control" value="<?php echo ($Datos["matricula"]); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" name="Nombre" class="form-control" value="<?php echo ($Datos["nombre"]); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                                    <input type="text" name="Paterno" class="form-control" value="<?php echo ($Datos["paterno"]); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                                    <input type="text" name="Materno" class="form-control" value="<?php echo ($Datos["materno"]); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" disabled class="col-form-label">Correo:</label>
                                    <input type="text" disabled class="form-control" value="<?php echo ($Datos["correo"]); ?>">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="checkbox" type="checkbox" id="checkbox1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Cambiar Escolaridad y Grado
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Escolaridad:</label>
                                    <!-- <input type="text" name="escolaridad" class="form-control" value="<?php echo ($Datos["escolaridad"]) ?>"> -->

                                    <select class="form-select" id="esco" name="escolaridad" class="form-control">
                                        <option value="<?php echo ($Datos["idescolaridad"]) ?>" selected><?php echo ($Datos["escolaridad"]) ?></option>
                                    </select>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option value="0" selected>Selecione escolaridad</option>
                                        <option value="1" selected>Preescolar</option>
                                        <option value="2">Primaria</option>
                                        <option value="3">Secundaria</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" disabled class="col-form-label">Grado:</label>
                                    <select name="idgrado" id="grad" class="form-control">
                                        <option value="<?php echo ($Datos["idgrado"]) ?>"><?php echo ($Datos["grados"]) ?></option>
                                    </select>
                                    <div id="inputGroupSelect0444"></div>
                                </div>

                                <button type="submit" class="btn btn-primary" name="UpdatePerfil">Actualizar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="fotoUpdateNull(); returnDivImage()">Cerrar</button>
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
            <script src="js/consultas.js"></script>
            <script src="js/buttonPDFInprint.js"></script>
            <script src="js/registro.js"></script>
            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function() {
                    el.classList.toggle("toggled");
                }
                $("#checkbox1").prop('checked', true);
                $("#checkbox1").val(true);

                $("#inputGroupSelect01").hide();
                $("#inputGroupSelect0444").hide();




                $("#checkbox1").change(function() {
                    if ($('#checkbox1').is(":checked")) {
                        $("#esco").show();
                        $("#grad").show();
                        $("#inputGroupSelect01").hide();
                        $("#inputGroupSelect0444").hide();

                    } else {
                        $("#esco").hide();
                        $("#grad").hide();
                        $("#inputGroupSelect01").show();
                        $("#inputGroupSelect0444").show();
                    }
                });
            </script>



</body>

</html>

<?php

if (isset($_SESSION["error2"])) {
    echo "<script>" . $_SESSION["error2"] . "</script>";
    unset($_SESSION["error2"]);
}
?>