<?php
session_start();

$host = 'localhost';
$bd = 'SistemaJudicial';
$user = 'postgres';
$pass = 'Kiernan.14';

$conexion = pg_connect("host=$host dbname=$bd user=$user password=$pass");

if (!$conexion) {
    echo "Error al conectar a la base de datos.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['usuario'];
    $contraseña = $_POST['contrasena'];

    $query = ("INSERT INTO demandados(nombre, apellido, casa, calle, ciudad, departamento, id, sexo, genero, numero, delitos)
    VALUES ('_REQUEST[nombre1]', '_REQUEST[apellido1]', '_REQUEST[casa1]', '_REQUEST[calle1]', '_REQUEST[ciudad1]', '_REQUEST[departamento1]'
    '_REQUEST[id1]', '_REQUEST[sexo1]', '_REQUEST[genero1]', '_REQUEST[numero], '_REQUEST[delitos1]'')");

    $consulta = pg_query($conexion, $query);
        if ($consulta) {
            header("Location: Infotestigo.html"); // Redirigir a la página principal
            exit;
        } else {
            echo 'Error al insertar datos.';
        }
}



pg_close($conexion);
?>