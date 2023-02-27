<html>

<head>

<body> <!--codigo del color de fondo-->
    <title> Login - Ingreso al sistema</title>

    <h1>
        <center> Bienvenido al sistema </center>
    </h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>
        <form action="procesar.php" method="POST">
            <center>
                <table border> <!-- probando para la tabla -->
                    <tr>
                        <td><label>Usuario:<input type="text" name="txtUsuario" placeholder="Nombre de usuario"></label></td>


                        <td><label>Contrase&ntilde;a:<input type="password" name="txtContrasena" placeholder="password"></label></td>
                    </tr>
                    <br>
                    <table>
                        <br>
                        <center><input type="submit" value="Acceder"></center>
                    </table>
            </center>
            </table>
            <center>
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
            </center>
        </form>
    </body>
</body> <!--codigo del color de fondo-->

</html>