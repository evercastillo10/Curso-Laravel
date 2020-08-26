$(document).ready(function(){
    $("#tabla-data").on('submit', '.form-eliminar', function(){
        event.preventDefault();
        const form = $(this);
        swal({
            title:'¿Estas seguro de que deseas eliminar este registro?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) =>{
            if(value){
                ajaxRequest(form);
            }
        });
     });

     function ajaxRequest(form){
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta){
                if (respuesta.mensaje == "ok"){
                    form.parents('tr').remove();
                    Biblioteca.notificaciones('El Registro fue eliminaro correctamente', 'Biblioteca', 'success');
                } else {
                    Biblioteca.notificaciones('El registro no pudo ser eliminaro, hay recursos usandolo', 'Biblioteca', 'error');
                }

            },
            error: function(){

            }
        });
    }
});
