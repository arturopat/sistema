<html>

<head>
    <title>Bienvenido</title>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <table border="1">
            <tr>
                <td><img src="imagenes/cabecera.jpeg"> </td>
            </tr>
            <tr>
                <td><a href="agregar_registro.php"> Agregar registro</a></td>
            </tr>
            <tr>
                <td>
                    <!--en esta sección va la lectura de registros-->
                    <?php
                    $servername = "localhost:3307";
                    $username = "leonardo";
                    $password = "1234";
                    $dbname = "usuarios";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM tbl_usuarios";
                    //echo $sql;
                    //exit();
                    $result = $conn->query($sql);
                    $coincidencias = 0;
                    if ($result->num_rows > 0) {
                        echo "<br>Lista de usuarios registrados<table  border='1'>";
                        echo "<tr> <td>USUARIO</td> <td>CONTRASEÑA</td> <td>NOMBRE COMPLETO</td> <td>HASH</td> <td></td> <td></td> </tr>";
                        while ($row = $result->fetch_assoc()) {
                            //echo "id: " . $row["id"]. " - Usuario: " . $row["user"]. " - Contraseña: " . $row["password"]. "<br>";
                            echo "<tr>";
                            echo "<td>" . $row["user"] . "</td>";
                            echo "<td>" . $row["password"] . "</td>";
                            echo "<td>" . $row["fullname"] . "</td>";
                            echo "<td>" . $row["hash"] . "</td>";
                            echo "<td><a href='editarregistro.php?id=" . $row["id"] . "'><img  src='imagenes/editar.png'></a></td>";
                            echo "<td><a href='eliminarregistro.php?id=" . $row["id"] . "'><img  src='imagenes/borrar.png'></a></td>";
                            echo "</tr>";
                            $coincidencias++;
                        }
                        echo "</table><br>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();

                    ?>
                    <!--en esta sección va la lectura de registros-->
                </td>
            </tr>
            <tr>
                <td>Demostracion de appWeb</td>
            </tr>
        </table>
    </center>
</body>

</html>