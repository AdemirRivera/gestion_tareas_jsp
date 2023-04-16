<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea</title>
    <link rel="stylesheet" href="<?=constant('URL')?>public/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'views/header.php';
    ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10 mt-4">
                <h1>Usuario: <?=$_SESSION['usuario']?></h1>
                <?php
                    if($_SESSION['nivel']==2)
                    {
                ?>
                <a href="<?=constant('URL')?>tarea/nuevo" class="btn btn-block btn-primary mt-3">Agregar sitio</a>   
                <?php        
                    }
                ?>
                <h2 class="text-center p-3 text-primary">SITIOS</h2> 
                <div class="table-responsive">
                <table class="table table-striped custom-table text-center bg-white" id="tareas">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Asignado Por</th>
                        <th scope="col">Area</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var url = "<?=constant('URL')?>"; 
    </script>
    <script src="<?=constant('URL')?>public/js/jquery-3.6.0.min.js"></script>
    <script src="<?=constant('URL')?>public/js/tarea.js"></script>
    <script src="<?=constant('URL')?>public/js/eliminarTarea.js"></script>
    <script src="<?=constant('URL')?>public/js/eliminar.js"></script>
    <script src="<?=constant('URL')?>public/sweetalert/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
