<?php 
require_once '../../datos/conexion.php';
include 'DB.php';

$db = new DB();
$con = $db->conectar();

if (!isset($_POST['nombre_usuario']) || !isset($_POST['contrasena'])) {
    echo "Error: el formulario no envió datos.";
    exit();
}

$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena']; 

$instruccionSql = $con->prepare("
    SELECT * FROM usuarios 
    WHERE nombre_usuario = :nombre_usuario
    AND `CONTRASEÑA` = :contrasena
");

$instruccionSql->execute([
    ':nombre_usuario' => $nombre_usuario,
    ':contrasena' => $contrasena
]);

if ($registro = $instruccionSql->fetch(PDO::FETCH_OBJ)) {

    session_start();

    $_SESSION["Id_Usuario"]     = $registro->id_usuario;
    $_SESSION["Nombre_Usuario"] = $registro->nombre_usuario;
    $_SESSION["Contrasena"]     = $registro->{"CONTRASEÑA"};
    $_SESSION["Rol"]            = $registro->rol;

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
    header("Location: login.php?error=1");
exit();
}

?>