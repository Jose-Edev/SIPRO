<?php
require '../../../php/conexion.php';
$bd = new MySQL();
//validar Usuario
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: ../../../iniciosesion.php');
  exit();
}

if($_SESSION['admin'] === "Almacen" || $_SESSION['admin'] === "Ventas"){
  header('Location: ../../sipromadre.php');
}

$idClienteSM = isset($_GET['idClienteSM']) ? intval($_GET['idClienteSM']) : 0;

?>

<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>
  <script src="../../../js/color-modes.js"></script>
  <link rel="icon" href="../../../img/SIPROviñe.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de Administración - SIPRO</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="../../../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .fas {
      font-size: 18px;
      margin-right: 5px;
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #d40909;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #d40909;
      --bs-btn-hover-border-color: #d40909;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #d40909;
      --bs-btn-active-border-color: #d40909;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100%;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    .offcanvas-md {
      height: 91.95vh;
      /* Altura del 100% del viewport */
    }

    .offcanvas-body {
      height: calc(100vh - 50px);
      /* Altura del 100% del viewport menos la altura del encabezado del sidebar */
      overflow-y: auto;
      /* Agregar scroll vertical si el contenido excede la altura */
    }

    main {
      min-height: calc(100vh - 56px);
      /* Altura mínima del 100% del viewport menos la altura de la barra de navegación */
    }

    .label-large {
      font-size: 1.5em;
      /* Puedes ajustar este tamaño a tu preferencia */
    }

    @media screen and (max-width: 768px) {
      .offcanvas-md {
        height: 100%;
        /* Altura del 100% del viewport */
      }

      .offcanvas-body {
        height: 100%;
        /* Altura del 100% del viewport menos la altura del encabezado del sidebar */
        overflow-y: auto;
        /* Agregar scroll vertical si el contenido excede la altura */
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../../../css/dashboard.css" rel="stylesheet">
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
      aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Tema</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Claro
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Oscuro
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
          aria-pressed="true">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>


  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">

    <symbol id="list" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
    </symbol>
    <symbol id="plus-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
    </symbol>
  </svg>

  <header class="navbar sticky-top flex-md-nowrap p-0 shadow" data-bs-theme="dark" style=" background-color: #090909;">

    <div class="offcanvas-header p-2" style="height: 50px; background-color: #090909;">
      <img src="../../../img/logoBlanco.png" alt="" width="25" height="25" class="rounded-circle me-2">
      <h5 class="offcanvas-title fs-6 text-white" id="sidebarMenuLabel">SIPRO Administración</h5>
    </div>

    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="bi">
            <use xlink:href="#list" />
          </svg>
        </button>
      </li>
    </ul>
  </header>

  <div class="container-fluid">
    <div class="row">
      <div style="background-color: #141414;" class="border-left col-md-3 col-lg-2 p-0">
        <div style="width: auto; background-color: #141414;" class="offcanvas-md offcanvas-start me-3" tabindex="-1"
          id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
          <div class="offcanvas-header p-2" style="height: 50px; width: auto; background-color: #141414;">
            <img src="../../../img/logoBlanco.png" alt="" width="25" height="25" class="rounded-circle me-2">
            <h5 class="offcanvas-title fs-6 text-white" id="sidebarMenuLabel">SIPRO Administración</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
              aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
            style="background-color: #141414;">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a href="../../../adminpag/siproAdmin.php" class="nav-link d-flex align-items-center gap-2 text-white"
                  aria-current="page">
                  <i class="fas fa-home"></i> Inicio
                </a>
              </li>
              <li>
                <a href="../../../adminpag/clientes.php" class="nav-link d-flex align-items-center gap-2 text-white">
                  <i class="fas fa-user"></i> Administrar Clientes
                </a>
              </li>
              <li>
                <a href="../../../adminpag/trabajo.php" class="nav-link d-flex align-items-center gap-2 text-white">
                  <i class="fas fa-briefcase"></i> Administrar Trabajos
                </a>
              </li>
            </ul>
            <hr style="color: white;">
            <ul class="nav nav-pills flex-column">
              <li>
                <a href="../../sipromadre.php" style="background-color: red;"
                  class="nav-link d-flex align-items-center gap-2 text-white">
                  <img src="../../../img/carpeta blanca con logo sin fondo.png" alt="iconCarpSIPRO"
                    style="width: 33px; margin-left: -8px;">SIPRO Madre
                </a>
              </li>
              <li>
                <a href="../../EmpresasDetalles.php" class="nav-link d-flex align-items-center gap-2 text-white">
                  <i class="fas fa-building"></i>Empresas (Detalles)
                </a>
              </li>
            </ul>
            <hr style="color: white;">
            <ul class="nav nav-pills flex-column">
              <li>
                <a href="../../../adminpag/abreviaturas.php"
                  class="nav-link d-flex align-items-center gap-2 text-white">
                  <i class="fas fa-building"></i>Abreviaturas (Requsiciones)
                </a>
              </li>
            </ul>
            <hr style="color: white;">
            <ul class="nav flex-column mb-auto">
              <div class="dropdown">
                <a href="#" class="nav-link d-flex align-items-center text-white" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../../../img/logoBlanco.png" alt="" width="25" height="25" class="rounded-circle me-2">
                  <strong>SIPRO ⩛</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                  <li><a class="dropdown-item" href="../../../php/logout.php">Cerrar Sesión</a></li>
                </ul>
              </div>
            </ul>
          </div>
        </div>
      </div>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Agregar Registro en SIPRO-Madre</h1>
        </div>

        <form action="metodos/agregarSiproRe.php" method="post" enctype="multipart/form-data">
          <div class="table-responsive small">

            <div class="mb-3">
              <label class="form-label label-large">Cliente Desplegable</label>
              <select name="clienteSM" id="clienteSM" class="form-select" aria-label="Default select example"
                aria-describedby="emailHelp">
                <!-- Aqui va la funcion -->
                <?php
                $options = $bd->getClientesSMOptions();
                echo $options;
                ?>
              </select>
            </div>

            <div class="mb-3" style="display:none">
              <label class="form-label label-large">Cliente</label>
              <input type="text" class="form-control" id="cliente" name="cliente" aria-describedby="emailHelp">
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', (event) => {
                const selectElement = document.getElementById('clienteSM');
                const inputElement = document.getElementById('cliente');

                selectElement.addEventListener('change', function() {
                  const selectedOption = this.options[this.selectedIndex];
                  inputElement.value = selectedOption.text;
                });

                // Inicializar el valor del campo de texto al cargar la página si hay una selección por defecto
                if (selectElement.selectedIndex !== -1) {
                  inputElement.value = selectElement.options[selectElement.selectedIndex].text;
                }
              });
            </script>

            <div class="mb-3">
              <label class="form-label label-large">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label class="form-label label-large">Fecha</label>
              <input type="text" class="form-control" id="fecha" name="fecha" aria-describedby="emailHelp">
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                var today = new Date();
                var day = String(today.getDate()).padStart(2, '0');
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var year = today.getFullYear();
                var todayString = year + '-' + month + '-' + day;
                document.getElementById('fecha').value = todayString;
              });
            </script>


            <div style="width: 101%" class="row mb-3">
              <div class="col-md-6">
                <label class="form-label label-large">Abreviaturas (Ayuda)</label>
                <select name="abreviaturas" id="abreviaturas" class="form-select" aria-label="Default select example"
                  aria-describedby="emailHelp">
                  <option value="" disabled selected>Selecciona la abreviatura del cliente</option>
                  <?php
                  $options = $bd->getAbreviaturasOptions();
                  echo $options;
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label label-large">Requisicion</label>
                <input type="text" class="form-control" id="requisicion_id" name="requisicion_id"
                  aria-describedby="emailHelp" readonly required>
              </div>

            </div>
            <script>
              document.getElementById('abreviaturas').addEventListener('change', function() {
                var abreviatura = this.value;
                var year = new Date().getFullYear();

                fetch(`metodos/getRequisitionNumber.php?abreviatura=${abreviatura}&year=${year}`)
                  .then(response => {
                    if (!response.ok) {
                      throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                  })
                  .then(data => {
                    if (data.error) {
                      console.error('Error:', data.error);
                    } else {
                      var nextNumber = data.last_number ? parseInt(data.last_number) + 1 : 1;
                      var formattedNumber = String(nextNumber).padStart(3, '0');
                      var requisitionId = `${abreviatura}-${year}-${formattedNumber}`;
                      document.getElementById('requisicion_id').value = requisitionId;

                      updateOrdenTrabajo();
                    }
                  })
                  .catch(error => console.error('Fetch error:', error));
              });

              function updateOrdenTrabajo() {
                const formattedNumber = document.getElementById('requisicion_id').value.split('-')[3];
                const partidas = document.querySelectorAll('.partida');

                partidas.forEach((partida, index) => {
                  const numPartida = String(index + 1).padStart(2, '0');
                  const ordenTrabajoInput = partida.querySelector('input[name^="partidas"][name$="[orden_trabajo]"]');
                  if (ordenTrabajoInput) {
                    ordenTrabajoInput.value = `${formattedNumber}-${numPartida}`;
                  }
                });
              }

              // Llamar a updateOrdenTrabajo cuando se agrega o quita una partida
              function setupPartidaListeners() {
                document.getElementById('agregar-partida').addEventListener('click', function() {
                  setTimeout(updateOrdenTrabajo, 0);
                });

                document.getElementById('partidas-container').addEventListener('click', function(e) {
                  if (e.target.classList.contains('quitar-partida')) {
                    setTimeout(updateOrdenTrabajo, 0);
                  }
                });
              }

              // Llamar a setupPartidaListeners cuando el DOM esté completamente cargado
              document.addEventListener('DOMContentLoaded', setupPartidaListeners);

              // También actualizar cuando cambie el requisicion_id directamente
              document.getElementById('requisicion_id').addEventListener('input', updateOrdenTrabajo);
            </script>


            <div class="mb-3">
              <label class="form-label label-large">Orden de Salida</label>
              <input type="text" class="form-control" id="orden_salida" name="orden_salida"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label class="form-label label-large">Numero de cotización</label>
              <input type="text" class="form-control" id="cot_no" name="cot_no" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label class="form-label label-large">Orden de Compra</label>
              <input type="text" class="form-control" id="orden_compra" name="orden_compra"
                aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label class="form-label label-large">Número de Factura</label>
              <input type="text" class="form-control" id="fact_no" name="fact_no" aria-describedby="emailHelp">
            </div>


            <hr>
            <div id="partidas-container">
              <div class="partida mb-3">
                <h4>Partida 1</h4>
                <div class="mb-3" style="display:none">
                  <label class="form-label label-large">Número de Partida</label>
                  <input type="number" class="form-control" id="num_partida" name="partidas[0][num_partida]"
                    aria-describedby="emailHelp" value="1" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Cantidad</label>
                  <input type="number" class="form-control" id="cantidad" name="partidas[0][cantidad]"
                    aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Unidad de Medida</label>
                  <select class="form-select" aria-label="Default select example" id="u_m" name="partidas[0][u_m]"
                    aria-describedby="emailHelp">
                    <option value="H87-Pza.">H87-Pza.</option>
                    <option value="Jgo.">Jgo.</option>
                    <option value="E48-Serv.">E48-Serv.</option>
                    <option value="Ltr.">Ltr.</option>
                    <option value="Mts.">Mts.</option>
                    <option value="Kg.">Kg.</option>
                  </select>
                </div>

                <br>

                <div class="input-group">
                  <span class="input-group-text label-large">Descripción</span>
                  <textarea class="form-control" id="descripcion" name="partidas[0][descripcion]" rows="2"
                    placeholder="Inserta una descripcion aqui"></textarea>
                </div>
                <br>
                <div class="mb-3" style="display:none">
                  <label class="form-label label-large">Numero de Cotización</label>
                  <input type="hidden" name="partidas[0][cot_no]" class="no-cotizacion-hidden">
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Orden de Trabajo</label>
                  <input type="text" class="form-control" id="orden_trabajo" name="partidas[0][orden_trabajo]"
                    aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Plano</label>
                  <select class="form-select" aria-label="Default select example" id="plano" name="partidas[0][plano]"
                    aria-describedby="emailHelp">
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="mb-3" style="display:none">
                  <label class="form-label label-large">Orden de Compra</label>
                  <input type="hidden" name="partidas[0][orden_compra]" class="orden-compra-hidden">
                </div>
                <div class="mb-3" style="display:none">
                  <label class="form-label label-large">Orden de Salida</label>
                  <input type="hidden" name="partidas[0][orden_salida]" class="orden-salida-hidden">
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Reporte Fotográfico</label>
                  <select class="form-select" aria-label="Default select example" id="rep_fotografico"
                    name="partidas[0][rep_fotografico]" aria-describedby="emailHelp">
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="mb-3" style="display:none">
                  <label class="form-label label-large">Numero de Factura</label>
                  <input type="hidden" name="partidas[0][fact_no]" class="no-factura-hidden">
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Precio por Unidad</label>
                  <input type="text" class="form-control" id="precio_uni" name="partidas[0][precio_uni]"
                    aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Control Calidad</label>
                  <input type="text" class="form-control" id="c_c" name="partidas[0][c_c]" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Requiere Factura</label>
                  <select class="form-select" aria-label="Default select example" id="rf" name="partidas[0][rf]"
                    aria-describedby="emailHelp">
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label label-large">Porcentaje</label>
                  <input type="text" class="form-control" id="porcentaje" name="partidas[0][porcentaje]"
                    aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="partidas[0][requisicion_id]" class="requisicion-id-hidden">

              </div>
            </div>
            <hr>
            <div class="mb-3">
              <label class="form-label label-large">Total de la factura</label>
              <input type="text" class="form-control" id="total_f" name="total_f" aria-describedby="emailHelp">
            </div>

            <br>


          </div>

          <button type="button" class="btn btn-secondary mb-3" id="agregar-partida">Agregar Partida +</button>
          <br>
          <button type="submit" class="btn btn-success mb-3">Agregar a SIPRO Madre</button>

        </form>

      </main>
    </div>
  </div>
  <script src="../../../js/bootstrap.bundle.min.js"></script>
  <!-- <script src="sidebars.js"></script> -->

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp"
    crossorigin="anonymous"></script>
  <script src="../../../js/dashboard.js"></script>

  <script>
    document.getElementById('agregar-partida').addEventListener('click', function() {
      const container = document.getElementById('partidas-container');
      const partidaIndex = container.children.length;
      const newPartida = document.createElement('div');
      newPartida.className = 'partida mb-3';
      newPartida.innerHTML = `
            <h4>Partida ${partidaIndex + 1}</h4>
            <div class="mb-3" style="display:none">
                <label class="form-label label-large">Número de Partida</label>
                <input type="number" class="form-control" name="partidas[${partidaIndex}][num_partida]" aria-describedby="emailHelp" value="${partidaIndex + 1}" readonly>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label label-large">Cantidad</label>
                <input type="number" class="form-control" name="partidas[${partidaIndex}][cantidad]" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="u_m" class="form-label label-large">Unidad de Medida</label>
                <select class="form-select" name="partidas[${partidaIndex}][u_m]" aria-describedby="emailHelp">
                    <option value="H87-Pza.">H87-Pza.</option>
                    <option value="Jgo.">Jgo.</option>
                    <option value="E48-Serv.">E48-Serv.</option>
                    <option value="Ltr.">Ltr.</option>
                    <option value="Mts.">Mts.</option>
                    <option value="Kg.">Kg.</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text label-large">Descripción</span>
                <textarea class="form-control" name="partidas[${partidaIndex}][descripcion]" rows="2" placeholder="Inserta una descripcion aqui"></textarea>
            </div>
            <br>
            <div class="mb-3" style="display:none">
                <label class="form-label label-large">Numero de Cotización</label>
                <input type="hidden" name="partidas[${partidaIndex}][cot_no]" class="no-cotizacion-hidden">
            </div>
            <div class="mb-3">
                <label class="form-label label-large">Orden de Trabajo</label>
                <input type="text" class="form-control" name="partidas[${partidaIndex}][orden_trabajo]" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label label-large">Plano</label>
                <select class="form-select" aria-label="Default select example" id="plano" name="partidas[${partidaIndex}][plano]" aria-describedby="emailHelp" >
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                  </select>
            </div>
            <div class="mb-3" style="display:none">
                <label class="form-label label-large">Orden de Compra</label>
                <input type="hidden" name="partidas[${partidaIndex}][orden_compra]" class="orden-compra-hidden">
            </div>
            <div class="mb-3" style="display:none">
                <label class="form-label label-large">Orden de Salida</label>
                <input type="hidden" name="partidas[${partidaIndex}][orden_salida]" class="orden-salida-hidden">
            </div>
            <div class="mb-3">
                <label class="form-label label-large">Reporte Fotográfico</label>
                <select class="form-select" aria-label="Default select example" id="rep_fotografico" name="partidas[${partidaIndex}][rep_fotografico]" aria-describedby="emailHelp" >
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                  </select>
            </div>
            <div class="mb-3" style="display:none">
                <label class="form-label label-large">Numero de Factura</label>
                <input type="hidden" name="partidas[${partidaIndex}][fact_no]" class="no-factura-hidden">
            </div>
            <div class="mb-3">
                <label class="form-label label-large">Precio por Unidad</label>
                <input type="text" class="form-control" name="partidas[${partidaIndex}][precio_uni]" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label label-large">Control Calidad</label>
                <input type="text" class="form-control" name="partidas[${partidaIndex}][c_c]" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <label class="form-label label-large">Requiere Factura</label>
                <select class="form-select" aria-label="Default select example" id="rf" name="partidas[${partidaIndex}][rf]" aria-describedby="emailHelp" >
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                  </select>
            </div>
            <div class="mb-3">
                <label class="form-label label-large">Porcentaje</label>
                <input type="text" class="form-control" name="partidas[${partidaIndex}][porcentaje]" aria-describedby="emailHelp">
            </div>
            <input type="hidden" name="partidas[${partidaIndex}][requisicion_id]" class="requisicion-id-hidden">
            <button type="button" class="btn btn-danger mt-2 quitar-partida">Quitar Partida</button>
        `;
      container.appendChild(newPartida);
      updateRequisicionId();
      updateOSalida();
      updateNCotiza();
      updateOCompra();
      updateNFactura();
    });

    document.getElementById('partidas-container').addEventListener('click', function(e) {
      if (e.target.classList.contains('quitar-partida')) {
        e.target.closest('.partida').remove();
      }
    });

    document.getElementById('requisicion_id').addEventListener('input', updateRequisicionId);

    function updateRequisicionId() {
      const requisicionId = document.getElementById('requisicion_id').value;
      const hiddenInputs = document.querySelectorAll('.requisicion-id-hidden');
      hiddenInputs.forEach(input => {
        input.value = requisicionId;
      });
    }

    document.getElementById('orden_salida').addEventListener('input', updateOSalida);

    function updateOSalida() {
      const ordenSalida = document.getElementById('orden_salida').value;
      const hiddenInputs = document.querySelectorAll('.orden-salida-hidden');
      hiddenInputs.forEach(input => {
        input.value = ordenSalida;
      });
    }

    document.getElementById('cot_no').addEventListener('input', updateNCotiza);

    function updateNCotiza() {
      const numeroCotizacion = document.getElementById('cot_no').value;
      const hiddenInputs = document.querySelectorAll('.no-cotizacion-hidden');
      hiddenInputs.forEach(input => {
        input.value = numeroCotizacion;
      });
    }

    document.getElementById('orden_compra').addEventListener('input', updateOCompra);

    function updateOCompra() {
      const ordenCompra = document.getElementById('orden_compra').value;
      const hiddenInputs = document.querySelectorAll('.orden-compra-hidden');
      hiddenInputs.forEach(input => {
        input.value = ordenCompra;
      });
    }

    document.getElementById('fact_no').addEventListener('input', updateNFactura);

    function updateNFactura() {
      const numeroFactura = document.getElementById('fact_no').value;
      const hiddenInputs = document.querySelectorAll('.no-factura-hidden');
      hiddenInputs.forEach(input => {
        input.value = numeroFactura;
      });
    }

    function calcularTotal() {
      let total = 0;
      const partidas = document.querySelectorAll('.partida');

      partidas.forEach(partida => {
        const cantidad = parseFloat(partida.querySelector('[name$="[cantidad]"]').value) || 0;
        const precioUni = parseFloat(partida.querySelector('[name$="[precio_uni]"]').value) || 0;
        total += cantidad * precioUni;
      });

      document.getElementById('total_f').value = total.toFixed(2);
    }

    document.getElementById('partidas-container').addEventListener('input', function(e) {
      if (e.target.name.includes('[cantidad]') || e.target.name.includes('[precio_uni]')) {
        calcularTotal();
      }
    });

    document.getElementById('agregar-partida').addEventListener('click', function() {
      setTimeout(calcularTotal, 0);
    });

    document.getElementById('partidas-container').addEventListener('click', function(e) {
      if (e.target.classList.contains('quitar-partida')) {
        setTimeout(calcularTotal, 0);
      }
    });
  </script>


</body>

</html>