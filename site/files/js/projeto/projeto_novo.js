var msg_aguarde = 
        '<div class="alert alert-info alert-dismissable">'+
        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
        'Aguarde... Carregando Informações<br>'+
        '<div class="bs-example"><div class="progress progress-striped active">'+
        '<div class="progress-bar" style="width: 100%"></div></div></div></div>';

function validaFormulario() {
    var erro = '';
    
    if($("#nome").val().length < 3){
        erro += "<br>- Informe o nome com pelo menos 3 caracteres";
    }
    
    if($("#tipo").val() == "" || $("#tipo").val() == "0"){
        erro += "<br>- Informe o tipo";
    }
    
    if(erro.length > 1){
        showMessage(erro);
        return false;
    }
    
    return true;
}

$(document).ready(function () {
    $.datepicker.setDefaults({
        defaultDate: null,
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: "dd/mm/yy"
    });
    $("#dtAbertura").datepicker({
        defaultDate: null,
        onClose: function (selectedDate) {
            var dia = selectedDate[0] + "" + selectedDate[1];
            var mes = selectedDate[3] + "" + selectedDate[4];
            if ((dia > 31 || dia < 1) || (mes > 12 || mes < 1))
                $("#dtAbertura").val("");
        }
    });
});