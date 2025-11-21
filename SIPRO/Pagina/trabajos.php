<?php
require '../php/conexion.php';
$bd = new MySQL();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>SIPRO PAG</title>
    <link rel="shortcut icon" href="../img/SIPROviñe.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">,
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleIma.css">
    <link rel="stylesheet" href="../css/stylecard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/carruB.css">
    <link rel="stylesheet" href="../css/CaruselEstatic.css">
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
            /* height: 100%; */
            margin-top: -15px;
            line-height: 1.8;
            /* background-image: url('./img/marmol.png'); */
        }

        body {
            background-color: hsl(0, 0%, 95%);
            background-image: url('../img/marmol.png');
            font-family: "Raleway", sans-serif;
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
            /* background-size: cover; */
            /* overflow: hidden; */
        }

        .blurred-background::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url('../img/trabajo.jpg');
            background-size: cover;
            filter: blur(8px);
            z-index: -1;
        }

        .contentBack {
            position: relative;
            z-index: 1;
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

        .fade-in {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 7s ease-in-out forwards;
        }

        .image-effect:hover {
            transform: scale(1.25);
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

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
        }

        .image-container {
            position: relative;
            width: 220px;
            height: 220px;
            border-radius: 10px;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 5px;
            border: 1px solid #888;
            width: 80%;
            max-width: 900px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
    <!-- Barra de navegación -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card" id="myNavbar">
            <a href="../principal.php" class="w3-bar-item w3-button w3-wide"> <img src="../img/logoBlanco.png" style="width: 30px; height: 30px; margin-top: -5px;" class="rotate"> SIPRO</a>
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="areas.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-cogs"></i> AREAS</a>
                <a href="trabajos.php" onclick="w3_close()" class="w3-bar-item w3-button" style="background-color: red;"><i class="fa fa-th"></i> TRABAJOS</a>
                <a href="../principal.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-home"></i> INICIO</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!--solo aparece el cerrar en dispositivos moviles-->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none;" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Cerrar</a>
        <a href="areas.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-cogs"></i> AREAS</a>
        <a href="trabajos.php" onclick="w3_close()" class="w3-bar-item w3-button" style="background-color: red"><i class="fa fa-th"></i> TRABAJOS</a>
        <a href="../principal.php" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-home"></i> INICIO</a>
    </nav>



    <!-- Area de trabajos -->
    <div class="w3-container" style="padding:128px 16px; margin-top:-90px;" id="work" align="center">
        <div class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 40px; margin-top: 80px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-danger" style="width: 100%;"></div>
        </div>
        <h3 class="w3-center textoMetal" style="margin-top: 48px; font-size: 35px; font-weight: bold;"><img src="../img/SIPROviñe.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> NUESTRO TRABAJO</h3>
        <p class="w3-center w3-large"></p>

        <!-- <div class="carouselEs3">
            <div class="carouselEs3-inner">
                <?php
                $bd->primerLineaImg();
                ?>
            </div>
            <a class="prev" onclick="moveSlide3(-1)">&#10094;</a>
            <a class="next" onclick="moveSlide3(1)">&#10095;</a>
        </div> -->

        <div align="center">
            <div class="carousel-container" align="left">
                <div class="carousel-content">
                    <div class="carousel-media">
                        <!-- <div class="slider-item" data-type="video" data-src="https://www.youtube.com/embed/XP3nHQkJ-io?si=-uA1cr30tVdDllbK" data-title="Barillas" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore"></div>
                        <div class="slider-item" data-type="video" data-src="https://www.youtube.com/embed/pWVQI95Mv8E?si=nu0SU049lY6KAVe0" data-title="Barillas" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore"></div>
                        <div class="slider-item" data-type="image" data-src="./img/t1a.jpg" data-title="Engranajes" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore"></div>
                        <div class="slider-item" data-type="image" data-src="./img/t2a.jpg" data-title="Bomba" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore"></div>
                        <div class="slider-item" data-type="image" data-src="./img/t3a.jpg" data-title="Aros" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore"></div>
                        <div class="slider-item" data-type="image" data-src="./img/t4.jpg" data-title="Barillas" data-description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore"></div>
                        <div class="slider-item" data-type="video" data-src="./img/VID-20240605-WA0016.mp4" data-title="Barillas" data-description="Lorem ipsum dolor sit amet, consectetu dsf dsg  g  sdf r sg e s df rdg vs e r adipiscing elit, sed do eiusmod tempor incididunt ut labore texto de ejemplo apra revisar que esta pasando en e html abecedario de palabrtas para las personas que hablan español en latinoamerica"></div> -->
                        <?php
                            $bd->primerLineaImgTra();
                        ?>
                    </div>
                    <div class="carousel-text">
                        <h2 id="carousel-title">Título</h2>
                        <p class="parrafo" id="carousel-description">Descripción</p>
                    </div>
                    <div class="carousel-indicators2">
                        <!-- Aquí se agregarán los indicadores -->
                    </div>
                    <div class="botCont">
                        <a class="prev" id="prev-btn">◀</a>
                        <a class="next" id="next-btn">▶</a>
                    </div>                    
                </div>
            </div>
        </div>
        <br>

    </div>

    <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
        <span class="w3-button w3-xxlarge w3-animate-black w3-padding-16 w3-display-topright" title="Close Modal Image">X</span>
        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-16">
            <img id="img01" class="w3-image">
            <p id="caption" class="w3-opacity w3-large"></p>
        </div>
    </div>

    <div class="progress" style="margin-right: 65px; margin-left: 65px; margin-bottom: 10px; margin-top: -2px; height: 4px;" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-danger" style="width: 100%;"></div>
    </div>

    <div class="w3-row w3-padding-32 w3-section" style="margin-top:48px" style="padding:128px 16px">
        <h3 class="w3-center textoMetal" style="margin-top: -10px; font-size: 35px; font-weight: bold;"><img src="../img/SIPROviñe.png" style="width: 35px; height: 35px; margin-top: -5px;" class="rotate"> MATERIALES</h3>
    </div>
    <div style="padding: 2% 16px;">
        <div class="w3-row-padding" style="display: flex; flex-wrap: wrap;margin-top: -50px;">
            <div class="w3-col m6" style="flex: 1; min-width: 300px;">
                <p style="font-size: 18px; text-align:center;">En esta empresa, nos dedicamos a ofrecer productos de la más alta calidad, garantizando la excelencia en los materiales que utilizamos. Estos son los materiales con los que trabajamos.</p>
                <br>
                <div class="gallery" style="padding-bottom: 40px;">
                    <div style="background-color: #595959" class="image-container w3-hover-opacity image-effect slideanim shadow-hover" onclick="openModal('modal1')">
                        <h5 style="padding-top: 5px; font-weight: bold;" align="center" class="text-white">No ferrosos</h5>
                        <img src="../img/materiales/teflon.jpg" alt="Imagen 1">
                    </div>
                    <div style="background-color: #737373" class="image-container w3-hover-opacity image-effect slideanim shadow-hover" onclick="openModal('modal3')">
                        <h5 style="padding-top: 5px; font-weight: bold" align="center" class="text-white">Aceros Comerciales</h5>
                        <img src="../img/materiales/acero al carbon.jpg" alt="Imagen 3">
                    </div>
                    <div style="background-color: #595959" class="image-container w3-hover-opacity image-effect slideanim shadow-hover" onclick="openModal('modal4')">
                        <h5 style="padding-top: 5px; font-weight: bold" align="center" class="text-white">Grado Herramientas</h5>
                        <img src="../img/materiales/1045.png" alt="Imagen 54">
                    </div>
                </div>
                <div id="modal1" class="modal">
                    <div class="table-responsive small modal-content">
                        <div style="margin-left: 100px;">
                            <span class="close" onclick="closeModal('modal1')">&times;</span>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">Foto</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="table-secondary"><img src="../img/materiales/NYLAMID.jpg" style="height: 80px; width: 80px;"></th>
                                    <th class="table-secondary" style="color: black;">Plásticos</th>
                                    <td class="table-secondary">
                                        <li>Blanco</li>
                                        <li>Negro</li>
                                        <li>Verde</li>
                                        <li>Azul</li>
                                    </td>
                                </tr>
                                <tr>
                                    <th><img src="../img/materiales/teflon.jpg" style="height: 80px; width: 80px;"></th>
                                    <th style="color: black;">Teflón</th>
                                    <td>
                                        <li>Virgen</li>
                                        <li>Grafitado</li>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th class="table-secondary"><img src="../img/materiales/ACETAL.jpg" style="height: 80px; width: 80px;"></th>
                                    <th class="table-secondary" style="color: black;">Acetal</th>
                                    <td class="table-secondary">
                                        <li>Blanco</li>
                                        <li>Negro</li>
                                        <li>Acetron GP</li>
                                    </td>
                                </tr>
                                <tr>
                                    <th><img src="../img/materiales/POLIETILENO.jpg" style="height: 80px; width: 80px;"></th>
                                    <th style="color: black;">Polietileno</th>
                                    <td>
                                        <li>Blanco</li>
                                         <li>Negro</li>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-secondary"><img src="../img/materiales/celoron.png" style="height: 80px; width: 80px;"></td>
                                    <th class="table-secondary" style="color: black;">Celorón</th>
                                    <td class="table-secondary"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="modal3" class="modal">
                <div class="table-responsive small modal-content">
                    <div>
                        <span class="close" onclick="closeModal('modal3')">&times;</span>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Foto</th>
                                <th scope="col">Material</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <th><img src="../img/materiales/1018.jpeg" style="height: 80px; width: 80px;"></th>
                                <th style="color: black;">1018</th>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th class="table-secondary"><img src="../img/materiales/1045.png" style="height: 80px; width: 80px;"></th>
                                <th class="table-secondary" style="color: black;">1045</th>
                                <td class="table-secondary">
                                </td>
                            </tr>
                           
                            <tr>
                                <th ><img src="../img/materiales/8620.jpeg" style="height: 80px; width: 80px;"></th>
                                <th  style="color: black;">8620</th>
                                <td >
                                </td>
                            </tr>
                            <tr>
                                <th class="table-secondary"><img src="../img/materiales/4140.jpg" style="height: 80px; width: 80px;"></th>
                                <th class="table-secondary" style="color: black;">4140</th>
                                <td   class="table-secondary">
                                    <li>Tratado</li>
                                    <li>Recocido</li>
                                </td>
                            </tr>
                            <tr>
                                <th ><img src="../img/materiales/9840.jpg" alt="" style="height: 80px; width: 80px;"></th>
                                <th  style="color: black;">9840</th>
                                <td>
                                    <li>Tratado</li>
                                    <li>Recocido</li>

                                </td>
                            </tr>
                            <tr>
                                <th class="table-secondary"><img src="../img/materiales/inox.jpg" style="height: 80px; width: 80px;"></th>
                                <th  class="table-secondary" style="color: black;">Acero Inoxidable</th>
                                <td  class="table-secondary">
                                    <li>304</li>
                                    <li>310</li>
                                    <li>316</li>
                                    <li>416</li>
                                    <li>431</li>
                                </td>
                            </tr>
                            <tr>
                                <th ><img src="../img/materiales/acero al carbon.jpg" style="height: 80px; width: 80px;" alt=""></th>
                                <th  style="color: black;">Acero al carbón</th>
                                <td>
                            </tr>
                            <tr>
                                <th class="table-secondary" ><img src="../img/materiales/1518.jpg" style="height: 80px; width: 80px;"></th>
                                <th  class="table-secondary" style="color: black;"> 1518</th>
                                <td class="table-secondary" >
                            </tr>
                            <tr>
                                <th><img src="../img/materiales/hierro colado.jpg" style="height: 80px; width: 80px;"></th>
                                <th style="color: black;">Hierro colado</th>
                                <td >
                            </tr>

                            

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="modal4" class="modal">
                <div class="table-responsive small modal-content">
                    <div style="margin-left: 100px;">
                        <span class="close" onclick="closeModal('modal4')">&times;</span>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Foto</th>
                                <th scope="col">Material</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="table-secondary"><img src="../img/materiales/O1.jpg" style="height: 80px; width: 80px;"></th>
                                <th class="table-secondary" style="color: black;"> Acero 0-1</th>
                            </tr>
                            <tr>
                                <th><img src="../img/materiales/D2.png" style="height: 80px; width: 80px;"></th>
                                <th style="color: black;">Acero D-2</th>
                            </tr>
                            <tr>
                                <th class="table-secondary"><img src="../img/materiales/H13.jpg" style="height: 80px; width: 80px;"></th>
                                <th class="table-secondary" style="color: black;">Acero H-13</th>
                            </tr>
                           

                        </tbody>
                    </table>
                </div>
            </div>
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
<script  src="../js/carruB.js"></script>
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

    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    window.onclick = function(event) {
        const modals = document.getElementsByClassName('modal');
        for (let i = 0; i < modals.length; i++) {
            if (event.target == modals[i]) {
                modals[i].style.display = "none";
            }
        }
    }
</script>

</html>