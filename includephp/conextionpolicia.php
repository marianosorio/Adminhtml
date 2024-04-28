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

    $query = "INSERT INTO demandados(nombre, apellido, casa, calle, ciudad, departamento, id, sexo, genero, antecedentes, delitos) 
              VALUES ('" . pg_escape_string($_REQUEST['nombre']) . "', 
                      '" . pg_escape_string($_REQUEST['apellido']) . "', 
                      '" . pg_escape_string($_REQUEST['casa']) . "', 
                      '" . pg_escape_string($_REQUEST['calle']) . "', 
                      '" . pg_escape_string($_REQUEST['ciudad']) . "', 
                      '" . pg_escape_string($_REQUEST['departamento']) . "', 
                      '" . pg_escape_string($_REQUEST['id']) . "', 
                      '" . pg_escape_string($_REQUEST['sexo']) . "', 
                      '" . pg_escape_string($_REQUEST['genero']) . "', 
                      '" . pg_escape_string($_REQUEST['antecedentes']) . "', 
                      '" . pg_escape_string($_REQUEST['delitos']) . "')";

    $consulta = pg_query($conexion, $query);
    if ($consulta) {
        header("Location: Principal.html"); // Redirigir a la página principal
        exit;
    } else {
        echo 'Error al insertar datos.';
    }
}

pg_close($conexion);
?>
