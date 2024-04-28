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

    $query = "INSERT INTO demandados(nombre, apellido, casa, calle, ciudad, departamento, id, sexo, genero, numero, delitos) 
              VALUES ('" . pg_escape_string($_REQUEST['nombre1']) . "', 
                      '" . pg_escape_string($_REQUEST['apellido1']) . "', 
                      '" . pg_escape_string($_REQUEST['casa1']) . "', 
                      '" . pg_escape_string($_REQUEST['calle1']) . "', 
                      '" . pg_escape_string($_REQUEST['ciudad1']) . "', 
                      '" . pg_escape_string($_REQUEST['departamento1']) . "', 
                      '" . pg_escape_string($_REQUEST['id1']) . "', 
                      '" . pg_escape_string($_REQUEST['sexo1']) . "', 
                      '" . pg_escape_string($_REQUEST['genero1']) . "', 
                      '" . pg_escape_string($_REQUEST['numero']) . "', 
                      '" . pg_escape_string($_REQUEST['delitos1']) . "')";

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
