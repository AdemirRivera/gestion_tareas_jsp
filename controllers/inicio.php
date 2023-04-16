<?php

    class Inicio extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            if(!empty($_POST))
            {
                $this->getModel()->setUsuario($_POST['txtUsuario']);
                $this->getModel()->setContrasena($_POST['txtContrasena']);
                $nivel = $this->getModel()->validarLogin();
                
                if(!empty($nivel))
                {
                    $_SESSION['usuario'] = $_POST['txtUsuario'];
                    $_SESSION['nivel'] = $nivel;

                    $pagina = 'Inicio/index';
                    $this->getView()->loadView($pagina);
                } 
                else 
                {
                    $pagina = 'Inicio/login';
                    $this->getView()->loadView($pagina);
                }                
            } 
            else 
            {
                if(isset($_SESSION['nivel']))
                {
                    $pagina = 'Inicio/index';
                    $this->getView()->loadView($pagina);
                } 
                else 
                {
                    $pagina = "Inicio/login";
                    $this->getView()->loadView($pagina);
                }                
            }           
        }

        public function login(){
            $pagina = 'Inicio/login';
            $this->getView()->loadView($pagina);
        }

        public function logout(){
            session_destroy();
            $pagina = 'Inicio/login';
            $this->getView()->loadView($pagina);
        }

    }
?>