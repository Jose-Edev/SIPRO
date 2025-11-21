<?php
require 'php/conexion.php';
$bd = new MySQL();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>SIPRO - Maquinados</title>
    <link rel="icon" href="img/SIPROviñe.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="sipro-maquinados:Somos una empresa especializada en la fabricación y venta de piezas de alta precisión para diversas industrias. Con un equipo altamente calificado.">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styleIma.css">
    <link rel="stylesheet" href="./css/styleCarta.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/CaruselEstatic.css">
    <script src="js/CaruselEstaticCode.js"></script>

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif
        }

        body,
        html {
            height: 100%;
            line-height: 1.8;
            background-image: url('./img/marmol.png');
        }

        body {
            background-color: hsl(0, 0%, 90%);
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .carousel-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.25rem;
            background: rgba(0, 0, 0, 0.5);
            color: white;
        }

        #ima {
            height: 320px;
        }

        .blurred-background {
            position: relative;
            padding: 40px;
            margin-right: -4%;
            margin-left: -20px;
            background-size: cover;
            overflow: hidden;
        }

        .blurred-background::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url('img/trabajo.jpg');
            background-size: cover;
            filter: blur(8px);
            z-index: -1;
        }

        .contentBack {
            position: relative;
            z-index: 1;
        }

        .bgimg-1 {
            background-image: url("img/8.png");
            background-position: center;
            /* Centra la imagen horizontalmente */
            background-size: cover;
            /* Cubre todo el div con la imagen */
            min-height: 100vh;
            /* Usamos 100vh para ocupar el 100% del viewport en altura */
            display: flex;
            justify-content: center;
            /* Centra cualquier contenido dentro del div horizontalmente */
            align-items: center;
            animation: slideBackground 25s infinite linear;
        }

        @keyframes slideBackground {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        .w3-bar .w3-button {
            padding: 16px;
        }

        @media only screen and (max-device-width: 1600px) {
            .bgimg-1 {
                background-attachment: scroll;
                min-height: 450px;
            }
        }


        /* Agrega un efecto de transición para la opacidad */
        .fade-in {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        /* Hace que la imagen aparezca gradualmente al cargar la página */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Aplica la animación de fade-in */
        .fade-in {
            animation: fadeIn 7s ease-in-out forwards;
        }

        .image-effect:hover {
            transform: scale(1.25);
            /* Escala un poco más grande al hacer hover*/
        }

        .slideanim {
            visibility: hidden;
        }

        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }

        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }

            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }

        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }

            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
        }

        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }

            .btn-lg {
                width: 100%;
                margin-bottom: 35px;
            }
        }

        @media screen and (max-width: 480px) {
            .logo {
                font-size: 150px;
            }
        }

        .textoMetal {
            background: linear-gradient(to bottom, grey, rgb(117, 116, 116), black);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: rgba(0, 0, 0, 0.5) 0px 3px 3px;
        }

        .shadow-hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease-in-out;
            opacity: 1;
        }

        .shadow-hover:hover {
            opacity: 0.8;
        }

        .floating-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 90%;
            margin: 0 auto;
        }

        .floating-box {
            width: 100%;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 18px 18px 0px rgb(128, 128, 128);
            background-color: rgba(204, 204, 204);
            border-radius: 10px;
        }

        .img {
            width: 100px;
            height: 100px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 35px;
        }

        .rotate {
            animation: spin 15s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card" id="myNavbar">
            <a href="principal.php" class="w3-bar-item w3-button w3-wide" style="background-color: red; color: white;"> <img src="img/SIPROviñe.png" style="width: 30px; height: 30px; margin-top: -5px;" class="rotate"> SIPRO</a>
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> ACERCA DE</a>
                <a href="Pagina/areas.php" class="w3-bar-item w3-button"><i class="fa fa-cogs"></i> ÁREAS</a>
                <a href="Pagina/trabajos.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> TRABAJOS</a>
                <a href="#contacto" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTÁCTANOS</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!--solo aparece el cerrar en dispositivos moviles-->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Cerrar</a>
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> ACERCA DE</a>
        <a href="Pagina/areas.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-cogs"></i> ÁREAS</a>
        <a href="Pagina/trabajos.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th"></i> TRABAJOS</a>
        <a href="#contacto" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTÁCTANOS</a>
    </nav>

    <!-- Header with full-height image -->
    <div class="bgimg-1 w3-display-container" id="home"></div>

    <div class="progress" style="margin-right: 155px; margin-left: 155px; margin-bottom: 70px; margin-top: 65px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger" style="width: 100%;"></div>
    </div>

    <!-- seccion Acerca de: -->
    <div class="w3-container" style="padding:128px 16px; margin-top: -150px;" id="about">
        <h3 class="w3-center textoMetal" style="font-size: 35px; font-weight: bold;"><img src="img/SIPROviñe.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> ACERCA DE NOSOTROS </h3>
        <p class="w3-center" style="font-size: 30px;">Empresa de maquinados</p>

        <div class="w3-row-padding w3-center w3-margin-top">
            <div class="w3-half">
                <div class="w3-container" style="min-height:auto">
                    <i class="fa fa-bullseye w3-margin-bottom w3-jumbo w3-center"></i>
                    <p style="font-size: 30px;">Misión</p>
                    <p style="font-size: 20px;">Suministrar, fabricar piezas, repuestos y accesorios metalmecánicos de óptima calidad y precisión, para la satisfacción del cliente y una adecuada retribución a nuestra organización .</p>
                </div>
            </div>

            <div class="w3-half">
                <div class="w3-container" style="min-height:auto">
                    <i class="fa fa-eye w3-margin-bottom w3-jumbo w3-center"></i>
                    <p style="font-size: 30px;">Visión</p>
                    <p style="font-size: 20px;">Convertirnos en la mejor opción para nuestros clientes actuales y potenciales para el suministro de sus necesidades en lo referente a la fabricación de elementos metalmecánicos.</p>
                </div>
            </div>
        </div>
        <div class="w3-container" align="center">
            <div class="w3-container" style="min-height:auto">
                <i class="fa fa-balance-scale w3-margin-bottom w3-jumbo"></i>
                <p style="font-size: 30px;">Valores</p>
                <li style="font-size: 20px;">Honestidad</li>
                <li style="font-size: 20px;">Lealtad</li>
                <li style="font-size: 20px;">Orgullo</li>
                <li style="font-size: 20px;">Perseverancia</li>
                <li style="font-size: 20px;">Satisfaccion</li>
                <li style="font-size: 20px;">Trabajo en Equipo</li>
            </div>
        </div>
    </div>

    <div class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 70px; margin-top: -60px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger" style="width: 100%;"></div>
    </div>

    <!-- Promo Section - "We know design" -->
    <div class="floating-container">
        <div class="floating-box">
            <h3 class="w3-center textoMetal" style="font-size: 35px; font-weight: bold;"><img src="img/SIPROviñe.png" style="width: 35px; height: 35px; height: 35px; margin-top: -5px;" class="rotate"> LO QUE HACEMOS</h3>
            <div class="w3-container" style="padding: 2% 16px;">
                <div class="w3-row-padding">
                    <div class="w3-col m6">
                        </h3>
                        <p style="font-size: 25px;">Somos una empresa especializada en la fabricación y venta de piezas de alta precisión para diversas industrias. Con un equipo altamente calificado.</p>
                        <br>
                        <br>
                        <div class="container">
                            <a id="boto" href="Pagina/trabajos.php" style="--color: #cc0000; font-size: 20px;"><span>Nuestros
                                    trabajos</span><i></i></a>
                        </div>
                        <br>
                    </div>
                    <div class="w3-col m6">
                        <img class="w3-image w3-round-large slideanim" src="img/collage (1).png" alt="" width="700" height="394" style="margin-bottom: 20px; margin-top: 20px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 20px; margin-top: 80px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger" style="width: 100%;"></div>
    </div>

    <!-- Seccion de Clientes -->
    <div class="w3-container" style="padding:50px 16px; margin-top: 20px;" id="team">
        <h3 class="w3-center textoMetal" style="font-size: 35px; font-weight: bold;"><img src="img/SIPROviñe.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> NUESTROS CLIENTES</h3>
        <p class="w3-center w3-large">Aquellos con los que hemos trabajado durante mucho tiempo</p>
        <div class="bodyCard">
            <div class="containerCard" style="height: auto;">
                <div class="card__containercard">

                    <?php
                    $bd->primerLinea();
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div id="maquinaria" class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 50px; margin-top: 20px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger" style="width: 100%;"></div>
    </div>

    <!--Seccion de informacion de contacto-->
    <div class="w3-row w3-padding-32 w3-section" style="margin-top:48px" style="padding:128px 16px" id="contacto">
        <h3 class="w3-center textoMetal" style="font-size: 35px; font-weight: bold;"><img src="img/SIPROviñe.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> CONTÁCTANOS</h3>
        <div style="margin-right: 50px;" class="w3-col m4 w3-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1112.912268337572!2d-98.14969518471364!3d19.043652273674542!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc1ac6fa6e0af%3A0xcf973992ccb9843f!2sSipro!5e1!3m2!1ses-419!2smx!4v1715199836001!5m2!1ses-419!2smx" width="100%" height="650px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div style="margin-left: 30px; margin-right: 200px; width: 85%;">
            <p><i class="fa-fw w3-xxlarge w3-margin-right"></i>DIRECCIÓN:</p>
            <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Enrique Rébsamen 1439, Cd Satélite,
                72320 Heroica Puebla de Zaragoza, Pue.</p>
                
            <p><i class="fa-fw w3-xxlarge w3-margin-right"></i>NUMEROS Y CORREOS DE CONTACTO:</p>
            
            <p><i class="fa fa-phone  w3-xxlarge "></i><a style="margin-left: 35px; font-size: 15px;" href="tel:2223670612">Teléfono Oficina: 2223670612</a></p>
            
            <p><i class="fa fa-envelope fa-fw w3-xlarge"></i><a style="margin-left: 35px" href="mailto:oficina@sipro-maquinados.com" >oficina@sipro-maquinados.com</a></p>
            
            <p><i class="fa fa-phone  w3-xxlarge "></i><a style="margin-left: 35px; font-size: 15px;" href="tel:2225697534">Teléfono Producción: 2225697534<a></a></p>
            
           <p><i class="fa fa-envelope fa-fw w3-xlarge"></i><a style="margin-left: 35px" href="mailto:administracion@sipro-maquinados.com" >administracion@sipro-maquinados.com</a></p>
            
             
            <p><i class="fa fa-phone  w3-xxlarge "></i><a style="margin-left: 35px; font-size: 15px;" href="tel:2223465734">Teléfono Proyectos: 2223465734<a></a></p>
            
             <p><i class="fa fa-envelope fa-fw w3-xlarge"></i><a style="margin-left: 35px" href="mailto:ventas@sipro-maquinados.com" >ventas@sipro-maquinados.com</a></p>
            
             
            <p><i class="fa fa-whatsapp w3-xxlarge" style="color: green;"><a style="margin-left: 35px; font-size: 15px;" href="https://wa.me/522225697534">Mensaje
                        Producción: 2225697534</a></i>
            <p></p>
            <p><i class="fa fa-whatsapp w3-xxlarge" style="color: green;"><a style="margin-left: 35px; font-size: 15px;" href="https://wa.me/522223465734">Mensaje
                        Proyectos: 2223465734</a></i>
            <p></p>

        
            <br /><br />
        </div>
    </div>
</body>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 py-4">
    <div align="center" style="margin-top: 20px">
        <a id="boto" href="#home" style="--color: #cc0000; font-size: 20px;"><span>INICIO</span><i></i></a>
    </div>
    <div class="w3-xxlarge w3-section">
        <a href="https://www.facebook.com/profile.php?id=61564088787718&mibextid=ZbWKwL"><i class="fa fa-facebook-official w3-hover-opacity" style="color: blue;"></i></a>
        <a href="https://www.instagram.com/sipro195?igsh=emVtY3V6NzRyeWwx" style="color: #FD1D1D"><i class="fa fa-instagram w3-hover-opacity"></i></a>
        <a href="https://mx.linkedin.com/?src=go-pa&trk=sem-ga_campid.19001150288_asid.143806640876_crid.694479389938_kw.linkedin_d.c_tid.kwd-148086543_n.g_mt.e_geo.9073959&mcid=7000592715335761922&cid=&gad_source=1&gclid=Cj0KCQjw6PGxBhCVARIsAIumnWbGAbcO-lSx09ASL43IgvucKQ4bww4VyFQRT5URhJNbSmAXRtzMGlUaAskHEALw_wcB&gclsrc=aw.ds"><i class="fa fa-linkedin w3-hover-opacity" style="color: white"></i></a>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
        <p class="mx-3">
            <a href="docs/aviso priv.pdf" style="color: #ccc; font-size: 14px;">Aviso de Privacidad</a>
        </p>
        <p class="mx-3">
            <a href="docs/AcuerdoConfidencialidad.pdf" style="color: #ccc; font-size: 14px;">Acuerdo de Confidencialidad</a>
        </p>
        <p class="mx-3">
            <a href="docs/TerminosDeUso.pdf" style="color: #ccc; font-size: 14px;">Términos de Uso</a>
        </p>
    </div>
    <div class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 35px; margin-top: 20px; height: 1px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-light" style="width: 100%;"></div>
    </div>
    <p class="text-center"> <a href="iniciosesion.php"><img src="img/logoBlanco.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"></a> &copy; 2024 SIPRO</p>
    
</footer>

<script src="js/particles.js"></script>
<script src="js/app.js"></script>

<script>
    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }


    // Toggle between showing and hiding the sidebar when clicking the menu icon
    var mySidebar = document.getElementById("mySidebar");

    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
        } else {
            mySidebar.style.display = 'block';
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
    }

    $(document).ready(function() {
        $(window).scroll(function() {
            $(".slideanim").each(function() {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>
</html>