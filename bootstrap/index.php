<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ingreso al sistema</title>
    <link rel="stylesheet" href="../../bootstrap/boost/css/bootstrap.min.css">
</head>

<body>


    <div class="container">
        <h1>Bienvenido al sistema</h1>

        <form action="procesar.php" method="POST" class="row g-4 shadow-lg p-3 mb-5 bg-body rounded">
            <div class="col-auto">
                <label>Usuario:</label>
                <input type="text" name="txtUsuario" placeholder="Nombre de usuario">
            </div>
            <br>
            <div>
                <label>Contraseña:</label>
                <input type="password" name="txtContrasena" placeholder="Password">
            </div>
            <br>
            <div>
                <input type="submit" value="Acceder" class="btn btn-primary mb-3">
            </div>

            <?php

            if ($_POST) {
                $respuesta = $_GET["algo"];
                switch ($respuesta) {
                    case "1":
                        echo "<br>Existen más usuarios con los mismos datos de acceso, consulte este error al adminsitrador";
                        break;
                    case "2":
                        echo "<br>Los datos de acceso son incorrectosssssss";
                        break;
                    default: /*no hago nada*/
                        break;
                }
            }

            ?>

        </form>
    </div>




    <script src="../../bootstrap/boost/js/bootstrap.bundle.min.js"></script>
</body>

</html>