function analise_data() {

    var stats = true;
    var errorText = '';
    
    //Validar datas
    var dataini = $('#edtdataini').val().split("/");
    var datafim = $('#edtdatafim').val().split("/");

    var dataInicio = new Date();
    var dataFim = new Date();

    dataInicio.setFullYear(dataini[2], dataini[1], dataini[0]);
    dataFim.setFullYear(datafim[2], datafim[1], datafim[0]);

    if (dataInicio.getTime() > dataFim.getTime()) {
        errorText += '- A Data de envio não pode ser maior que a de conclusão<br />';
        stats = false;
    }

    if (errorText) {
        showMessage(errorText);
    } else {
        document.frm_relatorio_pre_log_tipo.submit();
    }
    return stats;
}

$(document).ready(function() {
    
    $("#edtdataini").datepicker({
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


    $("#edtdatafim").datepicker({
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



