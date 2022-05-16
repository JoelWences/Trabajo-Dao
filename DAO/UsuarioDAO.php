<?php 
    include 'IUsuario.php';
    include 'DataSource.php';
    include 'Usuario.php';

    class UsuarioDAO implements IUsuario
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT usuario,contrasenia FROM tusuario");
            $usuario = null;
            $usuarios = array();

            foreach ($data_table as $clave=>$valor) {
                $usuario = new Usuario();
                $usuario->setUsuario( $data_table[$clave]["usuario"] );
                $usuario->setContrasenia( $data_table[$clave]["contrasenia"] );
                array_push($usuarios, $usuario);
            }

            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>usuario</strong></td>';
            echo '<td><strong>contrasenia</strong></td>';
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
        
        public function Agregar(Usuario $usuario){
            $data_source = new DataSource();

            $sql = "INSERT INTO tusuario VALUES (:usuario,:contrasenia)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':usuario'=>$usuario->getUsuario(),			
                ':contrasenia'=>$usuario->getContrasenia()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Usuario $usuario){
            $data_source = new DataSource();
            $sql = "UPDATE tusuario SET contrasenia = :contrasenia				
                    WHERE usuario = :usuario";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':contrasenia'=>$usuario->getContrasenia(),
                ':usuario'=>$usuario->getUsuario()
                )
            );
            return $resultado;
        }

        public function Eliminar($usuario){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tusuario WHERE usuario = :usuario",
                array(':usuario'=>$usuario));
            return $resultado;
        }
    }
?>