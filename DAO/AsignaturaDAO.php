<?php 
    include 'IAsignatura.php';
    include 'DataSource.php';
    include 'Asignatura.php';

    class AsignaturaDAO implements IAsignatura
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT codasignatura,asignatura,codrequisito FROM tasignatura");
            $asignatura = null;
            $asignaturas = array();

            foreach ($data_table as $clave=>$valor) {
                $asignatura = new Asignatura();
                $asignatura->setCodAsignatura( $data_table[$clave]["codasignatura"] );
                $asignatura->setAsignatura( $data_table[$clave]["asignatura"] );
                $asignatura->setCodRequisito( $data_table[$clave]["codrequisito"] );
                array_push($asignaturas, $asignatura);
            }

            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>codAsignatura</strong></td>';
            echo '<td><strong>asignatura</strong></td>';
            echo '<td><strong>codrequisito</strong></td>';
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
        
        public function Agregar(Asignatura $asignatura){
            $data_source = new DataSource();

            $sql = "INSERT INTO tasignatura VALUES (:codasignatura,:asignatura,:codrequisito)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':codasignatura'=>$asignatura->getCodAsignatura(),			
                ':asignatura'=>$asignatura->getAsignatura(),
                ':codrequisito'=>$asignatura->getCodRequisito()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Asignatura $asignatura){
            $data_source = new DataSource();
            $sql = "UPDATE tasignatura SET asignatura = :asignatura, codrequisito = :codrequisito				
                    WHERE codasignatura = :codasignatura";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':asignatura'=>$asignatura->getAsignatura(),
                ':codrequisito'=>$asignatura->getCodRequisito(),
                ':codasignatura'=>$asignatura->getCodAsignatura()
                )
            );
            return $resultado;
        }

        public function Eliminar($codasignatura){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tasignatura WHERE codasignatura = :codasignatura",
                array(':codasignatura'=>$codasignatura));
            return $resultado;
        }
    }
?>