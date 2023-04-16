<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Empleado</title>
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
                <h4 class="text-primary text-center pb-2">Detalles del Empleado</h4>
                <form action="<?=constant('URL')?>empleado/modificar" method="POST" id="frmEmpleado">
                    <?php
                        $empleado = $this->empleado;
                    ?>
                    ID 
                    <input type="text" class="form-control" name="txtId" value="<?=$empleado[0]['ID_EMPLEADO']?>" readonly>                                            
                    Nombre
                    <input type="text" class="form-control" name="txtNombre" value="<?=$empleado[0]['NOMBRE_EMPLEADO']?>" data-validetta="required,minLength[3],maxLength[50]">
                    Apellido
                    <input type="text" class="form-control" name="txtApellido" value="<?=$empleado[0]['APELLIDO_EMPLEADO']?>" data-validetta="required,minLength[3],maxLength[100]">
                    Genero
                    <input type="text" class="form-control" name="txtGenero" value="<?=$empleado[0]['GENERO_EMPLEADO']?>" data-validetta="required,minLength[3],maxLength[50]">
                    Direccion
                    <input type="text" class="form-control" name="txtDirec" value="<?=$empleado[0]['DIRECCION_EMPLEADO']?>" data-validetta="required,minLength[3],maxLength[100]">
                    Fecha de Nacimiento
                    <input type="date" class="form-control" name="txtFechaNac" value="<?=$empleado[0]['FECHA_NAC_EMP']?>" data-validetta="required,minLength[3],maxLength[50]">
                    Email
                    <input type="text" class="form-control" name="txtEmail" value="<?=$empleado[0]['EMAIL_EMPLEADO']?>" data-validetta="required,minLength[3],maxLength[100]">
                    Telefono
                    <input type="text" class="form-control" name="txtTelefono" value="<?=$empleado[0]['TELEFONO_EMPLEADO']?>" data-validetta="required,minLength[3],maxLength[100]">
                    Area
                    <select class="form-control" name="sArea">
                        <?php
                            foreach ($this->areas as $value) 
                            {
                        ?>
                        <option value="<?=$value['ID_AREA']?>" <?=($value['ID_AREA']==$empleado[0]['ID_AREA'])?'selected':''?>><?=$value['NOMBRE_AREA']?></option>
                        <?php
                            }
                        ?>                        
                    </select>
                    Cargo
                    <select class="form-control" name="sCargo">
                        <?php
                            foreach ($this->cargos as $value) 
                            {
                        ?>
                        <option value="<?=$value['ID_CARGO']?>" <?=($value['ID_CARGO']==$empleado[0]['ID_CARGO'])?'selected':''?>><?=$value['NOMBRE_CARGO']?></option>
                        <?php
                            }
                        ?>                        
                    </select>
                    Usuario
                    <select class="form-control" name="sUsuario">
                        <?php
                            foreach ($this->users as $value) 
                            {
                        ?>
                        <option value="<?=$value['ID_USUARIO']?>" <?=($value['ID_USUARIO']==$empleado[0]['ID_USUARIO'])?'selected':''?>><?=$value['USERNAME']?></option>
                        <?php
                            }
                        ?>                        
                    </select>

                    <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnModificar">Modificar</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var url = "<?=constant('URL')?>"; 
    </script>
    <script src="<?=constant('URL')?>public/js/jquery-3.6.0.min.js"></script>
    <script src="<?=constant('URL')?>public/js/empleado.js"></script>
    <script src="<?=constant('URL')?>public/sweetalert/sweetalert2.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validetta.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validettaLang-es-ES.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
<script>
    $(document).ready(function(){
        //Validar formulario
        $("#frmEmpleado").validetta({
            realTime : true
        })
    })
</script>