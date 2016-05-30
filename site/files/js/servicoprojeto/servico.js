function lerservico() {
        $.ajax({
            url: "/servicoprojeto/lerservico",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idServico": $("#idServico").val()
            },
            success: function (dataReturn) {
                $("#vlUnitarioServico").val(dataReturn.vlUnitario);
            }
        });
};
function gravarservicoprojeto() {
        $.ajax({
            url: "/servicoprojeto/gravarservico",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idServico": $("#idServico").val(),
                "dsObservacaoServico": $("#dsObservacaoServico").val(),
                "vlTotalServico": $("#vlTotalServico").val(),
                "qtServico": $("#qtServico").val(),
                "vlUnitarioServico": $("#vlUnitarioServico").val(),
                "idProjetoServico": $("#idProjetoServico").val()
            },
            success: function (dataReturn) {
                $("#servicosprojeto").html(dataReturn.html);
                $("#vlOrcado").val(dataReturn.total);
                $("#dsObservacaoServico").val('');
                $("#vlTotalServico").val('');
                $("#qtServico").val('');
                $("#vlUnitarioServico").val('');
            }
        });    
}
function delservico(id) {
        $.ajax({
            url: "/servicoprojeto/delservico",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "id": id,
                "idProjetoServico": $("#idProjetoServico").val()
            },
            success: function (dataReturn) {
                $("#servicosprojeto").html(dataReturn.html);
                $("#vlOrcado").val(dataReturn.total);
            }
        });    
}
function lerfasedoprojeto() {
//        alert(' projeto: ' + $("#idProjeto").val())
        $.ajax({
            url: "/servicoprojeto/lerfasedoprojeto",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idProjeto": $("#idProjeto").val()
            },
            success: function (dataReturn) {
                $("#listarfase").html(dataReturn);
            }
        });
};
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
function calcularvalor() {
    var quantidade = $('#qtServico').val();
    var valorunitario = $('#vlUnitarioServico').val();   
    $('#vlTotalServico').val(quantidade * valorunitario);
}   
