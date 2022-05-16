<?php 
    interface IUsuario
    {
        public function Listar();	
        public function Agregar(Usuario $usuario);
        public function Actualizar(Usuario $usuario);
        public function Eliminar($usuario);
    }
?>