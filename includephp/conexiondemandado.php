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

    $query = ("INSERT INTO demandados(nombre, apellido, casa, calle, ciudad, departamento, id, sexo, genero, antecedentes, delitos)
    VALUES ('_REQUEST[nombre]', '_REQUEST[apellido]', '_REQUEST[casa]', '_REQUEST[calle]', '_REQUEST[ciudad]', '_REQUEST[departamento]'
    '_REQUEST[id]', '_REQUEST[sexo]', '_REQUEST[genero]', '_REQUEST[antecedentes], '_REQUEST[delitos]'')");

    $consulta = pg_query($conexion, $query);
        if ($consulta) {
            header("Location: Infodemandante.html"); // Redirigir a la página principal
            exit;
        } else {
            echo 'Error al insertar datos.';
        }
}



pg_close($conexion);
?>