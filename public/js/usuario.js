$(document).ready(function()
{

    mostrarUsuarios()

    function mostrarUsuarios()
    {
        console.log('funcion mostrar usuarios');
        $.ajax
        ({
            type : 'POST',
            url : url+'usuario/mostrarUsuarios',
            success : function(response)
            {
                $("#usuarios tbody").html(response)
            }, 
            error : function()
            {
                console.log('error ajax')
            }
        })
    }

        //Validacion de campos en NUEVO
        $('#frmUsuarios').validetta({
            onValid : function(e) {
              e.preventDefault();
              // Agregar sitios
                var form = $("#frmUsuarios")
                var method = form.attr('method')
                var action = form.attr('action')
                var data = form.serialize()
                $.ajax({
                    type : method,
                    url : action,
                    data : data,
                    success: function(response){
                        var mensaje = (response)?1:0;
                        if(mensaje == 1)
                        {
                            Swal.fire
                            ({
                                icon: 'success',
                                title: 'Exito',
                                text: 'El usuario fue agregado con exito'
                            }).then
                            (
                                function () { window.location.href = url+'usuario/index'; },
                                function () { return false; }
                            );
                        }
                        else if(mensaje == 0)
                        {
                            Swal.fire
                            ({
                                icon: 'error',
                                title: 'ERROR',
                                text: 'El usuario no se pudo agregar'
                            }).then
                            (
                                function () { location.reload(); },
                                function () { return false; }
                            );
                        }
                        form[0].reset()                
                    },
                    error: function(){
                        console.log('ERROR')
                    }
                })
            },
            onError : function(e){
            }
          })
          
        //Validacion de campos en MODIFICAR
        $('#frmUsuario').validetta({
            onValid : function(e) {
              e.preventDefault();
                // Modificar sitio
                var form = $('#frmUsuario')
                var method = form.attr('method')
                var action = form.attr('action')
                var data = form.serialize()
                $.ajax({
                    type : method,
                    url : action,
                    data : data,
                    success : function(response){
                        var mensaje = (response)?1:0;
                        if(mensaje == 1)
                        {
                            Swal.fire
                            ({
                                icon: 'success',
                                title: 'Exito',
                                text: 'El usuario fue modificado con exito'
                            }).then
                            (
                                function () { window.location.href = url+'usuario/index'; },
                                function () { return false; }
                            );
                        }
                        else if(mensaje == 0)
                        {
                            Swal.fire
                            ({
                                icon: 'error',
                                title: 'ERROR',
                                text: 'El usuario no se pudo modificar'
                            }).then
                            (
                                function () { location.reload(); },
                                function () { return false; }
                            );
                        } 
                    },
                    error : function(){
                        console.log('Error al procesar AJAX')
                    }
                })
            },
            onError : function(e){
            }
          })  
})