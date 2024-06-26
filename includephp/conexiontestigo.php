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

    $query = "INSERT INTO demandados(nombre, apellido, casa, calle, ciudad, departamento, id, sexo, genero, relacion) 
              VALUES ('" . pg_escape_string($_REQUEST['nombre2']) . "', 
                      '" . pg_escape_string($_REQUEST['apellido2']) . "', 
                      '" . pg_escape_string($_REQUEST['casa2']) . "', 
                      '" . pg_escape_string($_REQUEST['calle2']) . "', 
                      '" . pg_escape_string($_REQUEST['ciudad2']) . "', 
                      '" . pg_escape_string($_REQUEST['departamento2']) . "', 
                      '" . pg_escape_string($_REQUEST['id2']) . "', 
                      '" . pg_escape_string($_REQUEST['sexo2']) . "', 
                      '" . pg_escape_string($_REQUEST['genero2']) . "', 
                      '" . pg_escape_string($_REQUEST['relacion']) . "')";

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
