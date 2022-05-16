<?php 
    class Usuario
    {
        private $usuario;
        private $contrasenia;
        
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function setContrasenia($contrasenia){
            $this->contrasenia = $contrasenia;
        }

        public function getContrasenia(){
            return $this->contrasenia;
        }
    }
?>