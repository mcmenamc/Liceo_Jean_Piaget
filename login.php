<?php
session_start();
if(isset($_SESSION["matricula"])&& isset($_SESSION["id_tipo"])&& isset($_SESSION["correo"]) ){
        $_SESSION["error2"] = "
        Swal.fire({
            title: '¡No olvides Cerrar Sesión!',
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            }
          })";
        header("location: inicio?matricula=".$_SESSION['matricula']."&tools=Inicio");// si hay una session abierta lo mandamos a la plataforma
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <link rel="shortcut icon" href="assets/img/LogoB.png">
    <!--CSS-->
    <link rel=stylesheet href="css/style_login.css">
    <!--CSS VALIDACION-->
    <link rel="stylesheet" href="css/estiloValidacion.css">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&display=swap" rel="stylesheet">
    <!---->
    
    <!--Importar Scripts para los iconos desde fontawesome-->
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>   

    <title>Iniciar sesion</title>
</head>
    <body>
        <!--navbar-->
        <div class="container">
            <!--Indico que el navbar debe ser blanco-->
            <nav class="navbar navbar-expand-md navbar-light">
                <!---->
                <a href="index" class="navbar-brand">
                    <img src="assets/img/Logo.png" alt="Lice Jean Piaget" width="54" height="36"
                    class="d-inline-block align-top">
                    Liceo Jean Piaget
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#toggleMobileMenu"
                    aria-controls="toggleMobileMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >        
                <span class="navbar-toggler-icon">
                </span>        
                </button>
                <div class="collapse navbar-collapse" id="toggleMobileMenu">
                    <!--Estableces los colores del navbar-->
                    <ul class="navbar-nav ms-auto text-center">
                        <li>
                            <a class="nav-link fas fa-home " href="index"></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--Formulario del login-->
            <div class="cent">
                <div class="col-sm-8 col-md-6 col-lg-4 bg-white rounded p-4 shadow">
                    <div class="row justify-content-center mb-4">
                        <img src="assets/img/Logo.png" class="w-25">
                    </div>
                    <form class="form-floating" action="models/validar.php" method="POST" id="formuBAS">
                        <div class="mb-4 form-floating" id="grupo__matricula">
                            <div class="formulario__grupo-input">
                                <label for="" class="form-label">Correo Electronico</label>
                                <input type="text" required value="<?php if(isset($_SESSION["Matricula"])){ echo $_SESSION["Matricula"]; }  ?>" name="Matricula" class="form-control formulario__input" id="email" aria-describedby="MatriculaHelp" placeholder="usuer@mail.com">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>                            
                            <p class="formulario__input-error">La matricula tiene que ser validado mediante un correo electrónico</p>
                        </div>
                        <div class="mb-4 form-floating" id="grupo__contrasena">
                            <div class="formulario__grupo-input">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" required name="Contrasena" class="form-control formulario__input" id="password" aria-describedby="passwordHelp" placeholder="123456">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La contraseña tiene que ser entre 6 caracteres y 13 caracteres</p>                            
                        </div>
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Recordar cuenta</label>
                        </div>
                        <button type="submit" name="Login" class="btn btn-success w-100" id="acceder">Acceder</button>
                    </form>
                    <p class="mb-0 text-center">¿No te has registrado todavía?<a href="registro" class="text-decoration-none"> ¡Registrate aquí!</a></p>
                </div>
            </div>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>   
        <script src="js/validacionLogin.js"></script>        
    </body>
</html>

<?php
if(isset($_SESSION["error"])){
    echo "<script>".$_SESSION["error"]."</script>";
    unset($_SESSION["error"]);
    
}
