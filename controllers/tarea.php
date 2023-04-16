<?php

    class Tarea extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            if(isset($_SESSION['nivel']))
            {
                $pagina = 'Tarea/index';
                $this->getView()->loadView($pagina);
            } 
            else 
            {
                $pagina = 'Inicio/login';
                $this->getView()->loadView($pagina);
            }            
        }

        public function mostrarTareas()
        {
            if(isset($_SESSION['nivel']))
            {
                if($_SESSION['nivel']==2)
                {
                    // Consulta a base de datos
                    $datos = $this->getModel()->listadoTareas();
                
                    $tr = '';
                    foreach ($datos as $value) {
                        $urlEditar = constant('URL').'tarea/modificar?id='.$value['ID_TAREA'];
                        $urlEliminar = constant('URL').'tarea/eliminar?id='.$value['ID_TAREA'];
                        $tr .='<tr class="text-center">
                        <td>'.$value['ID_TAREA'].'</td>
                        <td>'.$value['NOMBRE_TAREA'].'</td>
                        <td>'.$value['DESCRIPCION'].'</td>
                        <td>'.$value['EMPLEADO'].'</td>
                        <td>'.$value['ESTADO'].'</td>
                        <td>'.$value['ASIGNADO_POR'].'</td>
                        <td>'.$value['AREA'].'</td>
                        <td class="text-center">                             
                        <div class="btn-group">';

                    if($_SESSION['nivel']==2)
                    {
                        $tr .= '<a href="'.$urlEliminar.'" class="btn btn-primary btn-sm" id="btnEliminar">Eliminar</a>
                        <a href="'.$urlEditar.'" class="btn btn-dark btn-sm">Modificar</a>';
                    }  

                    $tr .='</div>
                    </td>
                    </tr>';
                    }

                    echo $tr;
                } 
            } 
            else
            {
                $pagina = "Inicio/login";
                $this->getView()->loadView($pagina);
            }          
        }
    }

?>