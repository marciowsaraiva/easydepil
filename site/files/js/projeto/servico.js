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

function lerunidade() {
        $.ajax({
            url: "/servico/lerunidade",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idInsumo": $("#idInsumo").val()
            },
            success: function (dataReturn) {
                $("#dsUnidadeInsumo").val(dataReturn.dsUnidade);
                $("#vlUnitarioInsumo").val(dataReturn.vlUnitario);
            }
        });
};
function gravarinsumo () {
        $.ajax({
            url: "/servico/gravar_insumo",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idServico": $("#idServico").val(),
                "idInsumo": $("#idInsumo").val(),
                "qtInsumo": $("#qtInsumo").val(),
                "vlUnitarioInsumo": $("#vlUnitarioInsumo").val(),
                "vlTotalInsumo": $("#vlTotalInsumo").val(),
                "dsObservacaoInsumo": $("#dsObservacaoInsumo").val()
            },
            success: function (dataReturn) {
                $("#idServico").val(dataReturn.idServico);
                $("#idInsumo").val('');
                $("#qtInsumo").val('');
                $("#vlUnitarioInsumo").val('');
                $("#vlTotalInsumo").val('');
                $("#dsObservacaoInsumo").val('');
                location.reload(); 
            }
        });
    };

function calcularvalor() {
    var quantidade = $('#qtInsumo').val();
    var valorunitario = $('#vlUnitarioInsumo').val();   
    $('#vlTotalInsumo').val(quantidade * valorunitario);
}   

function lerunidademo() {
        $.ajax({
            url: "/servico/lerunidademo",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idMaoObra": $("#idMaoObra").val()
            },
            success: function (dataReturn) {
                $("#dsUnidadeMaoObra").val(dataReturn.dsUnidade);
                $("#vlUnitarioMaoObra").val(dataReturn.vlUnitario);
            }
        });
};
function gravarmaoobra () {
        $.ajax({
            url: "/servico/gravar_maoobra",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idServico": $("#idServico").val(),
                "idMaoObra": $("#idMaoObra").val(),
                "qtMaoObra": $("#qtMaoObra").val(),
                "vlUnitarioMaoObra": $("#vlUnitarioMaoObra").val(),
                "vlTotalMaoObra": $("#vlTotalMaoObra").val(),
                "dsObservacaoMaoObra": $("#dsObservacaoMaoObra").val()
            },
            success: function (dataReturn) {
                $("#mostrarmaodeobra").html(dataReturn.html);
                $("#idServico").val(dataReturn.idServico);
                $("#idMaoObra").val('');
                $("#qtMaoObra").val('');
                $("#vlUnitarioMaoObra").val('');
                $("#vlTotalMaoObra").val('');
                $("#dsObservacaoMaoObra").val('');
            }
        });
    };

function calcularvalormo() {
    var quantidade = $('#qtMaoObra').val();
    var valorunitario = $('#vlUnitarioMaoObra').val();   
    $('#vlTotalMaoObra').val(quantidade * valorunitario);
}   

function lerunidademaquina() {
        $.ajax({
            url: "/servico/lerunidademaquina",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idMaquina": $("#idMaquina").val()
            },
            success: function (dataReturn) {
                $("#dsUnidadeMaquina").val(dataReturn.dsUnidade);
                $("#vlUnitarioMaquina").val(dataReturn.vlUnitario);
            }
        });
};
function gravarmaquina() {
        $.ajax({
            url: "/servico/gravar_maquina",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idServico": $("#idServico").val(),
                "idMaquina": $("#idMaquina").val(),
                "qtMaquina": $("#qtMaquina").val(),
                "vlUnitarioMaquina": $("#vlUnitarioMaquina").val(),
                "vlTotalMaquina": $("#vlTotalMaquina").val(),
                "dsObservacaoMaquina": $("#dsObservacaoMaquina").val()
            },
            success: function (dataReturn) {
                $("#idServico").val(dataReturn.idServico);
                $("#idMaquina").val('');
                $("#qtMaquina").val('');
                $("#vlUnitarioMaquina").val('');
                $("#vlTotalMaquina").val('');
                $("#dsObservacaoMaquina").val('');
                location.reload(); 
            }
        });
    };

function calcularvalormaquina() {
    var quantidade = $('#qtMaquina').val();
    var valorunitario = $('#vlUnitarioMaquina').val();   
    $('#vlTotalMaquina').val(quantidade * valorunitario);
}   
$(document).ready(function () {
    $('#descricao').focus();  
    $(".panel-item div.panel-body").hide();
    $("div.panel-heading").bind("click", function () {
        $(this).next().slideToggle('slow');
        return false;
    });

    $('#btnInsereMenu').click(function(){
     $('#painel_menu').fadeOut(3000);
     $('#painel_menu').fadeIn(3000);     
    });
});
