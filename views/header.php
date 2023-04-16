<style>
    .dropdown-item
    {
        color: #0A1612;
    }
    .link-3 
    {
        color: #0A1612 !important;
        font-weight: 500;
        letter-spacing: 0.1em;
        display: inline-block;
        padding: 15px 20px;
        position: relative;
    }

    .link-3:after 
    {    
        background: none repeat scroll 0 0 transparent;
        bottom: 0;
        content: "";
        display: block;
        height: 2px;
        left: 50%;
        position: absolute;
        background: #DF744A;
        transition: width 0.3s ease 0s, left 0.3s ease 0s;
        width: 0;
    }

    .link-3:hover:after 
    { 
        width: 100%; 
        left: 0; 
    }

    @media all and (min-width: 992px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .nav-link{   }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
}
</style>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="#" style="color: #0A1612; font-weight: 500;">
        Visius Task System
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link link-3 mx-2" href="<?=constant('URL')?>inicio/index">Inicio</a>
            </li>  
            <li class="nav-item active">
                <a class="nav-link link-3 mx-2" href="<?=constant('URL')?>tarea/index">Tareas</a>
            </li>  
            <li class="nav-item dropdown">
                <a class="nav-link active link-3" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gestion
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=constant('URL')?>usuario/index">Usuario</a>
                    <a class="dropdown-item" href="<?=constant('URL')?>empleado/index">Empleados</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active link-3" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reportes
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=constant('URL')?>informe/pdfEmpleados">Empleado por Area</a>
                    <a class="dropdown-item" href="<?=constant('URL')?>informe/pdfTareas">Tarea por Empleado</a>
                    <a class="dropdown-item" href="<?=constant('URL')?>informe/pdfTareasAreas">Tarea por Area</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active link-3" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User: <?=$_SESSION['usuario']?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=constant('URL')?>inicio/logout">Salir</a>
                </div>
            </li> 
        </ul> 
        </div>
    </div>
</nav>
</header>