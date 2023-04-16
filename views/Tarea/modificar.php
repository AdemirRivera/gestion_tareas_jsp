<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Sitio</title>
    <link rel="stylesheet" href="<?=constant('URL')?>public/validetta/validetta.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'views/header.php';
    ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 mt-4">
                <h4 class="text-primary text-center pb-2">Detalles del Sitio</h4>
                <form action="<?=constant('URL')?>sitio/modificar" method="POST" id="frmSitio">
                    <?php
                        $sitio = $this->sitio;
                    ?>
                    ID 
                    <input type="text" class="form-control" name="txtId" value="<?=$sitio[0]['id']?>" readonly>                                            
                    Sitio
                    <input type="text" class="form-control" name="txtSitio" value="<?=$sitio[0]['sitio']?>" data-validetta="required,minLength[3],maxLength[50]">
                    Descripcion
                    <input type="text" class="form-control" name="txtDesc" value="<?=$sitio[0]['descripcion']?>" data-validetta="required,minLength[3],maxLength[100]">
                    Marca
                    <select id="" class="form-control" name="sPais">
                        <?php
                            foreach ($this->paises as $value) 
                            {
                        ?>
                        <option value="<?=$value['id']?>" <?=($value['id']==$sitio[0]['fk_pais'])?'selected':''?>><?=$value['pais']?></option>
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
    <script src="<?=constant('URL')?>public/js/sitio.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validetta.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validettaLang-es-ES.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
<script>
    $(document).ready(function(){
        //Validar formulario
        $("#frmSitio").validetta({
            realTime : true
        })
    })
</script>