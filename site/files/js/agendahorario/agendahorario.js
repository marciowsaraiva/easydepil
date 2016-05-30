//Valida Formulario Antes de Enviar
function validaFormulario() {
    var stats = true;
    var errorText = '';  
    

    if ($.trim($('#descricao').val()) === '') {
        errorText += 'A descrição é obrigatória!';
        stats = false;
    }

    if (errorText) {
        showMessage(errorText);
    }

    return stats;
}

function delcolaborador(idColaborador) {
        $.ajax({
            url: "/agendahorario/delcolaborador",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idAgendaHorario": $("#idAgendaHorario").val(),
                "idColaborador": idColaborador
            },
            success: function (dataReturn) {
                $("#mostrarcolaboradores").html(dataReturn.html);
                location.reload();                 
            }
        });
};
function editarColaborador(idColaborador, dsColaborador) {
    document.getElementById("labelcolaborador").innerHTML ='Status da Agenda para o Colaborador: ' + dsColaborador;
    $("#idColaboradorEscolhido").val(idColaborador);
    $("#btnAtualizar").removeAttr('disabled');
    $("#idTipoAgenda").removeAttr('readonly');
    $("#datainicion").removeAttr('readonly');
    $("#datafinaln").removeAttr('readonly');
}
function atualizarColaborador() {
    var idColaborador = $("#idColaboradorEscolhido").val();
    var idAgendaHorario = $("#idAgendaHorario").val();
    $.ajax({
        url: "/agendahorario/editarColaborador",
        dataType: "json",
        async: false,
        type: "POST",
        data: {
            "idAgendaHorario": idAgendaHorario,
            "idColaborador":  idColaborador,
            "idTipoAgenda": $("#idTipoAgenda").val(),
            "dtInicio": $("#datainicion").val(),
            "dtFim": $("#datafinaln").val()
        },
        success: function (dataReturn) {
            location.reload();                 
        }
    });    
}

function gravarcolaborador() {
        $("btnGravarColaborador").val('Aguarde....');
        $.ajax({
            url: "/agendahorario/gravaColaborador",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idAgendaHorario": $("#idAgendaHorario").val(),
                "idColaborador":  $("#idColaborador").val()
            },
            success: function (dataReturn) {
                $("#mostrarcolaboradores").html(dataReturn.html);
                $("#btnGravarColaborador").val('Adiciona Colaborador');
                location.reload();                 
            }
        });    
};
//$(document).ready(function () {
//    $('#descricao').focus();  
//    $(".panel-item div.panel-body").hide();
//    $("div.panel-heading").bind("click", function () {
//        $(this).next().slideToggle('slow');
//        return false;
//    });
//
//    $('#btnInsereMenu').click(function(){
//     $('#painel_menu').fadeOut(3000);
//     $('#painel_menu').fadeIn(3000);     
//    });
//});
