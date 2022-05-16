<?php 
    class Docente
    {
        private $coddocente;
        private $apaterno;
        private $amaterno;
        private $nombres;
        private $usuario;
        
        public function setCodDocente($coddocente){
            $this->coddocente = $coddocente;
        }

        public function getCodDocente(){
            return $this->coddocente;
        }

        public function setAPaterno($apaterno){
            $this->apaterno = $apaterno;
        }

        public function getAPaterno(){
            return $this->apaterno;
        }

        public function setAMaterno($amaterno){
            $this->amaterno = $amaterno;
        }

        public function getAMaterno(){
            return $this->amaterno;
        }	

        public function setNombres($nombres){
            $this->nombres = $nombres;
        }

        public function getNombres(){
            return $this->nombres;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function getUsuario(){
            return $this->usuario;
        }
    }
?>