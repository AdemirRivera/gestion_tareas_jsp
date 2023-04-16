<?php

    class InicioModelo extends Model
    {
        private $usuario;
        private $pass;
        private $nivel;

        public function __construct()
        {
            parent::__construct();
        }

        public function getUsuario()
        {
            return $this->usuario;
        }
        public function getContrasena()
        {
            return $this->pass;
        }
        public function getNivel()
        {
            return $this->nivel;
        }
        public function setUsuario($usuario)
        {
            $this->usuario= $usuario;
        }
        public function setContrasena($pass)
        {
            $this->pass = $pass;
        }
        public function setNivel($nivel)
        {
            $this->nivel = $nivel;
        }
        
        public function validarLogin()
        {
            error_log("inicioModelo::validarLogin => Validacion Efectuada");
            $nivel = "";
            $sql = "SELECT ID_TIPO_USUARIO FROM USUARIO 
            WHERE USERNAME='".$this->usuario."' AND PASSWORD='".$this->pass."'";
            
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_assoc())
            {
                $nivel = $fila['ID_TIPO_USUARIO'];
            }
            
            return $nivel;
        }
    }
    
?>