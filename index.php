<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo de la página-->
    <title>Liceo Jean Piaget</title>
    <!-- Bootstrap CSS -->
    <!-- icono de la paginma -->
    <link rel="shortcut icon" href="assets/img/LogoB.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Librerías de iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Animaciones-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!--Estilos propios-->
    <link rel="stylesheet" href="css/ownStyles.css">
    <link rel="stylesheet" href="css/responsiveStyle.css">
    

</head>
<body>
    <!--El encabezado-->
    <header>
        <!--nav de informes-->
        <nav class="navbar navbar-expand-lg d-lg-block d-md-block pt-md-2 top">
            <div class="container">
                <!--Nav items[left]-->
                <ul class="navbar-nav"> 
                    <li class="nav-item">
                        <a href="Liceo Jean Piaget.html" class="nav-link">
                            <i class="fas fa-clock"></i>
                            Abierto de: Lunes - Viernes | 7:00 AM - 3:00 PM
                        </a>
                    </li>
                </ul>

                <div class="m-lg-auto"></div>


                <!--Nav items[Right]-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="tel:+52 222 231 1777" class="nav-link">
                            <i class="fas fa-phone-alt"></i>
                            222 231 1777
                        </a>
                    </li>
                    <li class="navbar-nav">
                        <a href="https://mail.google.com/mail/u/0/?fs=1&to=liceojeanpiaget@gmail.com&tf=cm" class="nav-link">
                            <i class="fas fa-envelope"></i>
                            liceojeanpiaget@gmail.com
                        </a>
                    </li>
                </ul>

                <!--Navbar Icons-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/LiceoJeanPiagetMx" class="nav-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.instagram.com/liceojeanpiaget/?hl=es&fbclid=IwAR0gXysttCwiILAh8xRIEVWNTHFi9bQmbjJ6Xx_2zpSLFzcbnflsKEfqdjU"
                            class="nav-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--Navegación principal-->
        <nav class="navbar navbar-expand-lg navigation-wrap">
            <div class="container">
                <a class="navbar-brand" href="index">
                    <img src="assets/img/Logo.png" alt="Liceo Jean Piaget" width="64" height="46">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon top-bar"></span>
                    <span class="toggler-icon middle-bar"></span>
                    <span class="toggler-icon bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center" data-aos="fade-left">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Mission">
                                Misión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Vision">
                                Visión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Galeria">
                                Galeria
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">
                                Iniciar Sesion
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registro">
                                Registrarse
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#COVID19" style="color: red;">
                                COVID-19
                            </a>
                        </li>
                    </ul>
                </div>                
            </div>
        </nav>       
    </header>
    <section id="home">        
        <div class="top-wrapper img-fluid">
            <!--<img src="assets/img/AulaRender.jpg" class="img-fluid" alt="aula">-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 left-wrapper">
                        <h5 class="py-4 titulo" data-aos="fade-down" data-aos-delay="800">Liceo Jean Piaget</h5>
                        <h1 data-aos="zoom-in" data-aos-delay="800">Descubre las <span>maravillas</span> de está institución.</h1>
                        <p data-aos="fade-up-right" data-aos-delay="800">El regreso a una nueva aventura nos espera para este nuevo ciclo escoclar 2021-2022</p>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section id="Mission">
        <div class="wrapper mission">
            <div class="container">
                <div class="row">
                    <div class="mission-img col-lg-6 col-md-12 left-wrapper">
                        <div class="about-img position-relative" data-aos="zoom-in" data-aos-delay="800">
                            <img src="./assets/img/Collage2.png" alt="mission" class="img-fluid rounded mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 pt-md-5 right-wrapper">
                        <div data-aos="zoom-in" data-aos-delay="800">
                            <h5>Misión</h5>
                                <h2>La misión de nuestra institución</h2>
                                <p class="Mic" style="font-size: 1.5rem; color:black; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align:justify">Liceo Jean Piaget es una institución conformada por una comunidad educativa comprometida para el desarrollo integral de las competencias de los alumnos de nivel secundaria potenciando, creando y motivando el desenvolvimiento social logrando que el alumno se inserte en un contexto socio – cultural y tecnológico en constante cambio, sin perder de vista la calidad moral que le permita convivir de forma armónica con el medio que le rodea. </p>
                        </div>                        
                    </div>
                </div>                
            </div>            
        </div>
    </section>
    <div class="clearfix"></div>

    <section id="Vision">
        <div class="wrapper vision">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 pt-md-5 right-wrapper">
                        <div data-aos="zoom-in" data-aos-delay="800">
                            <h5>Vision</h5>
                                <h2>La vision de nuestra institución</h2>
                                <p class="Mic" style="font-size: 1.5rem; color:black; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align:justify">Es ser un equipo de trabajo para los niveles de preescolar, primaria y secundaria que egresa alumnos competentes, tanto la calidad moral como la educativa. Mejoramos la calidad de la enseñanza, optimizando los recursos y el medio donde se desenvuelven los alumnos, ya que los principios son la base de la atención a la diversidad y equidad. </p>
                        </div>                        
                    </div> 
                    <div class="vision-img col-lg-6 col-md-12 left-wrapper">
                        <div class="about-img position-relative" data-aos="zoom-in" data-aos-delay="800">
                            <img src="./assets/img/Collage3.png" alt="mission" class="img-fluid rounded mx-auto d-block">
                        </div>
                    </div>                    
                </div>                
            </div>            
        </div>
    </section>
    <div class="clearfix"></div>
    <section id="Galeria">
        <div class="wrapper galeria">
            <div class="container">
                <div class="heading text-center">
                    <h5>Galeria</h5>
                    <p>Lo mejor de la escuela</p>
                </div>
                <div class="galeria-cards">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card bg-transparent" data-aos="zoom-in" data-aos-delay="800">
                                    <div class="card-image">
                                        <a href="#"><img src="assets/img/afiche.jpg" class="img-fluid"></a>
                                    </div>
                                    <div class="content">
                                        <h4>Los valores forman parte de nuestra educación</h4>
                                        <p class="card-description" style="color: black; font-size: 1.5rem; text-align:justify">El respeto es parte fundamental de nuestro entorno social. Ya que podemos lograr una buena relación para los alumnos en un espacio integrado.</p>
                                    </div>
                                </div>                                
                            </div>     
                            
                            <div class="col-md-6 col-lg-4">
                                <div class="card bg-transparent" data-aos="fade-down" data-aos-delay="800">
                                    <div class="card-image">
                                        <a href="#"><img src="assets/img/maestroGOMEZ.jpg" class="img-fluid"></a>
                                    </div>
                                    <div class="content">
                                        <h4>Elementos visuales al alcance de los niños</h4>
                                        <p class="card-description"  style="color: black; font-size: 1.5rem;text-align:justify">Ahora en este regreso a clases, todas las aulas contarán con los protocolos de seguridad para un regreso a clases seguro y saludable, tanto para docentes como para alumnos.</p>                                
                                    </div>
                                </div>                                
                            </div>

                            <div class="col-md-6 col-lg-4 bg-transparent">
                                <div class="card bg-transparent" data-aos="zoom-in" data-aos-delay="800">
                                    <div class="card-image">
                                        <a href="#"><img src="assets/img/abeja.jpg" class="img-fluid"></a>
                                    </div>
                                    <div class="content">
                                        <h4>Clases a distancia con la mejor calidad de imágen</h4>
                                        <p class="card-description"  style="color: black; font-size: 1.5rem;text-align:justify">Nuestro propósito es recrear un ambiente para los niños, donde puedan explayarse y expresar sus emociones, así como su creatividad y llevarla fuera de los limites.</p>                                
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
     <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #0a4275;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        <section class="">
            <p class="d-flex justify-content-center align-items-center">
            <span class="me-3">Liceo Jean Piaget</span>
            <a href="login" class="btn btn-outline-light btn-rounded">
                ¡Inicia Sesión!
            </a>
            </p>
        </section>
        <!-- Section: CTA -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        ©️ 2021 Copyright:
        <a class="text-white" href="#">liceoJeanPiaget.com.mx</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!--animation JS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script  src="js/navbar.js"></script>
</body>
</html>