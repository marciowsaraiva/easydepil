//Valida o Formulario Antes de Enviar
function validaFormulario() {
    var stats = true;
    var errorText = '';

    //Valida Mensagem
    if ($.trim($('#mensagem').val()) === '') {
        $('#mensagem').parent().addClass("has-error");
        errorText += '- ' + 'Selecione a mensagem<br />';
        stats = false;
    }

    //Em caso de erro mostra dentro do dock
    if (errorText) {
        $.ionSound.play("bell_ring");
        mensagem_dock(errorText, 'alert-danger');//passo o parametro danger!
    }

    return stats;
}

$(document).ready(function() {
    $.ionSound({
        sounds: [
            "beer_can_opening",
            "bell_ring",
            "branch_break",
            "water_droplet"
        ],
        path: "/files/sounds/",
        multiPlay: true,
        volume: "1.0"
    });
    $("#btnVoltar").on("click", function() {
        $.ionSound.play("beer_can_opening");
    });

});

$(document).ready(function() {
    
    $("#data").datepicker({
        showOn: "button",
        buttonImage: "/files/images/calendar.gif",
        dateFormat: 'dd/mm/yy',
        buttonImageOnly: true,
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });    



});
