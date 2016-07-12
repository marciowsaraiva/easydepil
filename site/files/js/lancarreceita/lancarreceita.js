var lancarreceita = new function () {
    this.gravarreceita = function () {
        $.ajax({
            url: "/lancarreceita/gravar_receita",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idFinanceiro": $("#idFinanceiro").val(),
                "idCliente": $("#idCliente").val(),
                "dtFinanceiro": $("#dtFinanceiro").val(),
                "idFormaPagamento": $("#idFormaPagamento").val(),
                "vlFinanceiro": $("#vlFinanceiro").val(),
                "idReceita": $("#idReceita").val(),
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