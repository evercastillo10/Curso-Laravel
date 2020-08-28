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
});

