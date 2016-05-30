//Valida Formulario Antes de Enviar
function validaFormulario() {
    var stats = true;
    var errorText = '';  
    

    if ($.trim($('#descricao').val()) === '') {
        errorText += 'A descrição é obrigatória!';
        stats = false;
    }

    if (errorText) {
        showMessage(errorText);
    }

    return stats;
}

  $('#btnInsereMenu').click(function(){
     $('#painel_menu').fadeOut(3000);
     $('#painel_menu').fadeIn(3000);     
  });
   
  $(document).ready(function(){
    $('#descricao').focus();  
  });