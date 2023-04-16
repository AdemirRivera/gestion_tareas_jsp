<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="<?=constant('URL')?>public/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body style="background-color: #66B9BF;">
    <?php
        require_once 'views/header.php';
    ?>
    <div class="container">
            <?php
                if($_SESSION['nivel']==1)
                {
            ?>
            <a href="<?=constant('URL')?>usuario/nuevo" class="btn btn-block text-white mt-5" style="background-color: #07889B;">Agregar Usuario</a>   
            <?php        
                }
            ?>
            <h2 class="text-center text-white p-3">Usuarios</h2> 
        <div class="table-responsive">
        <table class="table table-striped custom-table text-center bg-white" id="usuarios">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Tipo Usuario</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
        require_once 'views/footer.php';
    ?>
    <script>
        var url = "<?=constant('URL')?>"; 
    </script>
    <script src="<?=constant('URL')?>public/js/jquery-3.6.0.min.js"></script>
    <script src="<?=constant('URL')?>public/js/usuario.js"></script>
    <script src="<?=constant('URL')?>public/js/eliminarUsuario.js"></script>
    <script src="<?=constant('URL')?>public/sweetalert/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
