function validaSenha() {
    url = "/trocar_senha/valida_senha/idUsuario/" + $("#idUsuario").val() + "/nova_senha/" + $("#nova_senha").val();    
    $.ajax({
        url: url,
        dataType: 'json',
        async: true,
        success: function (dataReturn) {
            if (!dataReturn.status) {
                showMessage("SENHA INVALIDA! INSIRA UMA SENHA DIFERENTE DA ANTERIOR");
                $("#nova_senha").val('').trim();
                $("#nova_senha").focus();
                return false;
            }
        }
    });
}


function validaForm() {
    
    if ($("#nova_senha").val().trim() === '') {
        showMessage("INFORME UMA NOVA SENHA!");
        $("#nova_senha").focus();
        $("#conf_nova_senha").val('').trim();
        return false;
    }

    if ($("#conf_nova_senha").val().trim() === "") {
        showMessage("CONFIRME E NOVA SENHA!");
        $("#conf_nova_senha").focus();
        return false;
    }

    if (($("#nova_senha").val()) !== ($("#conf_nova_senha").val())) {
        showMessage("AS SENHAS NAO BATEM!");
        $("#conf_nova_senha").val('').trim();
        $("#nova_senha").val('').trim();
        $("#nova_senha").focus();
        return false;
    }
    
    return true;
}

