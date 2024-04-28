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

    $query = "SELECT * FROM usuario WHERE correo = '$correo' AND contraseña = '$contraseña'";
    $resultado = pg_query($conexion, $query);

    if ($resultado && pg_num_rows($resultado) == 1) { // Verificar si hay una única fila de resultados
        $_SESSION['usuario'] = $correo;
        header("Location: pagina-principal.php"); // Redirigir a la página principal
        exit;
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }
}

pg_close($conexion);
?>

