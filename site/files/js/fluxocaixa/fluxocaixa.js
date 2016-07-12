var fluxocaixa = new function () {
    this.mostrar = function () {
        $.ajax({
            url: "/fluxocaixa/mostrar",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idCliente": $("#idCliente").val(),
                "idFornecedor": $("#idFornecedor").val(),
                "dtDe": $("#dtDe").val(),
                "dtAte": $("#dtAte").val(),
                "idDespesa": $("#idDespesa").val(),
                "idReceita": $("#idReceita").val(),
                "dsObservacao": $("#dsObservacao").val()
            },
            success: function (dataReturn) {
                $("#mostrarresultado").html(dataReturn.html);
            }
        });
    };
};