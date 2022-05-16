<?php
    require 'conexion.php';
    $link = conectarse();
    session_start();
    
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT COUNT(*) AS contar FROM tUsuario WHERE usuario = '$usuario' AND contrasenia = '$contraseña'";
    $resultado = mysqli_query($link, $consulta);
    $array = mysqli_fetch_array($resultado);

    if($array['contar']>0)
    {
        $_SESSION['username'] = $usuario;
        header("location: ../alumno.php");
    }
    else
    {
        echo "Usuario y/o contraseña incorrectos";
    }
?>