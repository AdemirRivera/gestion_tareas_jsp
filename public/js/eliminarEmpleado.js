$(document).ready(function()
{
    // Eliminar Empleado
    $('body').on('click','#btnEliminar', function(e)
    {
        e.preventDefault()
        var href = $(this).attr('href')
        $.ajax({
            type : 'GET',
            url : href,
            success : function(response)
            {
                var mensaje = (response)?1:0;
                if(mensaje == 1)
                {
                    Swal.fire
                    ({
                        icon: 'success',
                        title: 'Exito',
                        text: 'El usuario fue eliminado con exito'
                    }).then
                    (
                        function () { location.reload(); },
                        function () { return false; }
                    );
                }
                else if(mensaje == 0)
                {
                    Swal.fire
                    ({
                        icon: 'error',
                        title: 'ERROR',
                        text: 'El usuario no se pudo eliminar'
                    }).then
                    (
                        function () { location.reload(); },
                        function () { return false; }
                    );
                }
            },
            error: function()
            {
                console.log('Error al procesar AJAX')
            }
        })
    })

})