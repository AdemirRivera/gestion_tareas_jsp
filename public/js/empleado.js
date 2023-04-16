$(document).ready(function()
{

    mostrarEmpleado()

    function mostrarEmpleado()
    {
        $.ajax
        ({
            type : 'POST',
            url : url+'empleado/mostrarEmpleados',
            success : function(response)
            {
                $("#empleados tbody").html(response)
            }, 
            error : function()
            {
                console.log('error ajax')
            }
        })
    }

        //Validacion de campos en NUEVO
        $('#frmEmpleados').validetta({
            onValid : function(e) {
              e.preventDefault();
              // Agregar empleados
                var form = $("#frmEmpleados")
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
                                text: 'El empleado fue agregado con exito'
                            }).then
                            (
                                function () { window.location.href = url+'empleado/index'; },
                                function () { return false; }
                            );
                        }
                        else if(mensaje == 0)
                        {
                            Swal.fire
                            ({
                                icon: 'error',
                                title: 'ERROR',
                                text: 'El empleado no se pudo agregar'
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
        $('#frmEmpleado').validetta({
            onValid : function(e) {
              e.preventDefault();
                // Modificar empleado
                var form = $('#frmEmpleado')
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
                                text: 'El empleado fue modificado con exito'
                            }).then
                            (
                                function () { window.location.href = url+'empleado/index'; },
                                function () { return false; }
                            );
                        }
                        else if(mensaje == 0)
                        {
                            Swal.fire
                            ({
                                icon: 'error',
                                title: 'ERROR',
                                text: 'El empleado no se pudo modificar'
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