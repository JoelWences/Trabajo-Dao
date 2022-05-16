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
		<title>Mantenimiento de Asignatura</title>
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
                        echo        '<li><a href="docente.php">Docente</a></li>';
                        echo        '<li><a href="usuario.php">Usuario</a></li>';
                        echo        '<li><a class="active" href="#">Asignatura</a></li>';
                        echo        '<li><a href="include/salir.php">Salir</a></li>';
                        echo    '</ul>';
                        echo '</nav>';
                    }
                ?>
            </div>
        </div>
        <?php
            include ('DAO/AsignaturaDAO.php');
            $dao = new AsignaturaDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $asignatura = new Asignatura();
                    $asignatura->setCodAsignatura($_POST["txtcodasignatura"]);
                    $asignatura->setAsignatura($_POST["txtasignatura"]);
                    $asignatura->setCodRequisito($_POST["txtcodrequisito"]);
                    $i =  $dao->Agregar($asignatura);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego asignatura');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego asignatura');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcodasignatura"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino asignatura');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino asignatura');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $asignatura = new Asignatura();
                    $asignatura->setCodAsignatura($_POST["txtcodasignatura"]);
                    $asignatura->setAsignatura($_POST["txtasignatura"]);
                    $asignatura->setCodRequisito($_POST["txtcodrequisito"]);
                    $i =  $dao->Actualizar($asignatura);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo asignatura');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo asignatura');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <h4>Mantenimiento de Asignatura</h4>
                    <p>CodAsignatura:  <input type="text" name="txtcodasignatura"></p>
                    <p>Asignatura:  <input type="text" name="txtasignatura"></p>
                    <p>CodRequisito:  <input type="text" name="txtcodrequisito"></p>
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