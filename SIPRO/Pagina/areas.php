<!DOCTYPE html>
<html lang="es">

<head>
    <title>SIPRO PAG</title>
    <link rel="icon" href="../img/SIPROviñe.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/SIPROviñe.png" />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/maquinaria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylecard2.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Carusel de area de paileria -->
    <link rel="stylesheet" href="../css/CaruselEstatic.css">
    <script src="../js/CaruselEstaticCode.js"></script>

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif;
        }

        body,
        html {
            height: 100%;
            line-height: 2.2;
            background-image: url('../img/marmol.png');
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

        .textoMetal {
            background: linear-gradient(to bottom, grey, rgb(117, 116, 116), black);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: rgba(0, 0, 0, 0.5) 0px 3px 3px;
            font-family: "Raleway", sans-serif;
        }

        .shadow-hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: opacity 0.3s ease-in-out;
            opacity: 1;
        }

        .shadow-hover:hover {
            opacity: 0.8;
        }

        .w3-column-4 {
            float: left;
            width: 25%;
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
        #soldaduras {
            display: none; /* Ocultar por defecto */
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .texto-rojo {
            font-size: 15px; /* Cambia este valor para ajustar el tamaño de la letra */
            color: red;
        }
        .texto-blanco {
            font-size: 15px; /* Cambia este valor para ajustar el tamaño de la letra */
            color: white;
        }
        .texto-gris {
            font-size: 15px; /* Cambia este valor para ajustar el tamaño de la letra */
            color: gray;
        }

    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card" id="myNavbar">
            <a href="../principal.php" class="w3-bar-item w3-button w3-wide" style="color: white;"> <img src="../img/logoBlanco.png" style="width: 30px; height: 30px; margin-top: -5px; " class="rotate"> SIPRO</a>
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="areas.php" onclick="w3_close()" class="w3-bar-item w3-button" style="background-color: red;"><i class="fa fa-cogs"></i> ÁREAS</a>
                <a href="trabajos.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th"></i> TRABAJOS</a>
                <a href="../principal.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-home"></i> INICIO</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!--solo aparece el cerrar en dispositivos moviles-->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Cerrar
        </a>
        <a href="areas.php" onclick="w3_close()" class="w3-bar-item w3-button" style="background-color: red;"><i class="fa fa-cogs"></i> ÁREAS</a>
        <a href="trabajos.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-th"></i> TRABAJOS</a>
        <a href="../principal.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-home"></i> INICIO</a>
    </nav>

    

    <div class="w3-row w3-padding-32 w3-container" style="padding:128px 16px"> 
        <div class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 10px; margin-top: 80px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-danger" style="width: 100%;"></div>
        </div>    
        <h3 class="w3-center textoMetal" style="margin-top: 48px; font-size: 38px;"><img src="../img/SIPROviñe.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> MAQUINARIA</h3>

        <!-- Maquinaria con Animacion -->
        <div id="contenedor">
            <div class="item">
                <div class="quote">
                    <p id="parr">Torno</p>
                    <p id="descripcion">Máquina compuesta por un cilindro que gira alrededor de su eje por la acción de
                        ruedas o palancas.</p>
                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <p id="parr">CNC</p>
                    <p id="descripcion"> Maquina completamente automatizada y manejada por medio de un software de control
                        numérico por computadora.</p>
                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <p id="parr">Fresadora</p>
                    <p id="descripcion"> Máquina que trabaja a través del arranque de viruta mediante la rotación a gran
                        velocidad de la fresa.</p>
                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <p id="parr">Sierra Cinta</p>
                    <p id="descripcion">Máquina usada en carpintería y metalurgia, siendo útiles en el corte de formas irregulares.</p>
                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <p id="parr"> Cepillo de codo</p>
                    <p id="descripcion">Máquina para dar acabado a piezas y realizar cuñeros.</p>
                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <p id="parr">Taladro de Columna</p>
                    <p id="descripcion">Herramienta que permite hacer agujeros muy precisos en distintos materiales. </p>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="w3-row-padding w3-margin-top">
        <div align="center">
            <h1>Capacidades:</h1>
        </div>
        <div class="table-responsive small">

            <table class="table table-bordered">
                <thead class="w3-center">
                    <tr class="table-dark">
                        <td class="table-dark">
                            <h2 class="text-white">Tornos (7)</h2>
                        </td>
                        <td class="table-dark">
                            <h2 class="text-white">Fresadoras (5)</h2>
                        </td>
                        <td class="table-dark">
                            <h2 class="text-white">Otros (5)</h2>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-secondary">
                            <h3>Tornos convencionales <span class="texto-rojo">(1-6)</span></h3>
                            <li>Volteo sobre la bancada:</li>
                            <p>Desde 280 x 800 mm  entre puntos  <p>
                            <p>Hasta 800 x 3000 mm  entre puntos</p>    
                           
                        </td>
                        <td class="table-secondary">
                            <h3>Fresadoras Verticales Universales <span class="texto-rojo">(1-4)</span></h3>
                            <li>Carrera del husillo: 127 mm.</li>
                            <li>Carrera transversal: 406 mm.</li>
                            <li>Carrera longitudinal: 914 mm.</li>
                           
                        </td>
                        <td class="table-secondary">
                            <h3>Cepillo de Codo <span class="texto-rojo">(1-2)</span></h3>
                            <li>Carrera longitudinal de 300 mm a 500mm</li>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <h3>Torno CNC </h3>
                            <li>Volteo sobre la bancada: 360 mm</li>
                            <li>Distancia entre puntos: 750 mm.</li>
                            <li>Paso de barra: 57 mm</li>
                        </td>
                        <td>
                            <h3>Fresadora para Engranes</h3>
                            <li>Longitud de recorrido en el eje X: 900 mm</li>
                            <li>Longitud de recorrido en el eje Y: 350 mm</li>
                            <li>Longitud de recorrido en el eje Z: 320 mm</li>
                        </td>
                        <td>
                            <h3>Sierra cinta</h3>
                            <li>Capacidad de corte: RD. 250 mm RECT. 250 mm X 430 mm.</li>
                            <li>Cortes Angulares: 190 mm X 250 mm.</li>
                        </td>
                    </tr>
                    <tr>
                        
                        <td  class="table-secondary">
                            
                        </td>
                        <td class="table-secondary"></td>
                        <td class="table-secondary">
                            <h3>Taladro  <span class="texto-rojo">(1-2)</span></h3>
                            <li>Capacidad máxima de barrenado 50 mm </li>
                            
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
        <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
            <img id="img01" class="w3-image">
            <p id="caption" class="w3-opacity w3-large"></p>
        </div>
    </div>

    <div id="contact" class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 10px; margin-top: 40px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger" style="width: 100%;"></div>
    </div>
    <div class="w3-row w3-padding-32 w3-section" style="margin-top:48px" style="padding:128px 16px">
        <h3 class="w3-center textoMetal" style="margin-top: -10px; font-size: 38px;"><img src="../img/SIPROviñe.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> PAILERIA</h3>
    </div>

    <!-- AREA DE PAILERIA -->
    <div style="padding: 2% 16px;">
        <div class="w3-row-padding" style="display: flex; flex-wrap: wrap;">
            <div class="w3-col m6" style="flex: 1; min-width: 300px;">
                <p style="font-size: 18px; margin-top: -30px;">Esta área se especializa en la manipulación de metales, donde expertos trazan, cortan y ensamblan con precisión piezas metálicas. Mediante procesos de soldadura avanzados, transforman cualquier proyecto en realidad.
                </p>
                <br>
                <div class="w3-row-padding" style="display: flex; flex-wrap: wrap; width: 108%; margin-left: -5px;">
                    <div class="w3-col m6" style="flex: 1; margin-right: 40px;">
                        <div class="carouselEs" style="height: auto;">
                            <div class="carouselEs-inner">
                                <div class="slideEs" align="center">
                                    <article class="card__articlecard" style="width: auto; height: auto;">
                                        <img id="imgCard" src="../img/TIG RE.jpg" alt="image" class="card__imgcard">
                                        <div class="card__datacard" style="width: auto; height: auto;">
                                            <h2 class="card__titlecard">Soldadura TIG</h2>
                                            <p>La soldadura TIG (Tungsten Inert Gas) emplea un electrodo de tungsteno no
                                                consumible y un gas protector, como el argón, para proteger la
                                                soldadura.</p>
                                        </div>
                                    </article>
                                </div>
                                <div class="slideEs" align="center">
                                    <article class="card__articlecard" style="width: auto; height: auto;">
                                        <img id="imgCard" src="../img/MIG RE.jpg" alt="image" class="card__imgcard">
                                        <div class="card__datacard" style="width: auto; height: auto;">
                                            <h2 class="card__titlecard">Soldadura MIG</h2>
                                            <p>La soldadura MIG (Metal Inert Gas) utiliza un electrodo consumible y un
                                                gas protector, como argón o helio, para proteger la soldadura </p>
                                        </div>
                                    </article>
                                </div>
                                <div class="slideEs" align="center">
                                    <article class="card__articlecard" style="width: auto; height: auto;">
                                        <img id="imgCard" src="../img/polvo RE.jpg" alt="image" class="card__imgcard">
                                        <div class="card__datacard" style="width: auto; height: auto;">
                                            <h2 class="card__titlecard">Soldadura en polvo</h2>
                                            <p>La soldadura en polvo emplea polvos metálicos finos como material de
                                                aporte, fundiéndose durante el proceso para formar uniones.</p>
                                        </div>
                                    </article>
                                </div>
                                <div class="slideEs" align="center">
                                    <article class="card__articlecard" style="width: auto; height: auto;">
                                        <img id="imgCard" src="../img/ARCO RE.jpg" alt="image" class="card__imgcard">
                                        <div class="card__datacard" style="width: auto; height: auto;">
                                            <h2 class="card__titlecard">Soldadura de arco</h2>
                                            <p>La soldadura de arco utiliza un arco eléctrico entre un electrodo de
                                                soldadura y la pieza de trabajo para fundir metales y formar uniones
                                                sólidas. </p>
                                                <button class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="mostrarInfo()">Soldaduras Utilizadas</button>
                                                <div id="soldaduras" class="w3-row-padding w3-container">
                                                    <div class="w3-col l6 m6 s12">
                                                        <ul>
                                                        <li>Soldadura 6013</li>
                                                        <li>Soldadura 7018</li>
                                                        <li>Soldadura 3055</li>
                                                        <li>Soldadura inox. 308/315</li>
                                                        </ul>
                                                    </div>
                                                    <div class="w3-col l6 m6 s12">
                                                        <ul>
                                                        <li>Soldadura de Alumninio</li>
                                                        <li>Soldadura 680</li>
                                                        <li>Soldadura colado 27</li>
                                                        <li>Soldadura colado M-1</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <a class="prev" onclick="moveSlide(-1)">&#10094;</a>
                            <a class="next" onclick="moveSlide(1)">&#10095;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-col m6 slideanim" style="flex: 1; min-width: 300px; border-radius: 100px;">
                <img src="../img/paileria.jpg" alt="" style="width: 100%; height: auto; margin-bottom: 20px; margin-top: 20px;">
            </div>
        </div>
    </div>
</body>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 py-4">
    <div class="w3-xxlarge w3-section">
        <a href="https://www.facebook.com/profile.php?id=61564088787718&mibextid=ZbWKwL"><i class="fa fa-facebook-official w3-hover-opacity" style="color: blue;"></i></a>
        <a href="https://www.instagram.com/sipro195?igsh=emVtY3V6NzRyeWwx" style="color: #FD1D1D"><i class="fa fa-instagram w3-hover-opacity"></i></a>
        <a href="https://mx.linkedin.com/?src=go-pa&trk=sem-ga_campid.19001150288_asid.143806640876_crid.694479389938_kw.linkedin_d.c_tid.kwd-148086543_n.g_mt.e_geo.9073959&mcid=7000592715335761922&cid=&gad_source=1&gclid=Cj0KCQjw6PGxBhCVARIsAIumnWbGAbcO-lSx09ASL43IgvucKQ4bww4VyFQRT5URhJNbSmAXRtzMGlUaAskHEALw_wcB&gclsrc=aw.ds"><i class="fa fa-linkedin w3-hover-opacity" style="color: white"></i></a>
    </div>
    <p class="text-center">
        <a href="../docs/aviso priv.pdf" style="color: #ccc; font-size: 14px;">Aviso de Privacidad</a>
    </p>
    <div class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 35px; margin-top: 20px; height: 1px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-light" style="width: 100%;"></div>
    </div>
    <p class="text-center"><img src="../img/logoBlanco.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> &copy; 2024 SIPRO</p>
</footer>

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

    function mostrarInfo() {
            var infoBox = document.getElementById('soldaduras');
            if (infoBox.style.display === 'none') {
                infoBox.style.display = 'block';
            } else {
                infoBox.style.display = 'none';
            }
        }
</script>


</html>