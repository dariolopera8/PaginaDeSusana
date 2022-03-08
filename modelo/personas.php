<?php

    class personas {

        private $id;
        private $nombre;
        private $apellido;
        private $edad;
        private $bd;
        private $registros;

        public function __construct($id,$nombre,$apellido,$edad)
        {
            $this->id=$id;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->edad=$edad;

        }

        public function insertarDatos() {

            require_once('conexion.php');
            $this->bd=$bd;
            $state=$this->bd->prepare('INSERT INTO usuarios (nombre, apellido, edad) VALUES (:nom,:ape,:eda)');
            $state->execute(array(":nom"=>$this->nombre, ":ape"=>$this->apellido, ":eda"=>$this->edad));

        }

        public function eliminarDatos() {

            require_once('conexion.php');
            $this->bd=$bd;
            $this->state=$this->bd->prepare('DELETE FROM usuarios WHERE id=:id');
            $this->state->execute(array(":id"=>$this->id));

        }

        public function actualizarDatos() {

            require_once('conexion.php');
            $this->bd=$bd;
            $state=$this->bd->prepare('UPDATE usuarios SET nombre=:nom, apellido=:ape, edad=:eda WHERE id=:id');
            $state->execute(array(":nom"=>$this->nombre, ":ape"=>$this->apellido, ":eda"=>$this->edad, ":id"=>$this->id));

        }

        public function mostrarDatos() {

            require_once('conexion.php');
            $this->bd=$bd;
            $this->registros=$this->bd->query('SELECT * FROM usuarios')->fetchAll(PDO::FETCH_OBJ);
            return $this->registros;

        }

    }

?>
