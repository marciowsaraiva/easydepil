var ostarefa = new function () {
    this.verhoras = function () {
        $.ajax({
            url: "/ostarefa/verhoras",
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
            url: "/ostarefa/novoos",
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
    this.gravarostarefa = function () {
        $.ajax({
            url: "/ostarefa/gravar_ostarefa",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val(),
                "idTarefa": $("#idTarefa").val(),
                "dtInicioTarefa": $("#dtInicioTarefa").val(),
                "dtFimTarefa": $("#dtFimTarefa").val(),
                "dsObservacaoTarefa": $("#dsObservacaoTarefa").val()
            },
            success: function (dataReturn) {
                $('#mostrartarefas').html(dataReturn.html);
                $('#idOSTarefa').val(dataReturn.idOSTarefa);
                $('#idTarefa').attr('disabled','disabled');
                $('#dsObservacaoTarefa').attr('disabled','disabled');
                $('#dtInicioTarefa').attr('disabled','disabled');
                $('#dtFimTarefa').attr('disabled','disabled');
                $('#btn-adicionainsumo').removeAttr('disabled');
                $('#btn-adicionamaoobra').removeAttr('disabled');
                $('#btn-adicionamaquina').removeAttr('disabled');
                $('#btn-adicionamaqparada').removeAttr('disabled');
            }
        });
    };
    this.editaOSTarefa = function (idOSTarefa) {
        $('#idOSTarefa').val(idOSTarefa);

        $('#btn-adicionainsumo').removeAttr('disabled');
        $('#btn-adicionamaoobra').removeAttr('disabled');
        $('#btn-adicionamaquina').removeAttr('disabled');
        $('#btn-adicionamaqparada').removeAttr('disabled');
        
        $('#idTarefa').attr('disabled','disabled');
        $('#dsObservacaoTarefa').attr('disabled','disabled');
        $('#dtFimTarefa').attr('disabled','disabled');
        $('#dtInicioTarefa').attr('disabled','disabled');

        $.ajax({
            url: "/ostarefa/edita_ostarefa",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val(),
                "idOSTarefa": idOSTarefa
            },
            success: function (dataReturn) {
                $("#mostrarmaodeobra").html(dataReturn.htmlMaoObra);
                $("#mostrarinsumos").html(dataReturn.htmlInsumo);
                $("#mostrarmaquina").html(dataReturn.htmlMaquina);
                $("#mostrarmaquinaparada").html(dataReturn.htmlMaquinaParada);
            }
        });
    };
    this.novaostarefa = function () {
        $('#btn-adicionainsumo').attr('disabled','disabled');
        $('#btn-adicionamaoobra').attr('disabled','disabled');
        $('#btn-adicionamaquina').attr('disabled','disabled');
        
        $('#idTarefa').removeAttr('disabled');
        $('#dsObservacaoTarefa').removeAttr('disabled');
        $('#dtFimTarefa').removeAttr('disabled');
        $('#dtInicioTarefa').removeAttr('disabled');
        location.reload();                         
    };
    this.delOS = function(idOS) {
        $.ajax({
            url: "/ostarefa/delOS",
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
            url: "/ostarefa/delOSColaborador",
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
    this.delOSTarefa = function(idOSTarefa) {
        $.ajax({
            url: "/ostarefa/delOSTarefa",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOSTarefa": idOSTarefa
            },
            success: function () {
               location.reload();
            }
        });
    };
    this.delOSTarefaInsumo = function(idOSTarefa,idOSTarefaInsumo) {
        $.ajax({
            url: "/ostarefa/delOSTarefaInsumo",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOSTarefa": idOSTarefa,
                "idOSTarefaInsumo": idOSTarefaInsumo
            },
            success: function (dataReturn) {
                $("#mostrarinsumos").html(dataReturn.htmlInsumo);
            }
        });
    };
    this.delOSTarefaMaoObra = function(idOSTarefa,idOSTarefaMaoObra) {
        $.ajax({
            url: "/ostarefa/delOSTarefaMaoObra",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOSTarefa": idOSTarefa,
                "idOSTarefaMaoObra": idOSTarefaMaoObra
            },
            success: function (dataReturn) {
                $("#mostrarmaodeobra").html(dataReturn.htmlMaoObra);
            }
        });
    };
    this.delOSTarefaMaquina = function(idOSTarefa,idOSTarefaMaquina) {
        $.ajax({
            url: "/ostarefa/delOSTarefaMaquina",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOSTarefa": idOSTarefa,
                "idOSTarefaMaquina": idOSTarefaMaquina
            },
            success: function (dataReturn) {
                $("#mostrarmaquina").html(dataReturn.htmlMaquina);
            }
        });
    };
    this.gravarmaoobra = function() {
        $.ajax({
            url: "/ostarefa/gravar_maoobra",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOSTarefa": $("#idOSTarefa").val(),
                "idMaoObra": $("#idColaboradorMO").val(),
                "idOS": $("#idOS").val(),
                "dtInicio": $("#dtInicioMOTarefa").val(),
                "dtFim": $("#dtFimMOTarefa").val(),
                "dsObservacaoMaoObra": $("#dsObservacaoMaoObra").val()
            },
            success: function (dataReturn) {
                $("#mostrarmaodeobra").html(dataReturn.html);
                $("#idColaboradorMO").val('');
                $("#dsObservacaoMaoObra").val('');
            }
        });
    };
    this.gravarinsumo = function() {
        $.ajax({
            url: "/ostarefa/gravar_insumo",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val(),
                "idOSTarefa": $("#idOSTarefa").val(),
                "idInsumo": $("#idInsumo").val(),
                "qtInsumo": $("#qtInsumo").val(),
                "dsObservacaoInsumo": $("#dsObservacaoInsumo").val()
            },
            success: function (dataReturn) {
                $("#mostrarinsumos").html(dataReturn.html);
                $("#idInsumo").val('');
                $("#qtInsumo").val('');
                $("#dsObservacaoInsumo").val('');
            }
        });
    };
    this.gravarmaquina = function() {
        $.ajax({
            url: "/ostarefa/gravar_maquina",
            dataType: "json",
            async: false,
            type: "POST",
            data: {
                "idOS": $("#idOS").val(),
                "idOSTarefa": $("#idOSTarefa").val(),
                "idMaquina": $("#idMaquinaP").val(),
                "qtMaquina": $("#qtMaquina").val(),
                "dsObservacaoMaquina": $("#dsObservacaoMaquina").val()
            },
            success: function (dataReturn) {
                $("#mostrarmaquina").html(dataReturn.html);
                $("#idMaquina").val('');
                $("#dsObservacaoMaquina").val('');
                $("#qtMaquina").val('');
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
            url: "/ostarefa/editarColaborador",
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
    
    $(".panel-item div.panel-body").hide();
    $("div.panel-heading").bind("click", function () {
        $(this).next().slideToggle('slow');
        return false;
    });

    $('#btnInsereMenu').click(function(){
     $('#painel_menu').fadeOut(3000);
     $('#painel_menu').fadeIn(3000);     
    });
    
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