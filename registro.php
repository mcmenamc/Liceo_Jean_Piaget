<!doctype html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="assets/img/LogoB.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!--CSS-->
    <link rel=stylesheet href="css/style_login.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&display=swap" rel="stylesheet">
    <!--CSS VALIDACION-->
    <link rel="stylesheet" href="css/estiloValidacion.css">
    <!---jquery ----->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--SweetAlert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Importar Scripts para los iconos desde fontawesome-->
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>

    <style type="text/css">
        #regiration_form fieldset:not(:first-of-type) {
            display: none;
        }

        #alumno_form,
        #docente_form,
        #admin_form {
            display: none;
        }
    </style>

    <title>Registro</title>
</head>

<body>
    <!--navbar-->
    <div class="container">
        <!--Indico que el navbar debe ser blanco-->
        <nav class="navbar navbar-expand-md navbar-light">
            <!---->
            <a href="index" class="navbar-brand">
                <img src="assets/img/Logo.png" alt="Lice Jean Piaget" width="54" height="36" class="d-inline-block align-top">
                Liceo Jean Piaget
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="toggleMobileMenu">
                <!--Estableces los colores del navbar-->
                <ul class="navbar-nav ms-auto text-center">
                    <li>
                        <a class="nav-link fas fa-home" href="index"></a>
                    </li>                    
                </ul>
            </div>
        </nav>

        <div class="clearfix">

        </div>
        <!--Formulario del login-->
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-4 col-md-4 col-lg-4  bg-white rounded p-4 shadow">
                <div class="row justify-content-center mb-4">
                    <img src="assets/img/Logo.png" class="w-50">
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <form id="regiration_form" class="form-floating" novalidate enctype="multipart/form-data" method="post">
                    <fieldset id="field_1">
                        <h5>Paso 1: Crear su cuenta</h5>

                        <div class="form-floating mb-4" id="grupo__matricula">
                            <div class="formulario__grupo-input">
                                <input type="email" class="form-control" name="Correo" placeholder="ejemplo@example.com" id="email">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                <label for="floatingInput">Correo Electronico</label>
                            </div>
                            <p class="formulario__input-error">La matricula tiene que ser validado mediante un correo electrónico</p>
                        </div>
                        <div class="form-floating mb-4" id="grupo__contrasena">
                            <div class="formulario__grupo-input">
                                <input type="password" name="Contrasena" class="form-control" id="password" placeholder="Password">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                            <p class="formulario__input-error">La contraseña tiene que ser entre 6 caracteres y 13 caracteres</p>
                        </div>


                        <input type="button" class="next btn  btn-primary" value="Siguiente" id="btn_sigu1" onclick="btn_dissable2()" />
                    </fieldset>
                    <fieldset id="field_2">
                        <h5> Paso 2: Agregar detalles personales</h5>
                        <div class="form-floating mb-4" id="grupo__nombre">
                            <div class="formulario__grupo-input">
                                <input type="text" name="Nombre" class="form-control" placeholder="nombre" id="nombre">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                <label for="floatingInput">Nombre</label>
                            </div>
                            <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y solo puede contener letras Mayusculas como munusculas</p>
                        </div>
                        <div class="form-floating mb-4" id="grupo__paterno">
                            <div class="formulario__grupo-input">
                                <input type="text" name="Paterno" class="form-control" placeholder="Apellido Paterno" id="paterno">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                <label for="floatingPassword">Apellido Paterno</label>
                            </div>
                            <p class="formulario__input-error">El apellido materno tiene que ser de 4 a 16 dígitos y solo puede contener letras Mayusculas como minusculas</p>
                        </div>
                        <div class="form-floating mb-4" id="grupo__materno">
                            <div class="formulario__grupo-input">
                                <input type="text" name="Materno" class="form-control" placeholder="Apellido Materno" id="materno">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                                <label for="floatingPassword">Apellido Materno</label>
                            </div>
                            <p class="formulario__input-error">El apellido paterno tiene que ser de 4 a 16 dígitos y solo puede contener letras Mayusculas como minusculas</p>
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <label class="input-group-text" for="formFileSm">Subir fotografía</label>
                                <input type="file" accept="image/*" onchange="return fileValidation()" name="image" id="file" class="form-control">
                                <div id="imagePreview"></div>
                            </div>
                            <img id="image">
                        </div>
                        <input type="button" name="previous" class="previous btn btn-secondary" value="Atras" />
                        <input type="button" name="next" class="next btn  btn-primary form-control-sm" value="Siguiente" id="btn_sigu2" />
                    </fieldset>

                    <fieldset>
                        <h5>Paso 3: Información de Usuario</h5>
                        <div class="form-group">

                            <div class="form-floating mb-3">
                                <input type="password" name="clave" onchange="validar()" class="form-control" id="clave" placeholder="Clave">
                                <label for="clave">Clave de Seguridad</label>
                            </div>
                        </div>



                        <div id="alumno_form">
                            <div class="form-group mb-3">
                                <h6>Seleccione la Escolaridad y Grado</h6>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Escolaridad</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option value="0" selected >Selecione escolaridad</option>
                                        <option value="1" selected >Preescolar</option>
                                        <option value="2">Primaria</option>
                                        <option value="3">Secundaria</option>
                                    </select>

                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">Grado</label>
                                    <!-- <select class="form-select" id="inputGroupSelect02">
                                        <option selected>Cambiar...</option>
                                        <option value="1">Primero</option>
                                        <option value="2">Segundo</option>
                                        <option value="3">Tercero</option>
                                    </select> -->
                                    <div id="inputGroupSelect0444"></div>
                                </div>
                            </div>

                            <input type="submit" class="submit btn btn-success" value="enviar" id="btnFINAL" />
                        </div>

                        <div id="docente_form">
                            <div class="form-group mb-3">
                                <h6>Datos Del Docente</h6>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect03">Entrada</label>
                                    <input type="time" id="inputGroupSelect03">
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingatencion" value="Lunes - Martes - Miércoles  - Jueves - Viernes" placeholder="lunes - Martes...">
                                <label for="floatingatencion">Dias De Atencion</label>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect04">Salida</label>
                                    <input type="time" id="inputGroupSelect04">
                                </div>
                            </div>

                            <input type="submit" class="submit btn btn-success" value="enviar" id="btnFINAL" />

                        </div>
                        <div id="admin_form">
                            <div class="form-group mb-3">
                                <h6>Administrador</h6>
                            </div>
                            <input type="submit" name="admin" class="submit btn btn-success" value="enviar" id="btnFINAL" />


                        </div>
                        <input type="button" name="previous" class="previous btn btn-secondary" value="Atras"/>

                    </fieldset>
                </form>
                <div id="mensaje"></div>






                <div>
                    <p class="mb-2 text-center">¿Ya tengo una cuenta?<a href="login" class="text-decoration-none"> ¡Iniciar Sesión!</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/validacionRegistro.js"></script>
    <script src="js/registro.js"></script>
    
</body>

</html>