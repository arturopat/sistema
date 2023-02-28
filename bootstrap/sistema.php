<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="../../bootstrap/boost/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Simple header</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="sistema.php" class="nav-link active" aria-current="page">Inicio</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Usuarios</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Productos</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Cuentas</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Creditos</a></li>
            </ul>
        </header>
    </div>

    <div class="container">
        <table class="table shadow-lg p-3 mb-5 bg-body rounded">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col"><a href="agregar_registro.php" class="btn btn-success">Nuevo</a></th>


                </tr>
            </thead>
            <tbody>
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
                    while ($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"]. " - Usuario: " . $row["user"]. " - Contraseña: " . $row["password"]. "<br>";
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["id"] . "</th>";
                        echo "<td>" . $row["user"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["fullname"] . "</td>";
                        // echo "<td>" . $row["hash"] . "</td>";
                        echo "<td><a href='editarregistro.php?id=" . $row["id"] . "' class='btn btn-primary'>editar</a></td>";
                        echo "<td><a href='eliminarregistro.php?id=" . $row["id"] . "' class='btn btn-danger'>eliminar</a></td>";
                        echo "</tr>";
                        $coincidencias++;
                    }
                }
                $conn->close();

                ?>

            </tbody>
        </table>
    </div>



    <script src="boost/js/bootstrap.bundle.min.js"></script>
</body>

</html>