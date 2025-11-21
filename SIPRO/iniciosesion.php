<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Inicio de Sesión</title>
    <link rel="icon" href="img/SIPROviñe.png" />
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen" href="css/particulas.css">

    <link rel="shortcut icon" href="../img/SIPROviñe.png" />
    <style>
        .img {
            width: 100px;
            height: 100px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }
        .rotate {
            animation: spin 20s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <div id="particles-js">
        <div class="panel" style="display: block;">
            <form id="login-form" action="php/validar.php" method="post">
                <div class="img">
                <img src="img/SIPROviñe.png" alt="Imagen" class="rotate logo">
                </div>
                <div>
                <img src="img/siproPalabra.png" alt="Imagen" class="logo" style="margin-bottom:-52px; margin-top:20px;">
                </div>
                <div class="form-group">
                    <i class="fa fa-user" style="color: black; margin-top:50px;"></i>
                    <input style="border-color: black; margin-top:50px;" type="text" id="username" name="username" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <i class="fa fa-lock" style="color: black;"></i>
                    <input style="border-color: black;" type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" id="boto" style="--color: rgb(230, 53, 22); font-size: 20px;"><span>Entrar</span><i></i></a></button>
                <a href="principal.php" style="text-decoration: underline; color: black; font-weight: bold; color: black;" id="error-message">Regresar</a>
                <p id="error-message" style="color: black; font-weight: bold">&copy; 2024 SIPRO</p>
            </form>
        </div>
    </div>

    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>

    <script>
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
                count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>
</body>

</html>