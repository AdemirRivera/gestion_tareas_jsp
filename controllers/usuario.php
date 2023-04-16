<?php

    class Usuario extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            if(isset($_SESSION['nivel']))
            {
                $pagina = 'Usuario/index';
                $this->getView()->loadView($pagina);
            } 
            else 
            {
                $pagina = 'Inicio/login';
                $this->getView()->loadView($pagina);
            }            
        }

        public function mostrarUsuarios()
        {
            if(isset($_SESSION['nivel']))
            {
                if($_SESSION['nivel']==1)
                {
                    // Consulta a base de datos
                    $datos = $this->getModel()->listadoUsuarios();
                
                    $tr = '';
                    foreach ($datos as $value) {
                        $urlEditar = constant('URL').'usuario/modificar?id='.$value['ID_USUARIO'];
                        $urlEliminar = constant('URL').'usuario/eliminar?id='.$value['ID_USUARIO'];
                        $tr .='<tr class="text-center">
                        <td>'.$value['ID_USUARIO'].'</td>
                        <td>'.$value['USERNAME'].'</td>
                        <td>'.$value['PASSWORD'].'</td>
                        <td>'.$value['TIPO_USUARIO'].'</td>
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
                    $this->getView()->tipoUsers = $this->getModel()->listadoTipoUsuarios();
                    $pagina = 'Usuario/nuevo';
                    $this->getView()->loadView($pagina);
                } 
                else 
                {
                    $pagina = 'Usuario/index';
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
                $this->getModel()->setUser($_POST["txtUsername"]);
                $this->getModel()->setPass($_POST["txtPassword"]);
                $this->getModel()->setTipoUser($_POST["sTipoUsuario"]);

                $respuesta = $this->getModel()->insertarUsuarios();
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
                    $this->getView()->user = $this->getModel()->usuarioFiltrado();
                    $this->getView()->tipoUsers = $this->getModel()->listadoTipoUsuarios();
                    $pagina = 'Usuario/modificar';
                    $this->getView()->loadView($pagina);
                }  
                else 
                {
                    if(!empty($_POST))
                    {
                        $this->getModel()->setId($_POST['txtId']);
                        $this->getModel()->setUser($_POST["txtUsername"]);
                        $this->getModel()->setPass($_POST["txtPassword"]);
                        $this->getModel()->setTipoUser($_POST["sTipoUsuario"]);
                        $res=$this->getModel()->modificarUsuarios();
                        echo $res;
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

                $res = $this->getModel()->eliminarUsuario();
                echo $res;
            }
        }

    }
    
?>