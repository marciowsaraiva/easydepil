//Valida Formulario Antes de Enviar
function validaFormulario() {
    var stats = true;
    var errorText = '';

    if ($.trim($('#descricao').val()) === '') {
        errorText += '- ' + 'Selecione a descricao<br />';
        stats = false;
    }

    if (errorText) {
        showMessage(errorText);
    }
    return stats;
}