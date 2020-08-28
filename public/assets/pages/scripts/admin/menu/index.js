$(document).ready(function (){
    $('#nestable').nestable().on('change', function(){
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin/menu/guardar-orden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function(respuesta){
                if (respuesta.mensaje == "ok"){
                    Biblioteca.notificaciones('El Menu fue actualizado correctamente', 'Biblioteca', 'success');
                } else {
                    Biblioteca.notificaciones('El menu no pudo ser actualizado, vuelve a intentarlo mas tarde', 'Biblioteca', 'error');
                }
            }
        });
    });

    $('.eliminar-menu').on('click', function(event){
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: '¿Estas seguro de eliminar el menú?',
            text: "¡Esta accion no se puede deshacer!",
            icon: 'warning',
            buttons: {cancel: "Cancelar", confirm: "Confirmar"},
        }).then((value)=>{
            if(value){
                window.location.href = url;
            }
        });
    })
    $('#nestable').nestable('expandAll');
});
