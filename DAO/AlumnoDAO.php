<?php 
    include 'IAlumno.php';
    include 'DataSource.php';
    include 'Alumno.php';

    class AlumnoDAO implements IAlumno
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT codalumno,apaterno,amaterno,nombres,usuario,codcarrera FROM talumno");
            $alumno = null;
            $alumnos = array();

            foreach ($data_table as $clave=>$valor) {
                $alumno = new Alumno();
                $alumno->setCodAlumno( $data_table[$clave]["codalumno"] );
                $alumno->setAPaterno( $data_table[$clave]["apaterno"] );
                $alumno->setAMaterno( $data_table[$clave]["amaterno"] );
                $alumno->setNombres( $data_table[$clave]["nombres"] );
                $alumno->setUsuario( $data_table[$clave]["usuario"] );			
                $alumno->setCodCarrera( $data_table[$clave]["codcarrera"] );
                array_push($alumnos, $alumno);
            }

            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>codAlumno</strong></td>';
            echo '<td><strong>apaterno</strong></td>';
            echo '<td><strong>amaterno</strong></td>';
            echo '<td><strong>nombres</strong></td>';
            echo '<td><strong>usuario</strong></td>';
            echo '<td><strong>codcarrera</strong></td>';
            echo '</tr>';
            foreach ($data_table as $row) {
                    echo '<tr>';
                    foreach ($row as $v) {
                            echo '<td>'.$v.'</td>';
                    }
                    echo '</tr>';
            }
            echo '</table>';
        }
        
        public function Agregar(Alumno $alumno){
            $data_source = new DataSource();

            $sql = "INSERT INTO talumno VALUES (:codalumno,:apaterno,:amaterno,:nombres,:usuario,:codcarrera)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':codalumno'=>$alumno->getCodAlumno(),			
                ':apaterno'=>$alumno->getAPaterno(),
                ':amaterno'=>$alumno->getAMaterno(),
                ':nombres'=>$alumno->getNombres(),
                ':usuario'=>$alumno->getUsuario(),			
                ':codcarrera'=>$alumno->getCodCarrera()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Alumno $alumno){
            $data_source = new DataSource();
            $sql = "UPDATE talumno SET apaterno = :apaterno, amaterno = :amaterno, nombres = :nombres, usuario = :usuario, codcarrera = :codcarrera				
                    WHERE codalumno = :codalumno";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':apaterno'=>$alumno->getAPaterno(),
                ':amaterno'=>$alumno->getAMaterno(),
                ':nombres'=> $alumno->getNombres(),
                ':usuario'=>$alumno->getUsuario(),			
                ':codcarrera'=>$alumno->getCodCarrera(),
                ':codalumno'=>$alumno->getCodAlumno()
                )
            );
            return $resultado;
        }

        public function Eliminar($codalumno){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM talumno WHERE codalumno = :codalumno",
                array(':codalumno'=>$codalumno));
            return $resultado;
        }
    }
?>