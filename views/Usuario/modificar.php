<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="<?=constant('URL')?>public/validetta/validetta.min.css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'views/header.php';
    ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 mt-4">
                <h4 class="text-primary text-center pb-2">Detalles del Usuario</h4>
                <form action="<?=constant('URL')?>usuario/modificar" method="POST" id="frmUsuario">
                    <?php
                        $user = $this->user;
                    ?>
                    ID 
                    <input type="text" class="form-control" name="txtId" value="<?=$user[0]['ID_USUARIO']?>" readonly>                                            
                    Usuario
                    <input type="text" class="form-control" name="txtUsername" value="<?=$user[0]['USERNAME']?>" data-validetta="required,minLength[3],maxLength[50]">
                    Contraseña
                    <input type="text" class="form-control" name="txtPassword" value="<?=$user[0]['PASSWORD']?>" data-validetta="required,minLength[3],maxLength[100]">
                    Tipo Usuario
                    <select id="" class="form-control" name="sTipoUsuario">
                        <?php
                            foreach ($this->tipoUsers as $value) 
                            {
                        ?>
                        <option value="<?=$value['ID_TIPO_USUARIO']?>" <?=($value['ID_TIPO_USUARIO']==$user[0]['ID_TIPO_USUARIO'])?'selected':''?>><?=$value['TIPO_USUARIO']?></option>
                        <?php
                            }
                        ?>                        
                    </select>
                    <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnModificar">Modificar</button>
                </form>
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
    <script src="<?=constant('URL')?>public/sweetalert/sweetalert2.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validetta.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validettaLang-es-ES.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
<script>
    $(document).ready(function(){
        //Validar formulario
        $("#frmUsuario").validetta({
            realTime : true
        })
    })
</script>