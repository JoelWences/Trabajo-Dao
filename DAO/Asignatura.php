<?php 
    class Asignatura
    {
        private $codasignatura;
        private $asignatura;
        private $codrequisito;
        
        public function setCodAsignatura($codasignatura){
            $this->codasignatura = $codasignatura;
        }

        public function getCodAsignatura(){
            return $this->codasignatura;
        }

        public function setAsignatura($asignatura){
            $this->asignatura = $asignatura;
        }

        public function getAsignatura(){
            return $this->asignatura;
        }

        public function setCodRequisito($codrequisito){
            $this->codrequisito = $codrequisito;
        }

        public function getCodRequisito(){
            return $this->codrequisito;
        }	
    }
?>