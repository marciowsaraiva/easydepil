var pedido = new function () {
    this.editarfinanceiro = function (parcela) {
        $("#dtVencimento-" + parcela).removeAttr('disabled');
        $("#vlParcela-" + parcela).removeAttr('disabled');
    };
    this.alterarfinanceiro = function (item, nrParcela) {
        $.ajax({
            url: "/pedido/alterar_financeiro",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idFinanceiroParcela": item,
                "dtVencimento": $("#dtVencimento-" + nrParcela).val(),
                "vlParcela": $("#vlParcela-" + nrParcela).val()
            },
            success: function (dataReturn) {
                location.reload(); 
            }
        });
    };    
    this.gravarcabecalho = function () {
        $.ajax({
            url: "/pedido/gravar_pedido",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idFornecedor": $("#idFornecedor").val(),
                "dtPedido": $("#dtPedido").val(),
                "nrPedido": $("#nrPedido").val(),
                "dsObservacao": $("#dsObservacao").val()
            },
            success: function (dataReturn) {
                $("#idPedido").val(dataReturn.idPedido);
                location.reload(); 
            }
        });
    };
    this.gravaritem = function () {
        $.ajax({
            url: "/pedido/gravar_item",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idPedido": $("#idPedido").val(),
                "idFornecedor": $("#idFornecedor").val(),
                "idInsumo": $("#idInsumo").val(),
                "idLocalEstoque": $("#idLocalEstoque").val(),
                "idCentroCusto": $("#idCentroCusto").val(),
                "idOS": $("#idOS").val(),
                "idMotivo": $("#idMotivo").val(),
                "idMaquina": $("#idMaquina").val(),
                "qtPedido": $("#qtPedido").val(),
                "vlPedido": $("#vlPedido").val(),
                "dsObservacao": $("#dsObservacaoItem").val()
            },
            success: function (dataReturn) {
                $("#idPedido").val(dataReturn.idPedido);
                $("#idPedidoItem").val(dataReturn.idPedidoItem);
                $("#idInsumo").val('');
                $("#qtPedido").val(0);
                $("#vlPedido").val(0);
                $("#dsObservacaoItem").val('');
                location.reload(); // '/pedido/novo_pedido/idPedido/' . dataReturn.idPedido
            }
        });
    };
    this.gravarfinanceiro = function () {
        $.ajax({
            url: "/pedido/gravar_financeiro",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idPedido": $("#idPedido").val(),
                "dtPrevisaoEntrega": $("#dtPrevisaoEntrega").val(),
                "dtPrimeiroVencimento": $("#dtPrimeiroVencimento").val(),
                "qtParcelas": $("#qtParcelas").val(),
                "dsObservacao": $("#dsObservacao").val()
            },
            success: function (dataReturn) {
                $("#idFinanceiro").val(dataReturn.idFinanceiro);
                location.reload('/pedido/financeiro'); 
            }
        });
    };
    this.novopedido = function () {
        $.ajax({
            url: "/pedido/novopedido",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idPedido": $("#idPedido").val()
            },
            success: function (dataReturn) {
                $("#idPedido").val(dataReturn.idPedido);   
                location.reload();
            }
        });
    };
    this.lerunidade = function () {
        $.ajax({
            url: "/pedido/lerunidade",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idInsumo": $("#idInsumo").val()
            },
            success: function (dataReturn) {
                $("#dsUnidade").val(dataReturn.dsUnidade);
                $("#qtEstoque").val(dataReturn.qtEstoque);
            }
        });
    };
    this.desabilitaid = function() {
        $.ajax({
            url: "/pedido/desabilitaid",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idPedido": $("#idPedido").val()
            },
            success: function () {
                location.reload('/dashboard');  
            }
        });
        return true;
    };
    this.delpedidoitem = function(item) {
        $.ajax({
            url: "/pedido/delpedidoitem",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idPedidoItem": item
            },
            success: function (dataReturn) {
                location.reload();  
            }
        });
    };
    this.delfinanceiroitem = function(item) {
        $.ajax({
            url: "/pedido/delfinanceiroitem",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idFinanceiroParcela": item
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
    $("#dtPedido").datepicker({
        defaultDate: null,
        onClose: function (selectedDate) {
            var dia = selectedDate[0] + "" + selectedDate[1];
            var mes = selectedDate[3] + "" + selectedDate[4];
            if ((dia > 31 || dia < 1) || (mes > 12 || mes < 1))
                $("#dtPedido").val("");
        }
    });
    $("#vlPedido").priceFormat({
        prefix: "R$",
        centsSeparator: ',',
        thousandsSeparator: '.',
        limit: 10,
        centsLimit: 2,
        allowNegative: true
    });
    
});