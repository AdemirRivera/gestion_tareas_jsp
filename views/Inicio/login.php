<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/loginStyle.css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/validetta/validetta.min.css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <div class="container my-5">
                                        <img src="<?=constant('URL')?>public/img/user.png" width="150px" class="mx-auto d-block" alt="Responsive image">        
                                    </div>
                                    <h3 class="login-heading mb-4">Visius Task System</h3>
                                    <form id="frmLogin" action="<?=constant('URL')?>inicio/index" method="POST">
                                        <div class="form-label-group">
                                            <input name="txtUsuario" type="text" id="inputEmail" class="form-control" placeholder="Ingresa tu nombre de usuario" data-validetta="required" autofocus>
                                            <label for="inputEmail">Nombre de usuario</label>
                                        </div>

                                        <div class="form-label-group">
                                            <input name="txtContrasena" type="password" id="inputPassword" class="form-control" placeholder="Ingresa tu contraseña" data-validetta="required">
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Ingresar</button>
                                        <div class="text-center">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var url = "<?=constant('URL')?>"; 
    </script>
    <script src="<?=constant('URL')?>public/js/jquery-3.6.0.min.js"></script>
    <script src="<?=constant('URL')?>public/sweetalert/sweetalert2.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validetta.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validettaLang-es-ES.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
<script>
    $(document).ready(function()
    {
        //Validar formulario
        $("#frmLogin").validetta
        ({
            bubblePosition: "bottom",
            realTime : true
        })
    })
</script>