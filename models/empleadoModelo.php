<?php

    class EmpleadoModelo extends Model
    {
        private $id;
        private $nombre;
        private $apellido;
        private $genero;
        private $direc;
        private $fechaNac;
        private $email;
        private $telefono;
        private $area;
        private $cargo;
        private $usuario;

        public function __construct()
        {
            parent::__construct();
        }

        public function getId()
        {
            return $this->id;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public function getApellido()
        {
            return $this->apellido;
        }
        public function getGenero()
        {
            return $this->genero;
        }
        public function getDirec()
        {
            return $this->direc;
        }
        public function getFechaNac()
        {
            return $this->fechaNac;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getTelefono()
        {
            return $this->telefono;
        }
        public function getArea()
        {
            return $this->area;
        }
        public function getCargo()
        {
            return $this->cargo;
        }
        public function getUsuario()
        {
            return $this->usuario;
        }

        public function setId($id)
        {
            $this->id = $id;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }
        public function setGenero($genero)
        {
            $this->genero = $genero;
        }
        public function setDirec($direc)
        {
            $this->direc = $direc;
        }
        public function setFechaNac($fechaNac)
        {
            $this->fechaNac = $fechaNac;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }
        public function setArea($area)
        {
            $this->area = $area;
        }
        public function setCargo($cargo)
        {
            $this->cargo = $cargo;
        }
        public function setUsuario($usuario)
        {
            $this->usuario = $usuario;
        }


        public function listadoEmpleados()
        {
            $arreglo = [];
            $sql = "SELECT * FROM vEMPLEADO_SELECT";

            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function listadoAreas()
        {
            $arreglo = [];
            $sql = "SELECT * FROM AREA WHERE estatus = 1";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function listadoCargos()
        {
            $arreglo = [];
            $sql = "SELECT * FROM CARGO WHERE estatus = 1";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function listadoUsuarios()
        {
            $arreglo = [];
            $sql = "SELECT * FROM USUARIO WHERE estatus = 1";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function insertarEmpleados()
        {
            $sql = "INSERT INTO EMPLEADO(NOMBRE_EMPLEADO, APELLIDO_EMPLEADO, GENERO_EMPLEADO, DIRECCION_EMPLEADO, FECHA_NAC_EMP, EMAIL_EMPLEADO, TELEFONO_EMPLEADO, ID_AREA, ID_CARGO, ID_USUARIO, estatus) 
            VALUES ('".$this->nombre."', '".$this->apellido."', '".$this->genero."', '".$this->direc."', '".$this->fechaNac."', '".$this->email."', '".$this->telefono."', ".$this->area.", ".$this->cargo.", ".$this->usuario.", 1)";

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function empleadoFiltrado()
        {
            $arreglo = [];
            $sql = "SELECT * FROM EMPLEADO where ID_EMPLEADO =".$this->id;

            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function modificarEmpleados()
        {
            $sql = "UPDATE EMPLEADO 
            SET NOMBRE_EMPLEADO = '".$this->nombre."', APELLIDO_EMPLEADO = '".$this->apellido."', GENERO_EMPLEADO = '".$this->genero."', DIRECCION_EMPLEADO = '".$this->direc."', FECHA_NAC_EMP = '".$this->fechaNac."', EMAIL_EMPLEADO = '".$this->email."', TELEFONO_EMPLEADO = '".$this->telefono."', ID_AREA = '".$this->area."', ID_CARGO = '".$this->cargo."', ID_USUARIO = '".$this->usuario."' WHERE ID_EMPLEADO = 16";

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function eliminarEmpleado()
        {
            $sql = "UPDATE EMPLEADO SET estatus = 0 WHERE ID_EMPLEADO =".$this->id;

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }
    }
    
?>