var osmaquinaparada = new function () {
    this.verhoras = function () {
        $.ajax({
            url: "/osmaquinaparada/verhoras",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "dtInicio": $("#dtInicio").val(),
                "dtFim": $("#dtFim").val()
            },
            success: function (dataReturn) {
                $("#mostraragendacompleta").html(dataReturn.html);
            }
        });
    };
    this.novoos = function () {
        $.ajax({
            url: "/osmaquinaparada/novoos",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val()
            },
            success: function (dataReturn) {
                $("#idOS").val(dataReturn.idOS);   
                location.reload();
            }
        });
    };
    this.gravarosmaquinaparada = function () {
        $.ajax({
            url: "/osmaquinaparada/gravar_osmaquinaparada",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val(),
                "idMaquinaParada": $("#idMaquinaParada").val(),
                "idMaquina": $("#idMaquina").val(),
                "idOSTarefa": $("#idOSTarefa").val(),
                "dtInicio": $("#dtInicio").val(),
                "dtFim": $("#dtFim").val(),
                "dsObservacao": $("#dsObservacao").val()
            },
            success: function (dataReturn) {
                $('#mostrarmaquinaparada').html(dataReturn.html);
            }
        });
    };
    this.delOSMaquinaParada = function(idOSMaquinaParada) {
        $.ajax({
            url: "/osmaquinaparada/delOSMaquinaParada",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val(),
                "idOSMaquinaParada": idOSMaquinaParada
            },
            success: function (dataReturn) {
                $('#mostrarmaquinaparada').html(dataReturn.html);
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