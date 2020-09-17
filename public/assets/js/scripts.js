$(document).ready(function (){
    //cerrar alertas automaticamente
    $('.alert[data-auto-dismiss]').each(function (index, element){
        const $element = $(element),
            timeout = $element.data('auto-dimiss')|| 1500;
        setTimeout(function (){
            $element.alert('close');
        }, timeout);
    });
    $('body').tooltip({
        trigger: 'hover',
        selector: '.tooltipsC',
        placement: 'top',
        html: true,
        container: 'body'
    });
    $('ul.sidebar-menu').find('li.active').parents('li').addClass('active');

    //trabajo con ventana de roles
    const modal = $('#modal-seleccionar-rol');
    if (modal.length && modal.data('rol-set') == 'NO'){
        modal.modal('show');
    }
    //Asignar rol
    $('.asignar-rol').on('click', function(event){
        event.preventDefault();
        const data = {
            rol_id : $(this).data('rolid'),
            rol_nombre : $(this).data('rolnombre'),
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, '/ajax-sesion', 'asignar-rol');
    });

    function ajaxRequest(data, url, funcion){
        $.ajax({
            url: url,
            type:'POST',
            data: data,
            success: function(respuesta){
                if(funcion == 'asignar-rol' && respuesta.mensaje == 'ok'){
                    $('#modal-seleccionar-rol').hide();
                    location.reload();
                }
            }
        });
    }
});

