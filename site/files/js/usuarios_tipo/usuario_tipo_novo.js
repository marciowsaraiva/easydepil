//Valida Formulario Antes de Enviar
function validaFormulario() {
    var stats = true;
    var errorText = '';

    if ($.trim($('#descricao').val()) === '') {
        errorText += '- ' + 'Preencha a descri&ccedil;&atilde;o ! <br />';
        stats = false;
    }

     if (errorText) {
        showMessage(errorText);
    }

    return stats;
}