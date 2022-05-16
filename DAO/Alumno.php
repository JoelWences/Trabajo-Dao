<?php 
    class Alumno
    {
        private $codalumno;
        private $apaterno;
        private $amaterno;
        private $nombres;
        private $usuario;
        private $codcarrera;
        
        public function setCodAlumno($codalumno){
            $this->codalumno = $codalumno;
        }

        public function getCodAlumno(){
            return $this->codalumno;
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

        public function setCodCarrera($codcarrera){
            $this->codcarrera = $codcarrera;
        }

        public function getCodCarrera(){
            return $this->codcarrera;
        }
    }
?>