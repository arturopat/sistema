<?php
$id = $_GET["id"];
$cq = $_GET["comoque"];
$servername = "localhost:3307";
$username = "leonardo";
$password = "1234";
$dbname = "usuarios";

$msg = "";
if ($cq == "eliminar") {


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE from tbl_usuarios WHERE id=" . $id;
    #echo $sql;
    #exit();

    if ($conn->query($sql) === TRUE) {
        $msg = "Se eliminó correctamente";
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
                    ¿Esta seguro que desea eliminar el registro?
                    <!--en esta sección va la lectura de registros-->
                    <form action="eliminarregistro.php?comoque=eliminar&id=<?php echo $id; ?>" method="POST">
                        <lable>Usuario::<input disabled type="text" name="txtUsuario" value="<?php echo $u; ?>"></lable><br>
                        <lable>Contraseña::<input disabled typed="text" name="txtContrasena" value="<?php echo $p; ?>"></lable><br>
                        <lable>Nombre Completo::<input disabled type="text" name="txtNombreCompleto" value="<?php echo $n; ?>"></lable><br>
                        <input type="submit" value="SI">
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