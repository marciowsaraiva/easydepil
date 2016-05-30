var osfinalizadas = new function () {
    this.gravarosfinalizadas = function () {
        $.ajax({
            url: "/osfinalizadas/gravar_osfinalizadas",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val(),
                "dsRecomendacaoPM": $("#dsRecomendacaoPM").val(),
                "dtEncerramento": $("#dtEncerramento").val(),
                "nrProximaOS": $("#nrProximaOS").val(),
                "dsRecomendacaoMP": $("#dsRecomendacaoMP").val()
            },
            success: function (dataReturn) {
                window.location.href = "/osfinalizadas";
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
    $("#dtOS").datepicker({
        defaultDate: null,
        onClose: function (selectedDate) {
            var dia = selectedDate[0] + "" + selectedDate[1];
            var mes = selectedDate[3] + "" + selectedDate[4];
            if ((dia > 31 || dia < 1) || (mes > 12 || mes < 1))
                $("#dtOS").val("");
        }
    });
    $("#vlOS").priceFormat({
        prefix: "R$",
        centsSeparator: ',',
        thousandsSeparator: '.',
        limit: 10,
        centsLimit: 2,
        allowNegative: true
    });
    
});