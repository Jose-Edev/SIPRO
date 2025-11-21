<?php
class Mysql
{
    private $connection;
    public $result;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "siproadmin";

        $this->connection = new mysqli($servername, $username, $password, $dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    function getClientes()
    {
        $sql = 'SELECT idCliente, nombre, archivo FROM imgclientes ORDER BY nombre';
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->showCliente($row['idCliente'], $row['nombre'], $row['archivo']);
            }
        }
    }

    function showCliente($id, $nombre, $foto)
    {
        // Resaltar la fila si coincide con la búsqueda
        echo "<tr>";
        echo '<td><img src="../img/' . $foto . '" width="120px"/></td>';
        echo '<td>' . $nombre . '</td>';
        echo '<td><a href="EditarClientes.php?id=' . $id . '"><button type="button" class="btn btn-warning">EDITAR</button></a></td>';
        // echo '<td><a href="metodos/deleteClientes.php?id=' . $id . '"><button type="button" class="btn btn-danger">ELIMINAR</button></a></td>';
        echo '<td><a href="javascript:void(0);" onclick="confirmBorrado(\'metodos/deleteClientes.php?id=' . $id . '\')"><button type="button" class="btn btn-danger">ELIMINAR</button></a></td>';
        echo '</tr>';
    }

    function updateClientes($id, $nombre, $imagen)
    {
        $sql = "UPDATE
                    `imgclientes`
                SET
                    idCliente = '$id',
                    nombre = '$nombre',
                    archivo = '$imagen'
                WHERE
                    imgclientes.idCliente = '$id'";
        $this->connection->query($sql);
    }


    function showLineaUno($nombre, $foto)
    {
        echo
        '<article class="card__articlecard">
            <img id="imgCard" src="./img/' . $foto . '" alt="image" class="card__imgcard">
            <div class="card__datacard">
                <h2 class="card__titlecard">' . $nombre . '</h2>
            </div>
        </article>';
    }

    function primerLinea()
    {
        $sql = "SELECT
                    idCliente, nombre, archivo
                FROM
                    imgclientes ORDER BY nombre";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->showLineaUno($row["nombre"], $row["archivo"]);
            }
        }
        $this->connection->query($sql);
    }


    function getTrabajos()
    {
        $sql = 'SELECT idTrabajo, nombre, descripcion, tipo, archivo FROM imgtrabajos ORDER BY idTrabajo';
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->showTrabajo($row["idTrabajo"], $row["nombre"], $row["descripcion"], $row["tipo"], $row["archivo"]);
            }
        }
    }

    function showTrabajo($id, $nombre, $descripcion, $tipo, $archivo)
    {
        echo '<tr>';

        // Determinar si el archivo es una imagen o un video
        if ($tipo == 'image') {
            echo '<td><img src="../img/' . $archivo . '" width="120px"/></td>';
        } elseif ($tipo == 'video') {
            echo '<td><video width="120" controls>
                        <source src="../img/' . $archivo . '" type="video/mp4">
                        Tu navegador no soporta la reproducción de videos.
                      </video></td>';
        }

        echo '<td>' . $nombre . '</td>';
        echo '<td>' . $descripcion . '</td>';
        echo '<td><a href="EditarTrabajos.php?id=' . $id . '"><button type="button" class="btn btn-warning">EDITAR</button></a></td>';
        // echo '<td><a href="metodos/deleteTrabajos.php?id=' . $id . '"><button type="button" class="btn btn-danger">ELIMINAR</button></a></td>';
        echo '<td><a href="javascript:void(0);" onclick="confirmBorrado2(\'metodos/deleteTrabajos.php?id=' . $id . '\')"><button type="button" class="btn btn-danger">ELIMINAR</button></a></td>';
        echo '</tr>';
    }

    function updateTrabajos($id, $nombre, $descripcion, $tipo, $imagen)
    {
        $sql = "UPDATE
                    `imgtrabajos`
                SET
                    idTrabajo = '$id',
                    nombre = '$nombre',
                    descripcion = '$descripcion',
                    tipo = '$tipo',
                    archivo = '$imagen'
                WHERE
                    imgtrabajos.idTrabajo = '$id'";
        $this->connection->query($sql);
    }

    function showLineaUnoImg($descripcion, $foto)
    {
        echo
        '<div class="slideEs3">
                <div style="margin-top: 1px;">
                    <img src="../img/' . $foto . '" style="width:45%; border-radius: 20px;" onclick="onClick(this)"
                    class="w3-hover-opacity image-effect slideanim shadow-hover imgEs3" alt="' . $descripcion . '">
                </div>
            </div>';
    }

    function showLineaUnoImgTra($tipo, $descripcion, $foto, $nombre)
    {
        echo
        '<div class="slider-item" data-type="' . $tipo . '" data-src="../img/' . $foto . '" data-title="' . $nombre . '" data-description="' . $descripcion . '"></div>';
    }

    function getPB($idClienteSM)
    {
        $sql = "SELECT COUNT(*) AS porB
                FROM requisiciones r
                JOIN partidasreq pR ON r.requisicion_id = pR.requisicion_id
                WHERE pR.ganancia_porcentaje <= 0 AND r.idClienteSM = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $idClienteSM);
        $stmt->execute();
        $result = $stmt->get_result();
        $porcentaje_data = $result->fetch_assoc();
        $stmt->close();
        return $porcentaje_data['porB'];
    }

    function getPM($idClienteSM)
    {
        $sql = "SELECT COUNT(*) AS porM
                FROM requisiciones r
                JOIN partidasreq pR ON r.requisicion_id = pR.requisicion_id
                WHERE pR.ganancia_porcentaje > 0 AND pR.ganancia_porcentaje < 40 AND idClienteSM = ?;";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $idClienteSM);
        $stmt->execute();
        $result = $stmt->get_result();
        $porcentaje_data = $result->fetch_assoc();
        $stmt->close();
        return $porcentaje_data['porM'];
    }

    function getPA($idClienteSM)
    {
        $sql = "SELECT COUNT(*) AS porA
                FROM requisiciones r
                JOIN partidasreq pR ON r.requisicion_id = pR.requisicion_id
                WHERE pR.ganancia_porcentaje >= 40 AND r.idClienteSM = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $idClienteSM);
        $stmt->execute();
        $result = $stmt->get_result();
        $porcentaje_data = $result->fetch_assoc();
        $stmt->close();
        return $porcentaje_data['porA'];
    }

    function showClienteSM($id, $nombre, $imagen)
    {
        $porA = $this->getPA($id);
        $porM = $this->getPM($id);
        $porB = $this->getPB($id);

        echo
        '<div class="col-12 col-md-6">
            <div class="containerCli w3-mobile">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <div class="image-text-containerCli">
                            <img src= "../img/' . $imagen . '" alt="">
                            <p class="h5" style="color: black">' . $nombre . '</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="button-containerCli">
                            <a href="DetallesEmpresas/Requisiciones.php?cliente=' . $id . '"><button type="button" style="background-color: #2eb82e; border-color: #2eb82e" class="btn btn-success w-100 mb-2">Requisiciones</button></a>
                            <a href="DetallesEmpresas/OrdenesTrabajo.php?cliente=' . $id . '"><button type="button" style="background-color: #e60000" class="btn btn-danger w-100 mb-2">Ordenes de Trabajo</button></a>
                            <!--<a href="DetallesEmpresas/OrdenesCompra.php?cliente=' . $id . '"><button type="button" style="background-color: #e6b800; color: white" class="btn btn-warning w-100 mb-2">Ordenes de Compra</button></a>-->
                            <a href="DetallesEmpresas/Salidas.php?cliente=' . $id . '"><button type="button" style="background-color: #0066ff" class="btn btn-primary w-100 mb-2">Salidas</button></a>
                            
                            <div style="width: 100%" class="container">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" style="background-color: #00b300; text-align: center; font-weight: bold" class="form-control" id="requisicion_id" name="requisicion_id" aria-describedby="emailHelp" value="' . $porA . '" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" style="background-color: #e6e600; text-align: center; font-weight: bold" class="form-control" id="requisicion_id" name="requisicion_id" aria-describedby="emailHelp" value="' . $porM . '" disabled>
                                    </div>
                                    <div class="col">
                                        <input type="text" style="background-color: #ff3333; text-align: center; font-weight: bold" class="form-control" id="requisicion_id" name="requisicion_id" aria-describedby="emailHelp" value="' . $porB . '" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }

    function getClientesSM()
    {
        $sql = 'SELECT idClienteSM, nombre, imagen FROM clientesm ORDER BY nombre';
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->showClienteSM($row["idClienteSM"], $row["nombre"], $row["imagen"]);
            }
        }
    }

    public function agregarClienteSM($nombre, $archivo)
    {
        $sql = "INSERT INTO clientesm (nombre, imagen) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $nombre, $archivo);
        $stmt->execute();
        $stmt->close();
    }

    function primerLineaImg()
    {
        $sql = "SELECT
            idTrabajo, nombre, descripcion, archivo
        FROM
            imgtrabajos ORDER BY idTrabajo";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->showLineaUnoImg($row["descripcion"], $row["archivo"]);
            }
        }
        $this->connection->query($sql);
    }

    function primerLineaImgTra()
    {
        $sql = "SELECT
            idTrabajo, nombre, descripcion, archivo, tipo
        FROM
            imgtrabajos ORDER BY idTrabajo";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->showLineaUnoImgTra($row["tipo"], $row["descripcion"], $row["archivo"], $row["nombre"]);
            }
        }
        $this->connection->query($sql);
    }

    public function eliminarTrabajo($id)
    {
        $sql = "DELETE FROM imgtrabajos WHERE idTrabajo = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function eliminarCliente($id)
    {
        $sql = "DELETE FROM imgclientes WHERE idCliente = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function agregarTrabajo($nombre, $descripcion, $tipo, $imagen)
    {
        $sql = "INSERT INTO imgtrabajos (nombre, descripcion, tipo, archivo) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $descripcion, $tipo, $imagen);
        $stmt->execute();
        $stmt->close();
    }

    public function agregarCliente($nombre, $archivo)
    {
        $sql = "INSERT INTO imgclientes (nombre, archivo) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $nombre, $archivo);
        $stmt->execute();
        $stmt->close();
    }

    //--------------------------------------Aqui inicia sipro madre------------------------------------------------

    function getClientesSMOptions()
    {
        $options = '';
        $sql = 'SELECT idClienteSM, nombre FROM clientesm ORDER BY nombre';
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Construir la opción del select
                $options .= '<option value="' . $row["idClienteSM"] . '">' . $row["nombre"] . '</option>';
            }
        }
        return $options;
    }

    function getClientesSMOptions2()
    {
        $options = '';
        $sql = 'SELECT idClienteSM, nombre FROM clientesm ORDER BY nombre';
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Construir la opción del select
                $options .= '<option value="' . $row["nombre"] . '">' . $row["nombre"] . '</option>';
            }
        }
        return $options;
    }

    function getAbreviaturasOptions()
    {
        $options = '';
        $sql = 'SELECT nombreEmpresa, abreviatura FROM abreviaturasempresa ORDER BY nombreEmpresa';
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Construir la opción del select
                $options .= '<option value="' . $row["abreviatura"] . '">' . $row["nombreEmpresa"] . ' / ' . $row["abreviatura"] . '</option>';
            }
        }
        return $options;
    }

    public function getSiproMadre()
    {
        $sql = "SELECT m.cliente, m.usuario, m.fecha, m.total_f, m.requisicion_id, m.idClienteSM, 
                       pS.num_partida, pS.cantidad, pS.u_m, pS.descripcion, m.requisicion_id, pS.cot_no, pS.orden_trabajo, pS.plano, pS.orden_compra, pS.orden_salida, pS.rep_fotografico, pS.fact_no, pS.precio_uni, pS.c_c, pS.rf, pS.porcentaje, pS.estatus
                FROM sipromadre m
                JOIN partidassm pS ON m.requisicion_id = pS.requisicion_id
                WHERE m.requisicion_id = pS.requisicion_id";
        return $this->connection->query($sql);
    }

    function getSiproMadre2($requisicion_id)
    {
        $sql = "SELECT m.cliente, m.usuario, m.fecha, m.total_f, m.requisicion_id, m.idClienteSM, 
                       pS.num_partida, pS.cantidad, pS.u_m, pS.descripcion, m.requisicion_id, pS.cot_no, pS.orden_trabajo, pS.plano, pS.orden_compra, pS.orden_salida, pS.rep_fotografico, pS.fact_no, pS.precio_uni, pS.c_c, pS.rf, pS.porcentaje
                FROM sipromadre m
                JOIN partidassm pS ON m.requisicion_id = pS.requisicion_id
                WHERE m.requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $requisicion_data = $result->fetch_assoc();
        $stmt->close();
        return $requisicion_data;
    }

    public function agregarSiproMadre($cliente, $usuario, $fecha, $total_f, $requisicion_id,  $idClienteSM)
    {
        $sql = "INSERT INTO sipromadre (cliente, usuario, fecha, requisicion_id, total_f, idClienteSM) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sssssi", $cliente, $usuario, $fecha, $total_f, $requisicion_id, $idClienteSM);
        $stmt->execute();
        $stmt->close();
    }

    public function agregarPartidaSM($num_partida, $cantidad, $u_m, $descripcion, $cot_no, $orden_trabajo, $plano, $orden_compra, $orden_salida, $rep_fotografico, $fact_no, $precio_uni, $c_c, $rf, $porcentaje, $requisicion_id)
    {
        $sql = "INSERT INTO partidassm (num_partida, cantidad, u_m, descripcion, cot_no, orden_trabajo, plano, orden_compra, orden_salida, rep_fotografico, fact_no, precio_uni, c_c, rf, porcentaje,requisicion_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("iissssssssssssss", $num_partida, $cantidad, $u_m, $descripcion, $cot_no, $orden_trabajo, $plano, $orden_compra, $orden_salida, $rep_fotografico, $fact_no, $precio_uni, $c_c, $rf, $porcentaje, $requisicion_id);
        $stmt->execute();
        $stmt->close();
    }

    public function showSiproMadre()
    {
        $result = $this->getSiproMadre();

        $usuario = isset($_SESSION["admin"]) ? $_SESSION["admin"]:null;
        
        if ($result->num_rows > 0) {
            $currentSIPRO = null;
            $currentId = null;
            $MadreTable = '';
            $groups = [];

            // Store all rows in an array to use multiple times and group them
            while ($row = $result->fetch_assoc()) {
                $groupKey = $row['cliente'] . $row['usuario'] . $row['fecha'] . $row['requisicion_id'];
                if (!isset($groups[$groupKey])) {
                    $groups[$groupKey] = [];
                }
                $groups[$groupKey][] = $row;
            }

            foreach ($groups as $groupKey => $groupRows) {
                $rowCount = count($groupRows);
                foreach ($groupRows as $index => $row) {
                    if ($index === 0) {
                        if ($currentSIPRO !== null) {
                            // Print the previous Madre table
                            $MadreTable .= '</table>';
                            echo '<td>' . $MadreTable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){ echo '<td style="text-align: center; vertical-align: middle;">';}
                            if($usuario === "Oficina" || $usuario === "AdminSipro"){
                                echo '<a href="../siproMadre/DetallesEmpresas/Acciones/EditSiproMadre.php?requisicion_id=' . $currentId . '">
                                    <button type="button" class="btn btn-warning mb-3">Editar</button>
                                </a>';
                            }
                                echo '<br>';
                                if($usuario === "Oficina" || $usuario === "AdminSipro"){
                                echo '<a href="javascript:void(0);" onclick="confirmDeletion(\'../siproMadre/DetallesEmpresas/Acciones/metodos/eliminarReSiproMadre.php?requisicion_id=' . $currentId . '\')">
                                    <button type="button" class="btn btn-danger mb-3">Eliminar</button>
                                </a>';
                                }
                                echo '</td></tr>';
                        }

                        // Start a new row for a new entrega
                        echo '<tr class="baseD">';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['cliente'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['usuario'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['fecha'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['requisicion_id'] . '</td>';

                        $MadreTable = '<table class="table-sm nested-table">';
                        $MadreTable .= '<tr><th style="text-align: center; vertical-align: middle;">Número de Partida</th><th style="text-align: center; vertical-align: middle;">Cantidad</th><th style="text-align: center; vertical-align: middle;">U.M.</th><th style="text-align: center; vertical-align: middle;">Descripción</th><th style="text-align: center; vertical-align: middle;">Requisición</th><th style="text-align: center; vertical-align: middle;">Numero de Cotización</th><th style="text-align: center; vertical-align: middle;">Orden de Trabajo</th><th style="text-align: center; vertical-align: middle;">Plano</th><th style="text-align: center; vertical-align: middle;">Orden de Compra</th><th style="text-align: center; vertical-align: middle;">Orden de Salida</th><th style="text-align: center; vertical-align: middle;">Rep. Fotográfico</th><th style="text-align: center; vertical-align: middle;">Numero de Factura</th><th style="text-align: center; vertical-align: middle;">Precio Unitario</th><th style="text-align: center; vertical-align: middle;">Total de Factura</th><th style="text-align: center; vertical-align: middle;">Control Calidad</th><th style="text-align: center; vertical-align: middle;">RF</th><th style="text-align: center; vertical-align: middle;">Porcentaje</th><th style="text-align: center; vertical-align: middle;">Estatus</th></tr>';

                        $currentSIPRO = $groupKey;
                        $currentId = $row['requisicion_id'];
                    }
                    $MadreTable .= '<tr>';
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['num_partida'] !== null ? $row['num_partida'] : '') . '</td>';
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['cantidad'] !== null ? $row['cantidad'] : '') . '</td>';
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['u_m'] !== null ? $row['u_m'] : '') . '</td>';
                    $MadreTable .= '<td style="vertical-align: middle;">' . $this->splitDescriptionIntoParagraphs($row['descripcion'], 75) . '</td>';
                    if ($index === 0) {
                        $MadreTable .= '<td style="text-align: center; vertical-align: middle;" rowspan="' . $rowCount . '">' . ($row['requisicion_id'] !== null ? $row['requisicion_id'] : '') . '</td>';
                    }
                    if ($index === 0) {
                        $MadreTable .= '<td style="text-align: center; vertical-align: middle;" rowspan="' . $rowCount . '">' . ($row['cot_no'] !== null ? $row['cot_no'] : '') . '</td>';
                    }
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['orden_trabajo'] !== null ? $row['orden_trabajo'] : '') . '</td>';
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['plano'] !== null ? $row['plano'] : '') . '</td>';
                    if ($index === 0) {
                        $MadreTable .= '<td style="text-align: center; vertical-align: middle;" rowspan="' . $rowCount . '">' . ($row['orden_compra'] !== null ? $row['orden_compra'] : '') . '</td>';
                    }
                    if ($index === 0) {
                        $MadreTable .= '<td style="text-align: center; vertical-align: middle;" rowspan="' . $rowCount . '">' . ($row['orden_salida'] !== null ? $row['orden_salida'] : '') . '</td>';
                    }
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['rep_fotografico'] !== null ? $row['rep_fotografico'] : '') . '</td>';
                    if ($index === 0) {
                        $MadreTable .= '<td style="text-align: center; vertical-align: middle;" rowspan="' . $rowCount . '">' . ($row['fact_no'] !== null ? $row['fact_no'] : '') . '</td>';
                    }
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['precio_uni'] !== null ? $row['precio_uni'] : '') . '</td>';
                    if ($index === 0) {
                        $MadreTable .= '<td style="text-align: center; vertical-align: middle;" rowspan="' . $rowCount . '">' . ($row['total_f'] !== null ? $row['total_f'] : '') . '</td>';
                    }
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['c_c'] !== null ? $row['c_c'] : '') . '</td>';
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['rf'] !== null ? $row['rf'] : '') . '</td>';
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['porcentaje'] !== null ? $row['porcentaje'] : '') . '</td>';
                    $colorEstatus = ''; // Inicializamos la variable de color
                    if ($row['estatus'] !== null) {
                        if ($row['estatus']== "AUTORIZADO") {
                            $colorEstatus = '#00b300'; // Verde
                        } elseif ($row['estatus'] == "NO AUTORIZADO" ) {
                            $colorEstatus = '#ff3333'; // Rojo
                        }
                    }
                    $MadreTable .= '<td style="text-align: center; vertical-align: middle; background-color: ' . $colorEstatus . '; font-weight: bold">' . ($row['estatus'] !== null ? $row['estatus'] : '') . '</td>';
                    $MadreTable .= '</tr>';
                }
            }


            $usuario = isset($_SESSION["admin"]) ? $_SESSION["admin"]:null;

            if ($currentSIPRO !== null) {
                // Print the last Madre table
                $MadreTable .= '</table>';
                echo '<td>' . $MadreTable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){echo '<td style="text-align: center; vertical-align: middle;">';
                
                    echo '<a href="../siproMadre/DetallesEmpresas/Acciones/EditSiproMadre.php?requisicion_id=' . $currentId . '">
                        <button type="button" class="btn btn-warning mb-3">Editar</button>
                    </a>';
                }
                    echo '<br>';
                if($usuario === "Oficina" || $usuario === "AdminSipro"){
                    echo '<a href="javascript:void(0);" onclick="confirmDeletion(\'../siproMadre/DetallesEmpresas/Acciones/metodos/eliminarReSiproMadre.php?requisicion_id=' . $currentId . '\')">
                        <button type="button" class="btn btn-danger mb-3">Eliminar</button>
                    </a>';
                }
                echo '</td></tr>';
            }
        } else {
            echo '<tr><td colspan="6">No hay datos disponibles</td></tr>';
        }
    }


    public function borrarSiproMadreYPartidas($requisicion_id)
    {
        try {
            // Elimina las partidas asociadas
            $sqlPartidas = "DELETE FROM partidassm WHERE requisicion_id = ?";
            $stmtPartidas = $this->connection->prepare($sqlPartidas);
            $stmtPartidas->bind_param("s", $requisicion_id);
            $stmtPartidas->execute();
            $stmtPartidas->close();

            // Elimina el registro en siproMadre
            $sqlMadre = "DELETE FROM sipromadre WHERE requisicion_id = ?";
            $stmtMadre = $this->connection->prepare($sqlMadre);
            $stmtMadre->bind_param("s", $requisicion_id);
            $stmtMadre->execute();
            $stmtMadre->close();

            echo "Registro y partidas eliminadas exitosamente.";
        } catch (Exception $e) {
            echo "Error al eliminar registros: " . $e->getMessage();
        }
    }

    public function EditarSiproMadre($requisicion_id, $cliente, $usuario, $fecha, $total_f, $orden_salida, $cot_no, $orden_compra, $fact_no, $idClienteSM, $requisicion2)
    {
        $sql = "UPDATE sipromadre SET 
                cliente = ?, 
                usuario = ?, 
                fecha = ?, 
                total_f = ?,
                requisicion_id = ?,
                orden_salida = ?,
                cot_no = ?,
                orden_compra = ?,
                fact_no = ?,
                idClienteSM = ?
                WHERE requisicion_id = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sssssssssis", $cliente, $usuario, $fecha, $total_f, $requisicion_id, $orden_salida, $cot_no, $orden_compra, $fact_no, $idClienteSM, $requisicion2);
        $stmt->execute();
        $stmt->close();
    }

    public function EditarPartidaSM($partida_id, $cantidad, $u_m, $descripcion, $cot_no, $orden_trabajo, $plano, $orden_compra, $orden_salida, $rep_fotografico, $fact_no, $precio_uni, $c_c, $rf, $porcentaje, $estatus, $requisicion_id)
    {
        $sql = "UPDATE partidassm SET 
                cantidad = ?, 
                u_m = ?, 
                descripcion = ?, 
                cot_no = ?, 
                orden_trabajo = ?, 
                plano = ?, 
                orden_compra = ?, 
                orden_salida = ?, 
                rep_fotografico = ?, 
                fact_no = ?, 
                precio_uni = ?, 
                c_c = ?, 
                rf = ?, 
                porcentaje = ?,
                estatus = ?,
                requisicion_id = ?
                WHERE id = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("isssssssssssssssi", $cantidad, $u_m, $descripcion, $cot_no, $orden_trabajo, $plano, $orden_compra, $orden_salida, $rep_fotografico, $fact_no, $precio_uni, $c_c, $rf, $porcentaje, $estatus, $requisicion_id, $partida_id);
        $stmt->execute();
        $stmt->close();
    }


    public function getPartidasByRequisicionId($requisicion_id)
    {
        $sql = "SELECT * FROM partidassm WHERE requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $partidas = [];
        while ($row = $result->fetch_assoc()) {
            $partidas[] = $row;
        }
        $stmt->close();
        return $partidas;
    }
    // -----------------------------REQUISICIONES-------------------------------------

    public function getRequisicion($idClienteSM)
    {
        $sql = "SELECT r.cotizacion, r.fecha, r.usuario, r.fecha_envio, r.factura, r.orden_compra, r.idClienteSM, 
                       pR.id, pR.num_partida, pR.cantidad, pR.u_m, pR.descripcion, r.requisicion_id, pR.orden_trabajo, pR.orden_salida, pR.ganancia_ingreso, pR.precio, pR.ganancia_porcentaje 
                FROM requisiciones r
                JOIN partidasreq pR ON r.requisicion_id = pR.requisicion_id 
                WHERE r.idClientesm = $idClienteSM";
        return $this->connection->query($sql);
    }

    function getRequisicion2($requisicion_id)
    {
        $sql = "SELECT r.cotizacion, r.fecha, r.usuario, r.fecha_envio, r.factura, r.orden_compra, r.idClienteSM, 
                       pR.num_partida, pR.cantidad, pR.u_m, pR.descripcion, r.requisicion_id, pR.orden_trabajo, pR.orden_salida, pR.ganancia_ingreso, pR.precio, pR.ganancia_porcentaje 
                FROM requisiciones r
                JOIN partidasreq pR ON r.requisicion_id = pR.requisicion_id 
                WHERE r.requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $requisicion_data = $result->fetch_assoc();
        $stmt->close();
        return $requisicion_data;
    }

    public function showRequisiciones($idClienteSM)
    {
        $result = $this->getRequisicion($idClienteSM);

        $usuario = isset($_SESSION["admin"]) ? $_SESSION["admin"]:null;

        if ($result->num_rows > 0) {
            $currentGroup = null;
            $currentId = null;
            $requisicionTable = '';
            $groups = [];

            // Almacenar todas las filas en un array para agruparlas
            while ($row = $result->fetch_assoc()) {
                $groupKey = $row['cotizacion'] . $row['requisicion_id'] . $row['fecha'] . $row['usuario'] . $row['fecha_envio'] . $row['factura'] . $row['orden_compra'];
                if (!isset($groups[$groupKey])) {
                    $groups[$groupKey] = [];
                }
                $groups[$groupKey][] = $row;
            }

            foreach ($groups as $groupKey => $groupRows) {
                $rowCount = count($groupRows);
                foreach ($groupRows as $index => $row) {
                    if ($index == 0) {
                        if ($currentGroup !== null) {
                            // Impr=imir la tabla anterior
                            $requisicionTable .= '</table>';
                            echo '<td>' . $requisicionTable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){echo '<td style="text-align: center; vertical-align: middle;">';}
                            if($usuario === "Oficina" || $usuario === "AdminSipro"){
                            echo '<a href="../../siproMadre/DetallesEmpresas/Acciones/EditRequisicion.php?requisicion_id=' . $currentId . '">
                                <button type="button" class="btn btn-warning mb-3">Editar/Agregar Faltantes</button>
                            </a>';
                            }
                            echo '<br>';
                            if($usuario === "Oficina" || $usuario === "AdminSipro"){
                            echo '<a href="GenerarPDF/ImprimirRequisiciones.php?requisicion_id=' . $currentId . '">
                                <button type="button" class="btn btn-warning mb-3">Generar PDF P/R</button>
                            </a>';
                            }
                            echo '</td></tr>';
                        }

                        // Iniciar una nueva fila para un nuevo grupo
                        echo '<tr class="baseD">';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['cotizacion'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['requisicion_id'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['fecha'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['usuario'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['fecha_envio'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['factura'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['orden_compra'] . '</td>';

                        $requisicionTable = '<table class="table-sm nested-table">';
                        if($usuario === "Oficina" || $usuario === "AdminSipro"){
                            $requisicionTable .= '<tr><th style="text-align: center; vertical-align: middle;">Número de Partida</th><th style="text-align: center; vertical-align: middle;">Cantidad</th><th style="text-align: center; vertical-align: middle;">Unidad de Medida</th><th style="text-align: center; vertical-align: middle;">Descripción</th><th style="text-align: center; vertical-align: middle;">Orden de Trabajo</th><th style="text-align: center; vertical-align: middle;">Orden de Salida</th><th style="text-align: center; vertical-align: middle;">Ganancia Ingreso</th><th style="text-align: center; vertical-align: middle;">Precio</th><th style="text-align: center; vertical-align: middle;">Ganancia %</th><th>Generar PDF P/P</th></tr>';
                        } else {
                            $requisicionTable .= '<tr><th style="text-align: center; vertical-align: middle;">Número de Partida</th><th style="text-align: center; vertical-align: middle;">Cantidad</th><th style="text-align: center; vertical-align: middle;">Unidad de Medida</th><th style="text-align: center; vertical-align: middle;">Descripción</th><th style="text-align: center; vertical-align: middle;">Orden de Trabajo</th><th style="text-align: center; vertical-align: middle;">Orden de Salida</th><th style="text-align: center; vertical-align: middle;">Ganancia Ingreso</th><th style="text-align: center; vertical-align: middle;">Precio</th><th style="text-align: center; vertical-align: middle;">Ganancia %</th></tr>';
                        }
                        

                        $currentGroup = $groupKey;
                        $currentId = $row['requisicion_id'];
                    }

                    $requisicionTable .= '<tr>';
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['num_partida'] !== null ? $row['num_partida'] : '') . '</td>';
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['cantidad'] !== null ? $row['cantidad'] : '') . '</td>';
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['u_m'] !== null ? $row['u_m'] : '') . '</td>';
                    $requisicionTable .= '<td style="vertical-align: middle;">' . $this->splitDescriptionIntoParagraphs($row['descripcion'], 75) . '</td>';
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['orden_trabajo'] !== null ? $row['orden_trabajo'] : '') . '</td>';
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['orden_salida'] !== null ? $row['orden_salida'] : '') . '</td>';
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle;">$' . ($row['ganancia_ingreso'] !== null ? $row['ganancia_ingreso'] : '') . '</td>';
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle;">$' . ($row['precio'] !== null ? $row['precio'] : '') . '</td>';
                    $color = ''; // Inicializamos la variable de color
                    if ($row['ganancia_porcentaje'] !== null) {
                        if ($row['ganancia_porcentaje'] >= 40) {
                            $color = '#00b300'; // Verde
                        } elseif ($row['ganancia_porcentaje'] > 0 && $row['ganancia_porcentaje'] < 40) {
                            $color = '#e6e600'; // Amarillo
                        } else {
                            $color = '#ff3333'; // Rojo
                        }
                    }
                    $requisicionTable .= '<td style="text-align: center; vertical-align: middle; background-color: ' . $color . '; font-weight: bold">' . ($row['ganancia_porcentaje'] !== null ? $row['ganancia_porcentaje'] : '') . '%</td>';
                    if($usuario === "Oficina" || $usuario === "AdminSipro"){
                        $requisicionTable .= '<td style="text-align: center; vertical-align: middle;"><a href="javascript:void(0);" class="btn btn-warning mb-3 imprimir-partida" data-requisicion-id="' . htmlspecialchars($row['requisicion_id']) . '" data-id-partida="' . htmlspecialchars($row['id']) . '">Generar PDF</a></td>';
                    }
                    $requisicionTable .= '</tr>';
                }
            }

            if ($currentGroup !== null) {
                // Imprimir la última tabla
                $requisicionTable .= '</table>';
                echo '<td>' . $requisicionTable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){echo '<td style="text-align: center; vertical-align: middle;">';}
                if($usuario === "Oficina" || $usuario === "AdminSipro"){
                    echo '<a href="../../siproMadre/DetallesEmpresas/Acciones/EditRequisicion.php?requisicion_id=' . $currentId . '">
                        <button type="button" class="btn btn-warning mb-3">Editar/Agregar Faltantes</button>
                    </a>';
                }
                    echo '<br>';
                if($usuario === "Oficina" || $usuario === "AdminSipro"){
                    echo '<a href="GenerarPDF/ImprimirRequisiciones.php?requisicion_id=' . $currentId . '">
                        <button type="button" class="btn btn-warning mb-3">Generar PDF P/R</button>
                    </a>';
                }
                    echo '</td></tr>';
            }
        } else {
            echo '<tr><td colspan="9">No hay datos disponibles</td></tr>';
        }
    }

    public function EditarRequi($requisicion_id, $fecha_envio)
    {
        $sql = "UPDATE requisiciones SET 
                fecha_envio = ?
                WHERE requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $fecha_envio, $requisicion_id);
        $stmt->execute();
        $stmt->close();
    }

    public function EditarPartidaReq($partida_id, $ganancia_ingreso, $ganancia_porcentaje)
    {
        $sql = "UPDATE partidasreq SET 
                ganancia_ingreso = ?,
                ganancia_porcentaje = ?
                WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssi", $ganancia_ingreso, $ganancia_porcentaje, $partida_id);
        $stmt->execute();
        $stmt->close();
    }

    public function getPartidasByRequisicionId2($requisicion_id)
    {
        $sql = "SELECT * FROM partidasreq WHERE requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $partidas = [];
        while ($row = $result->fetch_assoc()) {
            $partidas[] = $row;
        }
        $stmt->close();
        return $partidas;
    }

    public function getPartidaByIdReq($partida_id)
    {
        $sql = "SELECT * FROM partidasreq WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $partida_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $partida = $result->fetch_assoc();
        $stmt->close();
        return $partida;
    }

    //---------------------------------------ORDENES DE TRABAJO-------------------------------
    public function getOrdenTrabajo($idClienteSM)
    {
        $sql = "SELECT o.usuario, o.fecha_elab, o.idClienteSM, 
                    pT.id, pT.orden_trabajo, pT.cantidad, pT.descripcion, o.requisicion_id, pT.reporte_fotos, pT.muestra, pT.plano, pT.sobre_pieza, pT.material, pT.fecha_entrega 
                FROM orden_de_trabajo o
                JOIN partidastrabajo pT ON o.requisicion_id = pT.requisicion_id 
                WHERE o.idClientesm = $idClienteSM";
        return $this->connection->query($sql);
    }

    function getOrdenTrabajo2($requisicion_id)
    {
        $sql = "SELECT  o.usuario, o.fecha_elab, o.idClienteSM, 
                    pT.orden_trabajo, pT.cantidad, pT.descripcion, o.requisicion_id, pT.reporte_fotos, pT.muestra, pT.plano, pT.sobre_pieza, pT.material, pT.fecha_entrega 
                FROM orden_de_trabajo o
                JOIN partidastrabajo
                pT ON o.requisicion_id = pT.requisicion_id 
                WHERE o.requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $requisicion_data = $result->fetch_assoc();
        $stmt->close();
        return $requisicion_data;
    }

    public function showOrdenesTrabajo($idClienteSM)
    {
        $result = $this->getOrdenTrabajo($idClienteSM);

        $usuario = isset($_SESSION["admin"]) ? $_SESSION["admin"]:null;

        if ($result->num_rows > 0) {
            $currentGroup = null;
            $currentId = null;
            $trabajotable = '';
            $groups = [];

            // Almacenar todas las filas en un array para agruparlas
            while ($row = $result->fetch_assoc()) {
                $groupKey = $row['requisicion_id'] . $row['usuario'] . $row['fecha_elab'];
                if (!isset($groups[$groupKey])) {
                    $groups[$groupKey] = [];
                }
                $groups[$groupKey][] = $row;
            }

            foreach ($groups as $groupKey => $groupRows) {
                $rowCount = count($groupRows);
                foreach ($groupRows as $index => $row) {
                    if ($index === 0) {
                        if ($currentGroup !== null) {
                            // Imprimir la tabla anterior
                            $trabajotable .= '</table>';
                            echo '<td>' . $trabajotable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){echo '<td style="text-align: center; vertical-align: middle;">';}
                            if($usuario === "Oficina" || $usuario === "AdminSipro"){
                                echo '<a href="../../siproMadre/DetallesEmpresas/Acciones/EditOrdenT.php?requisicion_id=' . $currentId . '">
                                    <button type="button" class="btn btn-warning mb-3">Editar/Agregar Faltantes</button>
                                </a>';
                            }
                            echo '<br>';
                            echo '</td></tr>';
                        }

                        // Iniciar una nueva fila para un nuevo grupo
                        echo '<tr class="baseD">';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['requisicion_id'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['usuario'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['fecha_elab'] . '</td>';

                        $trabajotable = '<table class="table-sm nested-table">';
                        if($usuario === "Oficina" || $usuario === "AdminSipro"){
                            $trabajotable .= '<tr><th style="text-align: center; vertical-align: middle;">Orden de Trabajo</th><th style="text-align: center; vertical-align: middle;">Cantidad</th><th style="text-align: center; vertical-align: middle;">Descripción</th><th style="text-align: center; vertical-align: middle;">Requisición</th><th style="text-align: center; vertical-align: middle;">Reporte Fotográfico</th><th style="text-align: center; vertical-align: middle;">Muestra</th><th style="text-align: center; vertical-align: middle;">Plano</th><th style="text-align: center; vertical-align: middle;">Sobre Pieza</th><th style="text-align: center; vertical-align: middle;">Material</th><th style="text-align: center; vertical-align: middle;">Fecha de Entrega</th><th>Generar PDF P/P</th></tr>';
                        } else{
                            $trabajotable .= '<tr><th style="text-align: center; vertical-align: middle;">Orden de Trabajo</th><th style="text-align: center; vertical-align: middle;">Cantidad</th><th style="text-align: center; vertical-align: middle;">Descripción</th><th style="text-align: center; vertical-align: middle;">Requisición</th><th style="text-align: center; vertical-align: middle;">Reporte Fotográfico</th><th style="text-align: center; vertical-align: middle;">Muestra</th><th style="text-align: center; vertical-align: middle;">Plano</th><th style="text-align: center; vertical-align: middle;">Sobre Pieza</th><th style="text-align: center; vertical-align: middle;">Material</th><th style="text-align: center; vertical-align: middle;">Fecha de Entrega</th></tr>';
                        }
                        

                        $currentGroup = $groupKey;
                        $currentId = $row['requisicion_id'];
                    }

                    $trabajotable .= '<tr>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['orden_trabajo'] !== null ? $row['orden_trabajo'] : '') . '</td>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['cantidad'] !== null ? $row['cantidad'] : '') . '</td>';
                    // $trabajotable .= '<td style="vertical-align: middle;">' . ($row['descripcion'] !== null ? $row['descripcion'] : '') . '</td>';

                    $trabajotable .= '<td style="vertical-align: middle;">' . $this->splitDescriptionIntoParagraphs($row['descripcion'], 75) . '</td>';

                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['requisicion_id'] !== null ? $row['requisicion_id'] : '') . '</td>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['reporte_fotos'] !== null ? $row['reporte_fotos'] : '') . '</td>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['muestra'] !== null ? $row['muestra'] : '') . '</td>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['plano'] !== null ? $row['plano'] : '') . '</td>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['sobre_pieza'] !== null ? $row['sobre_pieza'] : '') . '</td>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['material'] !== null ? $row['material'] : '') . '</td>';
                    $trabajotable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['fecha_entrega'] !== null ? $row['fecha_entrega'] : '') . '</td>';
                    if($usuario === "Oficina" || $usuario === "AdminSipro"){
                        $trabajotable .= '<td style="text-align: center; vertical-align: middle;"><a href="javascript:void(0);" class="btn btn-warning mb-3 imprimir-partida" data-requisicion-id="' . htmlspecialchars($row['requisicion_id']) . '" data-orden-trabajo="' . htmlspecialchars($row['id']) . '">Generar PDF</a></td>';
                    }
                    $trabajotable .= '</tr>';
                }
            }

            if ($currentGroup !== null) {
                // Imprimir la última tabla
                $trabajotable .= '</table>';
                echo '<td>' . $trabajotable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){echo '<td style="text-align: center; vertical-align: middle;">';}
                if($usuario === "Oficina" || $usuario === "AdminSipro"){
                    echo '<a href="../../siproMadre/DetallesEmpresas/Acciones/EditOrdenT.php?requisicion_id=' . $currentId . '">
                        <button type="button" class="btn btn-warning mb-3">Editar/Agregar Faltantes</button>
                    </a>';
                }
                    echo '<br>
                    </td></tr>';
            }
        } else {
            echo '<tr><td colspan="6">No hay datos disponibles</td></tr>';
        }
    }

    private function splitDescriptionIntoParagraphs($description, $maxLength)
    {
        $paragraphs = [];
        $start = 0;

        while ($start < strlen($description)) {
            $end = $start + $maxLength;
            $slice = substr($description, $start, $end - $start);

            // Buscar el último espacio en blanco para no cortar palabras
            $lastSpaceIndex = strrpos($slice, ' ');

            if ($lastSpaceIndex !== false && $end < strlen($description)) {
                $end = $start + $lastSpaceIndex;
            }

            $paragraphs[] = substr($description, $start, $end - $start);
            $start = $end;
        }

        return implode('<br>', array_map('htmlspecialchars', $paragraphs));
    }

    public function getPartidasByRequisicionId3($requisicion_id)
    {
        $sql = "SELECT * FROM partidastrabajo WHERE requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $partidas = [];
        while ($row = $result->fetch_assoc()) {
            $partidas[] = $row;
        }
        $stmt->close();
        return $partidas;
    }

    public function EditarOT($requisicion_id, $fecha_elab)
    {
        $sql = "UPDATE orden_de_trabajo SET 
                fecha_elab = ?
                WHERE requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $fecha_elab, $requisicion_id);
        $stmt->execute();
        $stmt->close();
    }

    public function EditarPartidaOT($partida_id, $muestra, $sobre_pieza, $material, $fecha_entrega)
    {
        $sql = "UPDATE partidastrabajo SET 
                muestra = ?,
                sobre_pieza = ?,
                material = ?,
                fecha_entrega = ?
                WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssi", $muestra, $sobre_pieza, $material, $fecha_entrega, $partida_id);
        $stmt->execute();
        $stmt->close();
    }

    public function getPartidaByOrdenTrabajo($ordenTrabajo)
    {
        $sql = "SELECT * FROM partidastrabajo WHERE orden_trabajo = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $ordenTrabajo);
        $stmt->execute();
        $result = $stmt->get_result();
        $partida = $result->fetch_assoc();
        $stmt->close();
        return $partida;
    }

    //---------------------------------------SALIDAS-------------------------------
    public function getSalidas($idClienteSM)
    {
        $sql = "SELECT os.cliente, os.usuario, os.fecha_de_entrega, os.numero_de_salida, os.idClienteSM, 
                       pS.id, pS.cantidad, pS.descripcion, os.requisicion_id, pS.orden_de_trabajo, pS.control_de_calidad 
                FROM orden_salida os
                JOIN partidassa pS ON os.requisicion_id = pS.requisicion_id 
                WHERE os.idClientesm = $idClienteSM";
        return $this->connection->query($sql);
    }

    function getSalidas2($requisicion_id)
    {
        $sql = "SELECT os.cliente, os.usuario, os.fecha_de_entrega, os.numero_de_salida, os.idClienteSM, 
                       pS.cantidad, pS.descripcion, os.requisicion_id, pS.orden_de_trabajo, pS.control_de_calidad 
                FROM orden_salida os
                JOIN partidassa pS ON os.requisicion_id = pS.requisicion_id
                WHERE os.requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $requisicion_data = $result->fetch_assoc();
        $stmt->close();
        return $requisicion_data;
    }

    public function showSalidas($idClienteSM)
    {
        $usuario = isset($_SESSION["admin"]) ? $_SESSION["admin"]:null;

        $result = $this->getSalidas($idClienteSM);
        if ($result->num_rows > 0) {
            $currentGroup = null;
            $currentId = null;
            $salidastable = '';
            $groups = [];

            // Almacenar todas las filas en un array para agruparlas
            while ($row = $result->fetch_assoc()) {
                $groupKey = $row['cliente'] . $row['usuario'] . $row['fecha_de_entrega'] . $row['numero_de_salida'] . $row['requisicion_id'];
                if (!isset($groups[$groupKey])) {
                    $groups[$groupKey] = [];
                }
                $groups[$groupKey][] = $row;
            }

            foreach ($groups as $groupKey => $groupRows) {
                $rowCount = count($groupRows);
                foreach ($groupRows as $index => $row) {
                    if ($index === 0) {
                        if ($currentGroup !== null) {
                            // Imprimir la tabla anterior
                            $salidastable .= '</table>';
                            echo '<td>' . $salidastable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){echo '<td style="text-align: center; vertical-align: middle;">';}
                            if($usuario === "Oficina" || $usuario === "AdminSipro"){
                            echo '<a href="../../siproMadre/DetallesEmpresas/Acciones/EditSalida.php?requisicion_id=' . $currentId . '">
                                <button type="button" class="btn btn-warning mb-3">Editar/Agregar Faltantes</button>
                            </a>';
                            }
                             echo '<br>';
                             if($usuario === "Oficina" || $usuario === "AdminSipro"){
                            echo '<a href="GenerarPDF/ImprimirSalidas.php?requisicion_id=' . $currentId . '">
                                <button type="button" class="btn btn-warning mb-3">Generar PDF P/R</button>
                            </a>';
                             }
                            echo '</td></tr>';
                        }

                        // Iniciar una nueva fila para un nuevo grupo
                        echo '<tr class="baseD">';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['cliente'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['usuario'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['fecha_de_entrega'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['numero_de_salida'] . '</td>';
                        echo '<td style="text-align: center; vertical-align: middle;">' . $row['requisicion_id'] . '</td>';

                        $salidastable = '<table class="table-sm nested-table">';
                        if($usuario === "Oficina" || $usuario === "AdminSipro"){
                            $salidastable .= '<tr><th style="text-align: center; vertical-align: middle;">Cantidad</th><th style="text-align: center; vertical-align: middle;">Descripcion</th><th style="text-align: center; vertical-align: middle;">Requisicion</th><th style="text-align: center; vertical-align: middle;">Orden de Trabajo</th><th style="text-align: center; vertical-align: middle;">Control Calidad</th><th>Generar PDF P/P</th></tr>';
                        } else{
                            $salidastable .= '<tr><th style="text-align: center; vertical-align: middle;">Cantidad</th><th style="text-align: center; vertical-align: middle;">Descripcion</th><th style="text-align: center; vertical-align: middle;">Requisicion</th><th style="text-align: center; vertical-align: middle;">Orden de Trabajo</th><th style="text-align: center; vertical-align: middle;">Control Calidad</th></tr>';
                        }

                        $currentGroup = $groupKey;
                        $currentId = $row['requisicion_id'];
                    }

                    $salidastable .= '<tr>';

                    $salidastable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['cantidad'] !== null ? $row['cantidad'] : '') . '</td>';
                    $salidastable .= '<td style="vertical-align: middle;">' . $this->splitDescriptionIntoParagraphs($row['descripcion'], 75) . '</td>';
                    $salidastable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['requisicion_id'] !== null ? $row['requisicion_id'] : '') . '</td>';
                    $salidastable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['orden_de_trabajo'] !== null ? $row['orden_de_trabajo'] : '') . '</td>';
                    $salidastable .= '<td style="text-align: center; vertical-align: middle;">' . ($row['control_de_calidad'] !== null ? $row['control_de_calidad'] : '') . '</td>';
                    if($usuario === "Oficina" || $usuario === "AdminSipro"){
                        $salidastable .= '<td style="text-align: center; vertical-align: middle;"><a href="javascript:void(0);" class="btn btn-warning mb-3 imprimir-partida" data-requisicion-id="' . htmlspecialchars($row['requisicion_id']) . '" data-id-partida="' . htmlspecialchars($row['id']) . '">Generar PDF</a></td>';
                    }
                    $salidastable .= '</tr>';
                }
            }

            if ($currentGroup !== null) {
                // Imprimir la última tabla
                $salidastable .= '</table>';
                echo '<td>' . $salidastable . '</td>'; if($usuario === "Oficina" || $usuario === "AdminSipro"){echo '<td style="text-align: center; vertical-align: middle;">';}
                if($usuario === "Oficina" || $usuario === "AdminSipro"){
                    echo '<a href="../../siproMadre/DetallesEmpresas/Acciones/EditSalida.php?requisicion_id=' . $currentId . '">
                        <button type="button" class="btn btn-warning mb-3">Editar/Agregar Faltantes</button>
                    </a>';
                }
                    echo '<br>';
                if($usuario === "Oficina" || $usuario === "AdminSipro"){
                    echo '<a href="GenerarPDF/ImprimirSalidas.php?requisicion_id=' . $currentId . '">
                        <button type="button" class="btn btn-warning mb-3">Generar PDF P/R</button>
                    </a>';
                }
                    echo '</td></tr>';
            }
        } else {
            echo '<tr><td colspan="7">No hay datos disponibles</td></tr>';
        }
    }

    public function getPartidasByRequisicionId4($requisicion_id)
    {
        $sql = "SELECT * FROM partidassa WHERE requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $requisicion_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $partidas = [];
        while ($row = $result->fetch_assoc()) {
            $partidas[] = $row;
        }
        $stmt->close();
        return $partidas;
    }

    public function getNumeroSalida() {
        $sql = "SELECT MAX(orden_salida) as max_salida FROM partidassm";
        $result = $this->connection->query($sql);
        
        if (!$result) {
            die('Error en la consulta: ' . $this->connection->error);
        }
    
        $row = $result->fetch_assoc();
        
        // Usar el recuento como número de salida (incrementando en 1)
        $numeroSalida = $row['max_salida'] + 1;
    
        return $numeroSalida;
    }

    public function EditarOS($requisicion_id, $fecha_de_entrega)
    {
        $sql = "UPDATE orden_salida SET 
                fecha_de_entrega = ?
                WHERE requisicion_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $fecha_de_entrega, $requisicion_id);
        $stmt->execute();
        $stmt->close();
    }

    public function getPartidaByIdSa($partida_id)
    {
        $sql = "SELECT * FROM partidassa WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $partida_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $partida = $result->fetch_assoc();
        $stmt->close();
        return $partida;
    }
    
    public function getPartidaByIdOt($partida_id)
    {
        $sql = "SELECT * FROM partidastrabajo WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $partida_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $partida = $result->fetch_assoc();
        $stmt->close();
        return $partida;
    }

    //---------------------------------------------------

    public function agregarAbreviatura($nombreEmpresa, $abreviatura)
    {
        $sql = "INSERT INTO abreviaturasempresa (nombreEmpresa, abreviatura) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $nombreEmpresa, $abreviatura);
        $stmt->execute();
        $stmt->close();
    }

    function getAbreviaturas()
    {
        $sql = 'SELECT id, nombreEmpresa, abreviatura FROM abreviaturasempresa ORDER BY nombreEmpresa';
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->showAbreviaturas($row['id'], $row['nombreEmpresa'], $row['abreviatura']);
            }
        }
    }

    function showAbreviaturas($id, $nombreEmpresa, $abreviatura)
    {
        // Resaltar la fila si coincide con la búsqueda
        echo '<li class="list-group-item list-item">';
        echo '<i class="fas fa-angle-double-right icon" style="padding-left: 8px; color:red"></i>';
        echo '<span class="item-text">' . $nombreEmpresa . ' /  ' .  $abreviatura . '</span>';
        echo '<td><a href="javascript:void(0);" onclick="confirmBorrado(\'metodos/deleteAbreviatura.php?id=' . $id . '\')"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
        echo '</li>';
    }

    public function eliminarAbreviatura($id)
    {
        $sql = "DELETE FROM abreviaturasempresa WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getLastRequisitionNumber($abreviatura, $year)
    {
        $sql = "SELECT MAX(CAST(SUBSTRING_INDEX(requisicion_id, '-', -1) AS UNSIGNED)) as last_number 
                FROM sipromadre 
                WHERE requisicion_id LIKE ? AND requisicion_id LIKE ?";
        $stmt = $this->connection->prepare($sql);
        $abreviaturaParam = $abreviatura . '%';
        $yearParam = '%' . $year . '%';
        $stmt->bind_param('ss', $abreviaturaParam, $yearParam);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['last_number'] ?: 0; // Devuelve 0 si no hay resultados
    }
}
