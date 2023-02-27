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
    password='" . $con . "', fullname'" . $nom . "', hash='" . $has . "' WHERE id=" . $id;
    #echo $sql;
    #exit();

    if ($conn->query($sql) === TRUE) {
        $msg = "Se actualizo correctamente";
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>
        <table border="1">
            <tr>
                <td><img src="imagenes/cabecera.jpeg"> </td>
            </tr>
            <tr>
                <td>
                    <a href="sistema.php"> Inicio</a>
                    <a href="agregar_registro.php"> Agregar registro</a>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $msg; ?>
                    <!--en esta sección va la lectura de registros-->
                    <form action="editarregistro.php?comoque=actualizar&id=<?php echo $id; ?>" method="POST">
                        <lable>Usuario::<input type="text" name="txtUsuario" value="<?php echo $u; ?>"></lable><br>
                        <lable>Contraseña::<input typed="text" name="txtContrasena" value="<?php echo $p; ?>"></lable><br>
                        <lable>Nombre Completo::<input type="text" name="txtNombreCompleto" value="<?php echo $n; ?>"></lable><br>
                        <input type="submit" value="Actualizar">
                    </form>
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