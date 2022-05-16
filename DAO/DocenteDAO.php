<?php 
    include 'IDocente.php';
    include 'DataSource.php';
    include 'Docente.php';

    class DocenteDAO implements IDocente
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT coddocente,apaterno,amaterno,nombres,usuario FROM tdocente");
            $docente = null;
            $docentes = array();

            foreach ($data_table as $clave=>$valor) {
                $docente = new Docente();
                $docente->setCodDocente( $data_table[$clave]["coddocente"] );
                $docente->setAPaterno( $data_table[$clave]["apaterno"] );
                $docente->setAMaterno( $data_table[$clave]["amaterno"] );
                $docente->setNombres( $data_table[$clave]["nombres"] );
                $docente->setUsuario( $data_table[$clave]["usuario"] );			
                array_push($docentes, $docente);
            }

            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>codDocente</strong></td>';
            echo '<td><strong>apaterno</strong></td>';
            echo '<td><strong>amaterno</strong></td>';
            echo '<td><strong>nombres</strong></td>';
            echo '<td><strong>usuario</strong></td>';
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
        
        public function Agregar(Docente $docente){
            $data_source = new DataSource();

            $sql = "INSERT INTO tdocente VALUES (:coddocente,:apaterno,:amaterno,:nombres,:usuario)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':coddocente'=>$docente->getCodDocente(),			
                ':apaterno'=>$docente->getAPaterno(),
                ':amaterno'=>$docente->getAMaterno(),
                ':nombres'=>$docente->getNombres(),
                ':usuario'=>$docente->getUsuario()			
                )
            );
            return $resultado;		
        }

        public function Actualizar(Docente $docente){
            $data_source = new DataSource();
            $sql = "UPDATE tdocente SET apaterno = :apaterno, amaterno = :amaterno, nombres = :nombres, usuario = :usuario				
                    WHERE coddocente = :coddocente";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':apaterno'=>$docente->getAPaterno(),
                ':amaterno'=>$docente->getAMaterno(),
                ':nombres'=> $docente->getNombres(),
                ':usuario'=>$docente->getUsuario(),			
                ':coddocente'=>$docente->getCodDocente()
                )
            );
            return $resultado;
        }

        public function Eliminar($coddocente){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tdocente WHERE coddocente = :coddocente",
                array(':coddocente'=>$coddocente));
            return $resultado;
        }
    }
?>