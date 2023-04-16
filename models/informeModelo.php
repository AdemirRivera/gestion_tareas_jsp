<?php

    class InformeModelo extends Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function areas()
        {
            $arreglo = [];
            $sql = "SELECT * FROM AREA WHERE estatus = 1";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_assoc())
            {
                $arreglo[] = $fila;
            }
            return $arreglo;
        }

        public function empleados($campo, $valor)
        {
            $arreglo = [];
            // $where = ($campo==0)?'e.ID_AREA='.$valor:'e.estatus = 1';
            error_log($valor);
            $sql = "SELECT e.ID_EMPLEADO, e.NOMBRE_EMPLEADO, e.APELLIDO_EMPLEADO, e.GENERO_EMPLEADO, e.DIRECCION_EMPLEADO, e.FECHA_NAC_EMP, e.EMAIL_EMPLEADO, e.TELEFONO_EMPLEADO, a.NOMBRE_AREA AS AREA, c.NOMBRE_CARGO AS CARGO, u.USERNAME AS USUARIO 
            FROM EMPLEADO e 
            INNER JOIN AREA a ON a.ID_AREA = e.ID_AREA
            INNER JOIN CARGO c ON c.ID_CARGO = e.ID_CARGO
            INNER JOIN USUARIO u ON u.ID_USUARIO = e.ID_USUARIO
            WHERE e.ID_AREA =".$valor;
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_assoc())
            {
                $arreglo[] = $fila;
            }
            return $arreglo;
        }

        public function tareas($campo, $valor)
        {
            $arreglo = [];
            // $where = ($campo==0)?'e.ID_AREA='.$valor:'e.estatus = 1';
            error_log($valor);
            $sql = "SELECT t.ID_TAREA, t.NOMBRE_TAREA, t.DESCRIPCION, e.NOMBRE_EMPLEADO AS EMPLEADO, et.NOMBRE_ESTADO AS ESTADO, em.NOMBRE_EMPLEADO AS ASIGNADO_POR
            FROM TAREA t 
            INNER JOIN EMPLEADO e ON e.ID_EMPLEADO = t.ID_EMPLEADO
            INNER JOIN ESTADO et ON et.ID_ESTADO = t.ID_ESTADO
            INNER JOIN EMPLEADO em ON em.ID_EMPLEADO = t.ID_ASSIGN_BY
            WHERE e.NOMBRE_EMPLEADO ='{$valor}'";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_assoc())
            {
                $arreglo[] = $fila;
            }
            return $arreglo;
        }

        public function tareaAreas($campo, $valor)
        {
            $arreglo = [];
            // $where = ($campo==0)?'e.ID_AREA='.$valor:'e.estatus = 1';
            error_log($valor);
            $sql = "SELECT t.ID_TAREA, t.NOMBRE_TAREA, t.DESCRIPCION, a.NOMBRE_AREA AS AREA, e.NOMBRE_ESTADO AS ESTADO
            FROM TAREA t 
            INNER JOIN AREA a ON a.ID_AREA = t.ID_AREA
            INNER JOIN ESTADO e ON e.ID_ESTADO = t.ID_ESTADO
            WHERE a.NOMBRE_AREA ='{$valor}'";
            $datos = $this->getDb()->conectar()->query($sql);

            while($fila = $datos->fetch_assoc())
            {
                $arreglo[] = $fila;
            }
            return $arreglo;
        }
    }

?>