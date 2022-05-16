<?php
    $host = 'localhost';
    $puerto = 3306;
    $usuario = 'root';
    $contraseña = '';
    $basedatos = 'bdacademico';
    
    //$link = mysqli_connect($host, $usuario, $contraseña, $basedatos);

    function conectarse()
    {
        global $host, $puerto, $usuario, $contraseña, $basedatos;
        // Conectarse al servidor MySQL
        if(!($link = mysqli_connect($host, $usuario, $contraseña)))
        {
            echo 'Error al conectarse al servidor de base de datos';
            exit();
        }
        /*else echo 'Conexion satisfactoria con el servidor MySQL '*/;

        // Conexion con la base de datos
        if(!(mysqli_select_db($link, $basedatos)))
        {
            echo 'Error al establecer conexion con la base de datos';
            exit();
        }
        /*else echo 'Se establecio conexion con la base de datos '*/;
        return $link;
    }
?>