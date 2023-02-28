<?php
if ($_POST) {
    $cq = $_GET["comoque"];
    $msg = "";

    if ($cq == "guardar") {
        // si es valido ejecutar la setencia de abajo
        $usu = $_POST["txtUsuario"];
        $con = $_POST["txtContrasena"];
        $nom = $_POST["txtNombreCompleto"];
        $has = md5($con);
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

        $sql = "INSERT INTO tbl_usuarios (id,user,password,fullname,hash)
        VALUES (null,'" . $usu . "', '" . $con . "', '" . $nom . "', '" . $has . "')";
        //echo $sql;
        //exit();

        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success" role="alert">
            El registro del usuario fue exitoso
          </div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
            Error' . $sql . '
          </div>';
            //$msg = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
// guardar pertenecer al query del formulario





?>


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
        <?php echo $msg; ?>
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
        <form action="agregar_registro.php?comoque=guardar" method="POST">
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Usuario</span>
                        <input name="txtUsuario" type="text" class="form-control" placeholder="Ingresa solo letras" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Contraseña</span>
                        <input name="txtContrasena" type="password" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nombre completo</span>
                        <input name="txtNombreCompleto" type="text" class="form-control" placeholder="Ingresa tu nombre completo" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-warning" value="Registrar Usuario">
                </div>
            </div>
        </form>
    </div>

    <script src="boost/js/bootstrap.bundle.min.js"></script>
</body>

</html>