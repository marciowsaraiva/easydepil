var lancardespesa = new function () {
    this.gravardespesa = function () {
        $.ajax({
            url: "/lancardespesa/gravar_despesa",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idFinanceiro": $("#idFinanceiro").val(),
                "idFornecedor": $("#idFornecedor").val(),
                "dtFinanceiro": $("#dtFinanceiro").val(),
                "vlFinanceiro": $("#vlFinanceiro").val(),
                "idFormaPagamento": $("#idFormaPagamento").val(),
                "idDespesa": $("#idDespesa").val(),
                "dsObservacao": $("#dsObservacao").val()
            },
            success: function (dataReturn) {
                $("#idFinanceiro").val(dataReturn.idMovimento);
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
    $("#dtFinanceiro").datepicker({
        defaultDate: null,
        onClose: function (selectedDate) {
            var dia = selectedDate[0] + "" + selectedDate[1];
            var mes = selectedDate[3] + "" + selectedDate[4];
            if ((dia > 31 || dia < 1) || (mes > 12 || mes < 1))
                $("#dtFinanceiro").val("");
        }
    });
    $("#vlFinanceiro").priceFormat({
        prefix: "R$",
        centsSeparator: ',',
        thousandsSeparator: '.',
        limit: 10,
        centsLimit: 2,
        allowNegative: true
    });
    
});