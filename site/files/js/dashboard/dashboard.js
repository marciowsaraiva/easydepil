$(document).ready(function () {
    $(".data").mask("99/99/9999");
    $.datepicker.setDefaults({
        defaultDate: null,
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: 'dd/mm/yy'
    });
    $("#data_inicial").datepicker({
        onClose: function (selectedDate) {
            $("#data_final").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#data_final").datepicker({
        onClose: function (selectedDate) {
            $("#data_inicial").datepicker("option", "maxDate", selectedDate);
        }
    });
    $("#data_inicial_evento").datepicker({
        onClose: function (selectedDate) {
            $("#data_final_evento").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#data_final_evento").datepicker({
        onClose: function (selectedDate) {
            $("#data_inicial_evento").datepicker("option", "maxDate", selectedDate);
        }
    });
    $("#data_inicial_resumo").datepicker({
        onClose: function (selectedDate) {
            $("#data_final_resumo").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#data_final_resumo").datepicker({
        onClose: function (selectedDate) {
            $("#data_inicial_resumo").datepicker("option", "maxDate", selectedDate);
        }
    }); 
    
});
var dashboard = new function () {
            var now = new Date;
            this.agendaprofissional = function() {
                $.ajax({
                    type: "POST",
                    data: {
                        "idProfissional": $("#idProfissional").val(),
                        "dtInicio": $("#datainicio").val(),
                        "idAgendaHorario": null
                    },
                    url: "/dashboard/agendaprofissional/",
                    dataType: "json",
                    async: false,
                    success: function (dataReturn) {
                        location.reload();                                         
                    }
                });
            };
            this.voltar = function() {
                $.ajax({
                    type: "POST",
                    data: {
                        "idAgendaHorario": $("#idAgendaHorario").val(),
                        "idProfissional": null,
                        "dtInicio": $("#datainicio").val()
                    },
                    url: "/dashboard/voltar",
                    dataType: "json",
                    async: false,
                    success: function (dataReturn) {
                        $("#mostraragendacompleta").html(dataReturn.html);
//                        $("#mostrarprofissionales").html(dataReturn.html2);
                        $("#mostrarperiodos").html(dataReturn.html3);
                    }
                });
            };
            this.agendageral = function(tipo) {
                $.ajax({
                    type: "POST",
                    data: {
                        "tipo": tipo
                    },
                    url: "/dashboard/agendageral",
                    dataType: "json",
                    async: false,
                    success: function (dataReturn) {
                        $("#mostraragendageral").html(dataReturn.html);
                        window.location.href = "#mostraragendageral";
                    }
                });
            };
            this.avancar = function() {
                $.ajax({
                    type: "POST",
                    data: {
                        "idAgendaHorario": $("#idAgendaHorario").val(),
                        "idProfissional": null,
                        "dtInicio": $("#datainicio").val()
                    },
                    url: "/dashboard/avancar",
                    dataType: "json",
                    async: false,
                    success: function (dataReturn) {
                        $("#mostraragendacompleta").html(dataReturn.html);
//                        $("#mostrarprofissionales").html(dataReturn.html2);
                        $("#mostrarperiodos").html(dataReturn.html3);
                    }
                });
            };
            this.gravarhorario = function() {
                var erro = false;
                if ($("#idCliente").val() === '' || $("#idCliente").val() === 0) {
                    alert('Favor escolher o cliente');
                    erro = true;
                }
                if ($("#idTratamento").val() === '' || $("#idTratamento").val() === 0) {
                    alert('Favor escolher o tratamento');
                    erro = true;
                }
                if ($("#hora").val() === '') {
                    alert('Favor digitar um horário');
                    erro = true;
                }
                
                if (erro === false) {
                    $.ajax({
                        type: "POST",
                        data: {
                            "idTratamento": $("#idTratamento").val(),
                            "idCliente": $("#idCliente").val(),
                            "descricao": $("#observacao").val(),
                            "hrAgenda": $("#hora").val()
                        },
                        url: "/dashboard/gravarhorario",
                        dataType: "json",
                        async: false,
                        success: function (dataReturn) {
                            $("#listaagendadia").html(dataReturn.html);
                        }
                    });
                }
            };
            this.gravaratendimento = function(idCliente, idAgenda) {
                var erro = false;
                if ($("#valorpago").val() === '' || $("#valorpago").val() === 0) {
                    alert('Favor digitar o valor pago');
                    erro = true;
                }
                if ($("#idFormaPagamento").val() === '' || $("#idFormaPagamento").val() === 0) {
                    alert('Favor escolher a forma de pagamento');
                    erro = true;
                }
                
                if (erro === false) {
                    $.ajax({
                        type: "POST",
                        data: {
                            "idFormaPagamento": $("#idFormaPagamento").val(),
                            "valorpago": $("#valorpago").val(),
                            "idAgenda": idAgenda,
                            "idCliente": idCliente
                        },
                        url: "/dashboard/gravaratendimento",
                        dataType: "json",
                        async: false,
                        success: function (dataReturn) {
                            $("#listaagendadia").html(dataReturn.html);
                        }
                    });
                }
            };
            
            this.mudaragenda = function (idAgenda, status) {
                $.ajax({
                    type: "POST",
                    data: {
                        "idAgenda": idAgenda,
                        "status": status
                    },
                    url: "/dashboard/mudarstatus",
                    dataType: "json",
                    async: false,
                    success: function (dataReturn) {
                        $("#listaagendadia").html(dataReturn.html);
                    }
                });                
            };
            
            this.escolheudia = function(dia) {
                $.ajax({
                    type: "POST",
                    data: {
                        "dia": dia,
                        "dataescolhida": $('#datainicio').val()
                    },
                    url: "/dashboard/leragendadodia",
                    dataType: "json",
                    async: false,
                    success: function (dataReturn) {
                        $("#listaagendadia").html(dataReturn.html);
                    }
                });
            };
            
            this.event = new function () {
                this.reload = function () {
                    $.ajax({
                        type: "POST",
                        data: {
                            "idProjeto": $("#idProjeto_event").val(),
                            "dt_ini": $("#data_inicial_resumo").val(),
                            "dt_fin": $("#data_final_resumo").val()
                        },
                        url: "/dashboard/reloadDataEvent/",
                        dataType: "json",
                        async: false,
                        success: function (dataReturn) {
                            $("#data_event").html(dataReturn);
                        }
                    });
                };
                this.filtraGrafico = function () {
                    if (this.validate('evento')) {
                        $.ajax({
                            type: "POST",
                            data: {
                                "idProjeto": $("#idProjeto_event").val(),
                                "dt_ini": $("#data_inicial_evento").val(),
                                "dt_fin": $("#data_final_evento").val()
                            },
                            url: "/dashboard/reloadGraficoEvent/",
                            dataType: "json",
                            async: false,
                            success: function (dataReturn) {
                                $("#div-event-chart").html(dataReturn);
                            }
                        });
                    }
                };
                this.validate = function (tipo) {
                    var status = true;
                    var error = '';

                    if ($("#data_inicial_" + tipo).val() === "" && $("#data_final_" + tipo).val() === "") {
                        error += "Insira um periodo<br />";
                        status = false;
                    } else {
                        if ($("#data_inicial_" + tipo).val() === "") {
                            error += "Insira uma data inicial<br />";
                            status = false;
                        }
                        if ($("#data_final_" + tipo).val() === "") {
                            error += "Insira uma data final<br />";
                            status = false;
                        }
                    }

                    if (!status) {
                        showMessage(error);
                    }
                    return status;
                };
            };
            this.troca = new function () {
                this.reload = function () {
                    if (this.validate()) {
                        $.ajax({
                            type: "POST",
                            data: {
                                "idProjeto": $("#idProjeto_troca").val(),
                                "dt_ini": $("#data_inicial").val(),
                                "dt_fin": $("#data_final").val()
                            },
                            url: "/dashboard/reloadDataTroca/",
                            dataType: "json",
                            async: false,
                            success: function (dataReturn) {
                                $("#data_troca").html(dataReturn);
                            }
                        });
                    }
                };
                this.validate = function () {
                    var status = true;
                    var error = '';

                    if ($("#data_inicial").val() === "" && $("#data_final").val() === "") {
                        error += "Insira um periodo<br />";
                        status = false;
                    } else {
                        if ($("#data_inicial").val() === "") {
                            error += "Insira uma data inicial<br />";
                            status = false;
                        }
                        if ($("#data_final").val() === "") {
                            error += "Insira uma data final<br />";
                            status = false;
                        }
                    }

                    if (!status) {
                        showMessage(error);
                    }
                    return status;
                };
            };
        };
        
var atendimento_modal = new function () {
    this.show = function (idAgenda, idCliente, nomeCliente, nomeTratamento) {
        jQuery.ajax({
            async: false,
            type: "post",
            dataType: "html",
            url: "/dashboard/veratendimento",
            data: {
                "idAgenda": idAgenda,
                "idCliente": idCliente,
                "nomeCliente": nomeCliente,
                "nomeTratamento": nomeTratamento
            },
            complete: function (event, XMLHttpRequest) {
                if (("success" == XMLHttpRequest) && (undefined != event.responseText)) {
                    try {
                        $('#atendimento_show').each(function () {
                            $('.modal-body', this).html(event.responseText);
                            $(this).modal('show');
                        });
                    } catch (e) {
                        console.log(e);
                    }
                }
            }
        });
    };
};        
