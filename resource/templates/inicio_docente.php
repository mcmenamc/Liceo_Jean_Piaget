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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Importar Scripts para los iconos desde fontawesome-->
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <link rel="stylesheet" href="css/botones.css">
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
                <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Inicio") ?>" id="inicio" class="list-group-item list-group-item-action bg-transparent second-text">
                    <i class="fas fa-home me-2"></i>Inicio
                </a>
                <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Asignar_Tarea") ?>" id="asig_tare" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-plus me-2"></i>Asignar Tarea
                </a>
                <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Revisar_Tarea") ?>" id="revi_tare" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user-check me-2"></i>Revisar tarea
                </a>
                <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Nueva_Materia") ?>" id="new_tare" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-book-medical me-2"></i>Nueva Materia
                </a>
                <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Asistencia") ?>" id="asis" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-user-check me-2"></i>Asistencia
                </a>
                <a href="models/salir.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                </a>
            </div>
        </div>
        <!--Sidebar ends here-->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Inicio Docente</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-user-cog"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item-dropdown">
                            <!-- <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><span><?php echo ($Datos["nombre"] . " " . $Datos["paterno"] . " " . $Datos["materno"]); ?></span>

                            </a> -->
                            <a href="" data-bs-toggle="modal" data-bs-target="#perfil" class="userDoce">
                                <i class="fas fa-user me-2"></i><span><?php echo ($Datos["nombre"] . " " . $Datos["paterno"] . " " . $Datos["materno"]); ?></span>
                            </a>

                            <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#perfil">
                                        perfil
                                    </button>
                                </li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="">Logout</a></li>

                            </ul> -->
                            
                        </li>
                    </ul>
                </div>
            </nav>


           <?php
            if (isset($_GET["matricula"], $_GET["tools"])) {
                $_SESSION["tools"] = $_GET["tools"];
                include_once("models/usuarios.php");
                $Escolaridad = usuario::Escolaridad();
                
                if ($_GET["tools"] == "Inicio") {                    
                    include_once("resource/layout/docente/inicio.php");
                    echo "
                        <script>
                            document.getElementById('inicio').classList.add('active');
                        </script>
                    ";
                }
                elseif($_GET["tools"] == "Asignar_Tarea"){
                   include_once("resource/layout/docente/asignar_tarea.php");
                   echo "
                        <script>
                            document.getElementById('asig_tare').classList.add('active');
                        </script>
                    ";                    
                }elseif($_GET["tools"] == "Revisar_Tarea"){
                    include_once("resource/layout/docente/revisar_tarea.php");
                    echo "
                        <script>
                            document.getElementById('revi_tare').classList.add('active');
                        </script>
                    ";
                }
                elseif($_GET["tools"] == "Nueva_Materia"){
                    include_once("resource/layout/docente/nueva_materia.php");
                    echo "
                        <script>
                            document.getElementById('new_tare').classList.add('active');
                        </script>
                    ";
                }
                elseif($_GET["tools"] == "Asistencia"){
                    include_once("resource/layout/docente/asistencia.php");
                    echo "
                        <script>
                            document.getElementById('asis').classList.add('active');
                        </script>
                    ";
                }
                else {
                    echo '<script>window.location.replace("http://localhost/principal/404")</script>';
                }
            } else {
                echo '<script>window.location.replace("http://localhost/principal/404")</script>';
            }
            ?>
    <div class="modal fade" id="perfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog alert-primary">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title " id="staticBackdropLabel">Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="fotoUpdateNull(); returnDivImage()"></button>
                </div>

                <div class="modal-body ">
                    <form action="models/validar.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <center>
                            <img  src="data:imagen/*;base64,<?php echo base64_encode(($Datos["foto"])); ?>" width="45%"  class="" id="fotoPerfil">
                            <div id="imagePreview"></div>
                            </center>
                        </div>
                        <div class="mb-3">
                            <input type="file" require accept=".jpg, .jpeg, .png" name="Foto" id="file" onclick="foto_charge()" onchange="return fileValidation()">

                        </div>
                        <div class="mb-3">

                            <label for="recipient-name" class="col-form-label">Matricula:</label>
                            <input type="text"  disabled class="form-control" value="<?php echo ($Datos["matricula"]); ?>" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" require name="Nombre" class="form-control" value="<?php echo ($Datos["nombre"]); ?>" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                            <input type="text" require name="Paterno" class="form-control" value="<?php echo ($Datos["paterno"]); ?>" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                            <input type="text" require name="Materno" class="form-control" value="<?php echo ($Datos["materno"]); ?>" id="recipient-name">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" disabled class="col-form-label">Correo:</label>
                            <input type="text" require disabled class="form-control" value="<?php echo ($Datos["correo"]); ?>" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" disabled class="col-form-label">Hora de Entrada:</label>
                            <input type="time" require name="Entrada" class="form-control" value="<?php echo ($Datos["entrada"]) ?>" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" disabled class="col-form-label">Horarios de atención:</label>
                            <input type="text" require name="Dias" class="form-control" value="<?php echo ($Datos["dias"]) ?>" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" disabled class="col-form-label">Horarios de Salida:</label>
                            <input type="time" require name="Salida" class="form-control" value="<?php echo ($Datos["salida"]) ?>" id="recipient-name">
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
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        }
    </script>
    <script src="js/consultas.js"></script>
    <script src="js/eventosDocentes.js"></script>
</body>

</html>
<?php

if(isset($_SESSION["error2"])){
    echo "<script>".$_SESSION["error2"]."</script>";
    unset($_SESSION["error2"]);
}
?>