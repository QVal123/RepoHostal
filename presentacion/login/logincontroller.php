<?php
require_once '../../datos/conexion.php';

$nombre_usuario = $_POST['nombre_usuario'];
$contraseña = $_POST['contraseña'];

$instruccionSql = $con->prepare("
    SELECT * FROM usuarios 
    WHERE nombre_usuario = :nombre_usuario
    AND contraseña = :contraseña
");

$instruccionSql->execute([
    ':nombre_usuario' => $nombre_usuario,
    ':contraseña' => $contraseña
]);

// Verificamos si existe el usuario
if ($registro = $instruccionSql->fetch(PDO::FETCH_OBJ)) {

    session_start();

    // Guardamos datos en sesión
    $_SESSION["Id_Usuario"]     = $registro->id_usuario;
    $_SESSION["Nombre_Usuario"] = $registro->nombre_usuario;
    $_SESSION["Contraseña"]     = $registro->contraseña;
    $_SESSION["Rol"]            = $registro->rol;

    // Redirección por roles
    switch ($_SESSION["Rol"]) {

        case "Administrador":
            header("Location: ../admin/dashboard.php");
            break;

        case "Recepcionista":
            header("Location: ../recep/dashboard.php");
            break;

        case "Contabilidad":
            header("Location: ../conta/dashboard.php");
            break;

        case "Supervisor":
            header("Location: ../superv/dashboard.php");
            break;

        default:
            echo "Rol no reconocido";
            exit();
    }

    exit();

} else {
    echo "Las credenciales del usuario no existen";
}
?>

