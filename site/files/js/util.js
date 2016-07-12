$(document).ready(function () {

    $(".somenteNumeros").bind("keyup blur focus", function (e) {
        e.preventDefault();
        var expre = /[^\d]/g;
        $(this).val($(this).val().replace(expre, ''));
    });

    $(".somenteLetras").bind("keyup blur focus", function (e) {
        e.preventDefault();
        var expre = /[a-zA-Z]/;
        $(this).val($(this).val().replace(expre, ''));
    });
});

function showMessage(errorText, time, type, redirect) {

    if (time == null)
        time = 4000;
    if (type == null)
        type = 'error';

    redirect = redirect || null;

    $().toastmessage('showToast', {
        text: errorText,
        sticky: false,
        stayTime: time,
        position: 'middle-center',
        type: type,
        close: function () {
            if (redirect != null)
                window.location = redirect
        }
    });
}


function valida_cnpj(cnpj) {
    var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
    digitos_iguais = 1;
    if (cnpj.length != 14)
        return false;
    for (i = 0; i < cnpj.length - 1; i++)
        if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais) {
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;
        return true;
    }
    else
        return false;
}

function validateEmail(email) {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\.\-_-a]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email)) {
        return true;
    } else {
        return false;
    }
}

/*
 Mensagem Padrao do Bootstrap Fox
 type = alert-danger
 type = alert-success     
 type = alert-info
 */
function mensagem_dock(texto, type) {
    if (type === null)
        type = 'alert-success';
    var caixa = '';
    caixa += '<div class="alert alert-dismissable ' + type + '">';
    caixa += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    caixa += texto;
    caixa += '</div>';
    $("#mensagem-dock").html(caixa);
}

function valida_data(valor) {

    var date = valor;
    var ardt = new Array;
    var ExpReg = new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");

    ardt = date.split("/");

    var erro = false;

    if (date.search(ExpReg) === -1) {
        erro = true;
    } else if (((ardt[1] === '04') || (ardt[1] === '06') || (ardt[1] === '09') || (ardt[1] === '11')) && (ardt[0] > '30')) {
        erro = true;
    } else if (ardt[1] === '02') {
        if ((ardt[0] > '28') && ((ardt[2] % 4) !== 0)) {
            erro = true;
        }
        if ((ardt[0] > '29') && ((ardt[2] % 4) === 0)) {
            erro = true;
        }
    }

    if (erro) {
        return false;
    }

    return true;
}

function valida_cpf(cpf) {
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;

    if (cpf.length < 11) {
        return false;
    }

    for (i = 0; i < cpf.length - 1; i++) {
        if (cpf.charAt(i) != cpf.charAt(i + 1))
        {
            digitos_iguais = 0;
            break;
        }
    }

    if (!digitos_iguais) {
        numeros = cpf.substring(0, 9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--) {
            soma += numeros.charAt(10 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) {
            return false;
        }
        numeros = cpf.substring(0, 10);
        soma = 0;
        for (i = 11; i > 1; i--) {
            soma += numeros.charAt(11 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) {
            return false;
        }
        return true;
    } else {
        return false;
    }
}

function somenteLetra(e) {
    var text = $(e).val();
    $(e).val(text.replace(/[^(a-z )\s]/gi, ""));
    //onkeypress="return somenteLetra(this);" onkeyup="return somenteLetra(this);"
}

function semCaracterEspecial(e) {
    var text = $(e).val();
    $(e).val(text.replace(/[^(a-z 0-9)\s]/gi, ""));
}

function somenteNumero(e) {
    var text = $(e).val();
    $(e).val(text.replace(/[^(0-9.,)\s]/gi, ""));
}

function somenteNumeroAll(e) {
    var text = $(e).val();
    $(e).val(text.replace(/[^(0-9)\s]/gi, ""));
}

function somenteNumeroSemVirgula(e) {
    var text = $(e).val();
    $(e).val(text.replace(/[^(0-9.)\s]/gi, ""));
}

function somenteNumeroSemPonto(e) {
    var text = $(e).val();
    $(e).val(text.replace(/[^(0-9,)\s]/gi, ""));
}

function somenteNumeroTraco(e) {
    var text = $(e).val();
    $(e).val(text.replace(/[^(0-9-.,)\s]/gi, ""));
}