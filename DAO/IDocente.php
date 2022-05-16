<?php 
    interface IDocente
    {
        public function Listar();	
        public function Agregar(Docente $docente);
        public function Actualizar(Docente $docente);
        public function Eliminar($coddocente);
    }
?>