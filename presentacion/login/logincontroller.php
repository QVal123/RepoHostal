<?php
    require_once '../../datos/conexion.php';
 	// el include ejecuta el programa conexion.php
					// los 2 puntos es para retroceder de nivel y acceder a otra carpeta
    $nombre_usuario = $_POST['nombre_usuario']; 	// Cargamos el nombreusuario de html
    $contraseña = $_POST['contraseña']; 		// Cargamos la claveusuario de html

    $instruccionSql = $con->prepare("Select * from usuarios 
        where nombre_usuario='".$nombre_usuario."'
        and contraseña='".$contraseña."';");  	// verificamos que las credenciales del usuario sean válidas
    $instruccionSql->execute();		// ejecutamos la consulta
    if($registro = $instruccionSql->fetch(PDO::FETCH_OBJ)) #el resultado de la consulta se carga a la variable $registro y preguntamos si algún registro cumple la condición
    {
        # en este momento iniciamos la sesión
        session_start();
        # ahora creamos las variables de sesión que existirán, mientras el sistema esté en ejecución o mientras la
        # sesión no se haya destruido con session_destroy()
        $_SESSION["Id_Usuario"] = $registro->Id_Usuario;
        $_SESSION["Nombre_Usuario"] = $registro->Nombre_Usuario;
        $_SESSION["Contraseña"] = $registro->Contraseña;
        $_SESSION["Rol"] = $registro->Rol;
        header('location: ../Admin/dashboard.php'); 
       #ejecutamos el programa ModuloAdministrador.php
    }
    else
    {
        echo "Las credenciales del usuario no existen";
    }
?>