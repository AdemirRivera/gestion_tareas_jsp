<?php

    class TareaModelo extends Model
    {
        private $id;
        private $nombre;
        private $desc;
        private $emp;
        private $estado;
        private $asign;
        private $area;

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
        public function getDesc()
        {
            return $this->desc;
        }
        public function getEmp()
        {
            return $this->emp;
        }
        public function getEstado()
        {
            return $this->estado;
        }
        public function getAsign()
        {
            return $this->asign;
        }
        public function getArea()
        {
            return $this->area;
        }

        public function setId($id)
        {
            $this->id = $id;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function setDesc($desc)
        {
            $this->desc = $desc;
        }
        public function setEmp($emp)
        {
            $this->emp = $emp;
        }
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }
        public function setAsign($asign)
        {
            $this->asign = $asign;
        }
        public function setArea($area)
        {
            $this->area = $area;
        }

        public function listadoTareas()
        {
            $arreglo = [];
            $sql = "SELECT t.ID_TAREA, t.NOMBRE_TAREA, t.DESCRIPCION, e.NOMBRE_EMPLEADO AS EMPLEADO, et.NOMBRE_ESTADO AS ESTADO, em.NOMBRE_EMPLEADO AS ASIGNADO_POR, a.NOMBRE_AREA AS AREA
            FROM TAREA t 
            INNER JOIN EMPLEADO e ON e.ID_EMPLEADO = t.ID_EMPLEADO
            INNER JOIN ESTADO et ON et.ID_ESTADO = t.ID_ESTADO
            INNER JOIN EMPLEADO em ON em.ID_EMPLEADO = t.ID_ASSIGN_BY
            INNER JOIN AREA a ON a.ID_AREA = t.ID_AREA
            WHERE t.estatus = 1";

            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function listadoEmpleados()
        {
            $arreglo = [];
            $sql = "SELECT * FROM EMPLEADO";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function listadoEstados()
        {
            $arreglo = [];
            $sql = "SELECT * FROM ESTADO";
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
            $sql = "SELECT * FROM AREA";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function insertarTareas()
        {
            $sql = "INSERT INTO TAREA(NOMBRE_TAREA, DESCRIPCION, ID_EMPLEADO, ID_ESTADO, ID_ASSIGN_BY, estatus, ID_AREA) 
            VALUES ('".$this->nombre."','".$this->desc."',".$this->emp.",".$this->estado.",".$this->asign.",1,".$this->area.")";

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function tareaFiltrado()
        {
            $arreglo = [];
            $sql = "SELECT * FROM TAREA WHERE ID_TAREA=".$this->id;

            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_object())
            {
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function modificarTareas()
        {
            $sql = "UPDATE TAREA 
            SET NOMBRE_TAREA='".$this->nombre."', DESCRIPCION='".$this->desc."', ID_EMPLEADO=".$this->emp.", ID_ESTADO=".$this->estado.", ID_ASSIGN_BY=".$this->asign.", ID_AREA=".$this->area." WHERE id=".$this->id;

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function eliminarTarea()
        {
            $sql = "UPDATE TAREA SET estatus = 0 WHERE ID_TAREA =".$this->id;

            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }
    }
    
?>