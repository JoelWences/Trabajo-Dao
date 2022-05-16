<?php 
    interface IAsignatura
    {
        public function Listar();	
        public function Agregar(Asignatura $asignatura);
        public function Actualizar(Asignatura $asignatura);
        public function Eliminar($codasignatura);
    }
?>