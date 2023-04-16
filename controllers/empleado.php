<?php

    class Empleado extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            if(isset($_SESSION['nivel']))
            {
                $pagina = 'Empleado/index';
                $this->getView()->loadView($pagina);
            } 
            else 
            {
                $pagina = 'Inicio/login';
                $this->getView()->loadView($pagina);
            }            
        }

        public function mostrarEmpleados()
        {
            if(isset($_SESSION['nivel']))
            {
                if($_SESSION['nivel']==1)
                {
                    // Consulta a base de datos
                    $datos = $this->getModel()->listadoEmpleados();
                
                    $tr = '';
                    foreach ($datos as $value) {
                        $urlEditar = constant('URL').'empleado/modificar?id='.$value['ID_EMPLEADO'];
                        $urlEliminar = constant('URL').'empleado/eliminar?id='.$value['ID_EMPLEADO'];
                        $tr .='<tr class="text-center">
                        <td>'.$value['ID_EMPLEADO'].'</td>
                        <td>'.$value['NOMBRE_EMPLEADO'].'</td>
                        <td>'.$value['APELLIDO_EMPLEADO'].'</td>
                        <td>'.$value['GENERO_EMPLEADO'].'</td>
                        <td>'.$value['DIRECCION_EMPLEADO'].'</td>
                        <td>'.$value['FECHA_NAC_EMP'].'</td>
                        <td>'.$value['EMAIL_EMPLEADO'].'</td>
                        <td>'.$value['TELEFONO_EMPLEADO'].'</td>
                        <td>'.$value['AREA'].'</td>
                        <td>'.$value['CARGO'].'</td>
                        <td>'.$value['USUARIO'].'</td>
                        <td class="text-center">                             
                        <div class="btn-group">';

                    if($_SESSION['nivel']==1)
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

        public function nuevo()
        {
            if(isset($_SESSION['nivel']))
            {
                if($_SESSION['nivel']==1)
                {
                    $this->getView()->areas = $this->getModel()->listadoAreas();
                    $this->getView()->cargos = $this->getModel()->listadoCargos();
                    $this->getView()->users = $this->getModel()->listadoUsuarios();
                    $pagina = 'Empleado/nuevo';
                    $this->getView()->loadView($pagina);
                } 
                else 
                {
                    $pagina = 'Empleado/index';
                    $this->getView()->loadView($pagina);
                } 
            } 
            else 
            {
                $pagina = "Inicio/login";
                $this->getView()->loadView($pagina);
            }         
        }

        public function agregar()
        {
            if(!empty($_POST))
            {
                $this->getModel()->setNombre($_POST['txtNombre']);
                $this->getModel()->setApellido($_POST['txtApellido']);
                $this->getModel()->setGenero($_POST['txtGenero']);
                $this->getModel()->setDirec($_POST['txtDirec']);
                $this->getModel()->setFechaNac($_POST['txtFechaNac']);
                $this->getModel()->setEmail($_POST['txtEmail']);
                $this->getModel()->setTelefono($_POST['txtTelefono']);
                $this->getModel()->setArea($_POST['sArea']);
                $this->getModel()->setCargo($_POST['sCargo']);
                $this->getModel()->setUsuario($_POST['sUsuario']);

                $respuesta = $this->getModel()->insertarEmpleados();
                echo $respuesta;
            }
        }

        public function modificar()
        {
            if(isset($_SESSION['nivel']))
            {
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];

                    $this->getModel()->setId($id);
                    $this->getView()->empleado = $this->getModel()->empleadoFiltrado();
                    $this->getView()->areas = $this->getModel()->listadoAreas();
                    $this->getView()->cargos = $this->getModel()->listadoCargos();
                    $this->getView()->users = $this->getModel()->listadoUsuarios();
                    $pagina = 'Empleado/modificar';
                    $this->getView()->loadView($pagina);
                }  
                else 
                {
                    if(!empty($_POST))
                    {
                        $this->getModel()->setNombre($_POST['txtNombre']);
                        $this->getModel()->setApellido($_POST['txtApellido']);
                        $this->getModel()->setGenero($_POST['txtGenero']);
                        $this->getModel()->setDirec($_POST['txtDirec']);
                        $this->getModel()->setFechaNac($_POST['txtFechaNac']);
                        $this->getModel()->setEmail($_POST['txtEmail']);
                        $this->getModel()->setTelefono($_POST['txtTelefono']);
                        $this->getModel()->setArea($_POST['sArea']);
                        $this->getModel()->setCargo($_POST['sCargo']);
                        $this->getModel()->setUsuario($_POST['sUsuario']);

                        $res=$this->getModel()->modificarEmpleados();
                        echo $res;
                        error_log($res);
                    }
                }
            } 
            else 
            {
                $pagina = "Inicio/login";
                $this->getView()->loadView($pagina);
            }         
        }

        public function eliminar()
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $this->getModel()->setId($id);

                $res = $this->getModel()->eliminarEmpleado();
                echo $res;
            }
        }

    }
    
?>