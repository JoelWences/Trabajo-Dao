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
		<title>Mantenimiento de Alumno</title>
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
                        echo        '<li><a class="active" href="#">Alumno</a></li>';
                        echo        '<li><a href="docente.php">Docente</a></li>';
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
            include ('DAO/AlumnoDAO.php');
            $dao = new AlumnoDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $alumno = new Alumno();
                    $alumno->setCodAlumno($_POST["txtcodalumno"]);
                    $alumno->setAPaterno($_POST["txtapaterno"]);
                    $alumno->setAMaterno($_POST["txtamaterno"]);
                    $alumno->setNombres($_POST["txtnombres"]);
                    $alumno->setUsuario($_POST["txtusuario"]);
                    $alumno->setCodCarrera($_POST["txtcodcarrera"]);
                    $i =  $dao->Agregar($alumno);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego alumno');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego alumno');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcodalumno"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino alumno');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino alumno');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $alumno = new Alumno();
                    $alumno->setCodAlumno($_POST["txtcodalumno"]);
                    $alumno->setAPaterno($_POST["txtapaterno"]);
                    $alumno->setAMaterno($_POST["txtamaterno"]);
                    $alumno->setNombres($_POST["txtnombres"]);
                    $alumno->setUsuario($_POST["txtusuario"]);
                    $alumno->setCodCarrera($_POST["txtcodcarrera"]);
                    $i =  $dao->Actualizar($alumno);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo alumno');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo alumno');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <h4>Mantenimiento de Alumno</h4>
                    <p>CodAlumno:  <input type="text" name="txtcodalumno"></p>
                    <p>APaterno:  <input type="text" name="txtapaterno"></p>
                    <p>AMaterno:  <input type="text" name="txtamaterno"></p>
                    <p>Nombres:  <input type="text" name="txtnombres"></p>
                    <p>Usuario:  <input type="text" name="txtusuario"></p>
                    <p>CodCarrera:  <input type="text" name="txtcodcarrera"></p>
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