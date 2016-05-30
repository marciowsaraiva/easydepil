var os = new function () {
    this.verhoras = function () {
        $.ajax({
            url: "/os/verhoras",
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
            url: "/os/novoos",
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
    this.delOS = function(idOS) {
        $.ajax({
            url: "/os/delOS",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": idOS
            },
            success: function (dataReturn) {
                location.reload();  
            }
        });
    };
    this.delOSColaborador = function(idOS, idColaborador) {
        $.ajax({
            url: "/os/delOSColaborador",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "dtInicio": $("#dtInicio").val(),
                "dtFim": $("#dtFim").val(),
                "idOS": idOS,
                "idColaborador": idColaborador
            },
            success: function (dataReturn) {
                $("#mostrarcolaboradoresos").html(dataReturn.html);
            }
        });
    };
    this.reservarColaborador = function(idColaborador, dsColaborador) {
        document.getElementById("labelcolaborador").innerHTML ='Selecionar o Colaborador: ' + dsColaborador + ' para esta O.S.';
        $("#idColaboradorEscolhido").val(idColaborador);
        $("#btnReservar").removeAttr('disabled');
        $("#datainicion").removeAttr('readonly');
        $("#datafinaln").removeAttr('readonly');
    };
    this.selecionaColaborador = function() {
        var idColaborador = $("#idColaboradorEscolhido").val();
        $.ajax({
            url: "/os/editarColaborador",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idColaborador":  idColaborador,
                "idOS": $("#idOS").val(),
                "dtInicio": $("#datainicion").val(),
                "dtFim": $("#datafinaln").val()
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