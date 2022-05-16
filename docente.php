<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Source code generated using layoutit.com">
		<meta name="author" content="LayoutIt!">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Mantenimiento de Docente</title>
	</head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <?php
                    include 'include/conexion.php';
                    $link = conectarse();
                    session_start();
                    $usuario = $_SESSION['username'];

                    if(!isset($usuario)){
                        header("location: index.php");
                    }
                    else{
                        echo '<nav>';
                        echo    '<h1>Mantenimiento de tablas</h1>';
                        echo    '<ul>';
                        echo        '<li><a href="alumno.php">Alumno</a></li>';
                        echo        '<li><a class="active" href="#">Docente</a></li>';
                        echo        '<li><a href="usuario.php">Usuario</a></li>';
                        echo        '<li><a href="asignatura.php">Asignatura</a></li>';
                        echo        '<li><a href="include/salir.php">Salir</a></li>';
                        echo    '</ul>';
                        echo '</nav>';
                    }
                ?>
            </div>
        </div>
        <?php
            include ('DAO/DocenteDAO.php');
            $dao = new DocenteDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $docente = new Docente();
                    $docente->setCodDocente($_POST["txtcoddocente"]);
                    $docente->setAPaterno($_POST["txtapaterno"]);
                    $docente->setAMaterno($_POST["txtamaterno"]);
                    $docente->setNombres($_POST["txtnombres"]);
                    $docente->setUsuario($_POST["txtusuario"]);
                    $i =  $dao->Agregar($docente);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego docente');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego docente');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcoddocente"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino docente');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino docente');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $docente = new Docente();
                    $docente->setCodDocente($_POST["txtcoddocente"]);
                    $docente->setAPaterno($_POST["txtapaterno"]);
                    $docente->setAMaterno($_POST["txtamaterno"]);
                    $docente->setNombres($_POST["txtnombres"]);
                    $docente->setUsuario($_POST["txtusuario"]);
                    $i =  $dao->Actualizar($docente);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo docente');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo docente');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <h4>Mantenimiento de Docente</h4>
                    <p>CodDocente:  <input type="text" name="txtcoddocente"></p>
                    <p>APaterno:  <input type="text" name="txtapaterno"></p>
                    <p>AMaterno:  <input type="text" name="txtamaterno"></p>
                    <p>Nombres:  <input type="text" name="txtnombres"></p>
                    <p>Usuario:  <input type="text" name="txtusuario"></p>
                    <p>
                        <button name="btnAgregar">Agregar</button>
                        <button name="btnEliminar">Eliminar</button>
                        <button name="btnActualizar">Actualizar</button>
                    </p>
                </form>	
            </div>
            <div class="col-md-8">
                <?php
                    echo "<br><br><h5>Listar</h5><br>";
                    print_r($dao->Listar());
                ?>
            </div>
        </div>
        <footer>
			<h4>Todos los derechos reservados</h4>
			<h4>Universidad Andina del Cusco</h4>
            <br>
            <h5>- Bejar Espinoza Joel Wenceslao</h5>
            <h5>- Florez Mejia Miguel Adriano</h5>
            <h5>- Fuentes Avilés Edy nestor</h5>
            <h5>- Maza García Julio César</h5>
            <br>
			<h5>Cusco - Peru</h5>		
		</footer>
    </body>
</html>