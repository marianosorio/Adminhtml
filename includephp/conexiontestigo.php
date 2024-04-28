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

    $query = ("INSERT INTO demandados(nombre, apellido, casa, calle, ciudad, departamento, id, sexo, genero, relacion)
    VALUES ('_REQUEST[nombre2]', '_REQUEST[apellido2]', '_REQUEST[casa2]', '_REQUEST[calle2]', '_REQUEST[ciudad2]', '_REQUEST[departamento2]'
    '_REQUEST[id2]', '_REQUEST[sexo2]', '_REQUEST[genero2]', '_REQUEST[relacion]')");

    $consulta = pg_query($conexion, $query);
        if ($consulta) {
            header("Location: Infopolicia.html"); // Redirigir a la página principal
            exit;
        } else {
            echo 'Error al insertar datos.';
        }
}



pg_close($conexion);
?>