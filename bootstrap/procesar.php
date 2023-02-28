<?php
$usr = $_POST["txtUsuario"];
$pwd = $_POST["txtContrasena"];
$hashGenerada = md5($pwd); // nuevo ageragado para hash
/***************************/
$servername = "localhost:3307";
$username = "leonardo";
$password = "1234";
$dbname = "usuarios"; //

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_usuarios WHERE user='" . $usr . "' && password='" . $pwd . "' && hash='" . $hashGenerada . "'"; // linea configurada para hash
//echo $sql;
//exit();
$result = $conn->query($sql);
$coincidencias = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Usuario: " . $row["user"]. " - Contraseña: " . $row["password"]. "<br>";
        $coincidencias++;
    }
} else {
    //echo "0 results";
}
$conn->close();

//exit();

/***************************/
if ($coincidencias > 0) {
    if ($coincidencias == 1) {
        //entré al sistema correctamente
        //echo "Bienvenido al sistema";
        header('Location: sistema.php');
    } else {
        //la contraseña está incorrecta
        //echo "La contraseña es incorrecta";
        header('Location: index.php?algo=1');
    }
} else {
    //cuando el usr no es abel
    //echo "El usuario es incorrecto";
    header('Location: index.php?algo=2');
}
