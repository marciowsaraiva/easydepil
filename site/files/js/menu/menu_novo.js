//Valida Formulario Antes de Enviar
function validaFormulario() {
    var stats = true;
    var errorText = '';

    if ($.trim($('#url').val()) === '') {
        errorText += 'O campo url é obrigatório<br>';
        stats = false;
    }  
    
    if ($.trim($('#descricao').val()) === '') {
        errorText += 'O campo Descrição é obrigatório';
        stats = false;
    }      

    if (errorText) {
        showMessage(errorText);
    }

    return stats;
}

$(document).ready(function() {
    
    $('#url').focus();
    
 });    