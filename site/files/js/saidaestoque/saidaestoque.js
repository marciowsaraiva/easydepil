var saidaestoque = new function () {
    this.gravarcabecalho = function () {
        $.ajax({
            url: "/saidaestoque/gravar_movimento",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idTipoMovimento": $("#idTipoMovimento").val(),
                "idCliente": $("#idCliente").val(),
                "dtMovimento": $("#dtMovimento").val(),
                "nrNota": $("#nrNota").val(),
                "nrPedido": $("#nrPedido").val(),
                "dsObservacao": $("#dsObservacao").val()
            },
            success: function (dataReturn) {
             //   $("#idMovimento").val(dataReturn.idMovimento);
                location.reload(); 
            }
        });
    };
    this.gravaritem = function () {
        $.ajax({
            url: "/saidaestoque/gravar_item",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idMovimento": $("#idMovimento").val(),
                "idTipoMovimento": $("#idTipoMovimento").val(),
                "idCliente": $("#idCliente").val(),
                "idInsumo": $("#idInsumo").val(),
                "idCentroCusto": $("#idCentroCusto").val(),
                "idOS": $("#idOS").val(),
                "idMotivo": $("#idMotivo").val(),
                "idMaquina": $("#idMaquina").val(),
                "qtMovimento": $("#qtMovimento").val(),
                "vlMovimento": $("#vlMovimento").val(),
                "nrNota": $("#nrNota").val(),
                "dsObservacao": $("#dsObservacaoItem").val()
            },
            success: function (dataReturn) {
                $("#idMovimento").val(dataReturn.idMovimento);
                $("#idMovimentoItem").val(dataReturn.idMovimentoItem);
                $("#idInsumo").val('');
                $("#qtMovimento").val(0);
                $("#vlMovimento").val(0);
                $("#dsObservacaoItem").val('');
                location.reload(); // '/saidaestoque/novo_saidaestoque/idMovimento/' . dataReturn.idMovimento
            }
        });
    };
    this.novasaida = function () {
        $.ajax({
            url: "/saidaestoque/novasaida",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idMovimento": $("#idMovimento").val()
            },
            success: function (dataReturn) {
                location.reload(); // '/saidaestoque/novo_saidaestoque/idMovimento/' . dataReturn.idMovimento
            }
        });
    };
    this.lerunidade = function () {
        $.ajax({
            url: "/saidaestoque/lerunidade",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idInsumo": $("#idInsumo").val()
            },
            success: function (dataReturn) {
                $("#dsUnidade").val(dataReturn.dsUnidade);
                $("#qtEstoque").val(dataReturn.qtEstoque);
                $("#vlUltimaCompra").val(dataReturn.vlUltimaCompra);
            }
        });
    };
    this.calcularqtde = function () {
        $("#vlMovimento").val($("#qtMovimento").val() * $("#vlUltimaCompra").val());
    };
    this.desabilitaid = function() {
        $.ajax({
            url: "/saidaestoque/desabilitaid",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idMovimento": $("#idMovimento").val()
            },
            success: function () {
                location.reload('/dashboard');  
            }
        });
        return true;
    };
    this.delmovimentoitem = function(item) {
        $.ajax({
            url: "/saidaestoque/delmovimentoitem",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idMovimentoItem": item
            },
            success: function (dataReturn) {
                location.reload();  
            }
        });
    };
};
$(document).ready(function () {
    $.datepicker.setDefaults({
        defaultDate: null,
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: "dd/mm/yy"
    });
    $("#dtMovimento").datepicker({
        defaultDate: null,
        onClose: function (selectedDate) {
            var dia = selectedDate[0] + "" + selectedDate[1];
            var mes = selectedDate[3] + "" + selectedDate[4];
            if ((dia > 31 || dia < 1) || (mes > 12 || mes < 1))
                $("#dtMovimento").val("");
        }
    });
    $("#vlMovimento").priceFormat({
        prefix: "R$",
        centsSeparator: ',',
        thousandsSeparator: '.',
        limit: 10,
        centsLimit: 2,
        allowNegative: true
    });
    
});