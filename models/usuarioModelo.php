<?php

    class UsuarioModelo extends Model
    {
        private $id;
        private $user;
        private $pass;
        private $tipoUser;

        public function __construct()
        {
            parent::__construct();
        }

        public function getId()
        {
            return $this->id;
        }
        public function getUser()
        {
            return $this->user;
        }
        public function getPass()
        {
            return $this->pass;
        }
        public function getTipoUser()
        {
            return $this->tipoUser;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setUser($user)
        {
            $this->user = $user;
        }
        public function setPass($pass)
        {
            $this->pass = $pass;
        }
        public function setTipoUser($tipoUser)
        {
            $this->tipoUser = $tipoUser;
        }

        public function listadoUsuarios()
        {
            $arreglo = [];
            $sql = "SELECT u.ID_USUARIO, u.USERNAME, u.PASSWORD, t.TIPO_USUARIO 
            FROM USUARIO u INNER JOIN TIPO_USUARIO t ON t.ID_TIPO_USUARIO=u.ID_TIPO_USUARIO WHERE u.estatus = 1";

            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function listadoTipoUsuarios()
        {
            $arreglo = [];
            $sql = "SELECT * FROM TIPO_USUARIO WHERE estatus = 1";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function insertarUsuarios()
        {
            error_log("usuarioModelo::insertarUsuarios-> Funcion Iniciada");

            $sql = "INSERT INTO USUARIO(USERNAME, PASSWORD, ID_TIPO_USUARIO, estatus) VALUES ('".$this->user."','".$this->pass."',".$this->tipoUser.", 1)";

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function usuarioFiltrado()
        {
            $arreglo = [];
            $sql = "SELECT * FROM USUARIO WHERE ID_USUARIO =".$this->id;
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function modificarUsuarios()
        {
            $sql = "UPDATE USUARIO SET USERNAME = '".$this->user."', PASSWORD = '".$this->pass."', ID_TIPO_USUARIO = ".$this->tipoUser." WHERE ID_USUARIO=".$this->id;

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function eliminarUsuario()
        {
            $sql = "UPDATE USUARIO SET estatus = 0 WHERE ID_USUARIO =".$this->id;

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }
    }
    
?>