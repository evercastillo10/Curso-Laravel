$(document).ready(function(){
    $("#tabla-data").on('submit','.form-eliminar', function(){
        event.preventDefault();
        const form = $(this);
        swal({
            title:'¿Estas seguro que quieres eliminar este permiso?',
            text: '¡Esta acción no se puede deshacer!',
            icon: 'warning',
            buttons: {
                confirm: 'Aceptar',
                cancel: 'Cancelar',
            },
        }).then((value) => {
            if(value){
                ajaxRequest(form);
            }
        });
    });

    function ajaxRequest(form){
        $.ajax({
            url: form.attr('action'),
            type : 'POST',
            data: form.serialize(),
            success: function(respuesta){
                if(respuesta.mensaje == 'ok'){
                    form.parents('tr').remove();
                    Biblioteca.notificaciones('El registro se ha eliminado correctamente', 'Biblioteca', 'success');
                } else {
                    Biblioteca.notificaciones('No se pudo eliminar el permiso', 'Biblioteca', 'error');
                }
            },
            error:function(){

            }
        });
    }
});
