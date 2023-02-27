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
            $msg = "Se registro correctamente";
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
// guardar pertenecer al query del formulario





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


                    <!--en esta sección va la lectura de registros-->
                    <form action="agregar_registro.php?comoque=guardar" method="POST">
                        <lable>Usuario::<input type="text" name="txtUsuario"></lable><br>
                        <lable>Contraseña::<input type="text" name="txtContrasena"></lable><br>
                        <lable>Nombre Completo::<input type="text" name="txtNombreCompleto"></lable><br>
                        <input type="submit" value="Registrar">
                    </form>
                    <!--en esta sección va la lectura de registros-->
                </td>
            </tr>
            <tr>
                <td>Demostracion de app</td>
            </tr>
        </table>
    </center>
</body>

</html>