<?php
$id = $_GET["id"];
$cq = $_GET["comoque"];
$servername = "localhost:3307";
$username = "leonardo";
$password = "1234";
$dbname = "usuarios";

$msg = "";
if ($cq == "actualizar") {
    $usu = $_POST["txtUsuario"];
    $con = $_POST["txtContrasena"];
    $nom = $_POST["txtNombreCompleto"];
    $has = md5($con . "supercontra");

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE tbl_usuarios SET user='" . $usu . "',      
    password='" . $con . "', fullname='" . $nom . "', hash='" . $has . "' WHERE id=" . $id;
    #echo $sql;
    #exit();

    if ($conn->query($sql) === TRUE) {
        $msg = '<div class="alert alert-success" role="alert">
        Se actualizo correctamente
      </div>';
    } else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
/****************************/
$u = "";
$p = "";
$n = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_usuarios WHERE id=" . $id; // linea configurada para hash
//echo $sql;
//exit();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $u = $row["user"];
        $p = $row["password"];
        $n = $row["fullname"];
    }
}

$conn->close();


?>

<html>

<head>
    <title>Agregar nuevos registros</title>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <?php echo $msg ?>
        <form action="editarregistro.php?comoque=actualizar&id=<?php echo $id; ?>" method="POST" class="shadow-lg p-3 mb-5 bg-body rounded">

            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Usuario</span>
                        <input value="<?php echo $u; ?>" name="txtUsuario" type="text" class="form-control" placeholder="Ingresa solo letras" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Contraseña</span>
                        <input value="<?php echo $p; ?>" name="txtContrasena" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nombre completo</span>
                        <input value="<?php echo $n; ?>" name="txtNombreCompleto" type="text" class="form-control" placeholder="Ingresa tu nombre completo" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-warning" value="Actualizar">
                </div>
            </div>
        </form>
    </div>

    <script src="boost/js/bootstrap.bundle.min.js"></script>


</body>

</html>