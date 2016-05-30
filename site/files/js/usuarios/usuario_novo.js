$(document).load(function() {
   $("#nome").focus();  
});

// Formata Telefone 
$("#telefone1").bind('input propertychange',function(){
    // pego o valor do telefone
    var texto = $(this).val();
    // Tiro tudo que não é numero
    texto = texto.replace(/[^\d]/g, '');
    // Se tiver alguma coisa
    if (texto.length > 0)
    {
    // Ponho o primeiro parenteses do DDD   
    texto = "(" + texto;
 
        if (texto.length > 3)
        {
            // Fecha o parenteses do DDD
            texto = [texto.slice(0, 3), ") ", texto.slice(3)].join(''); 
        }
        if (texto.length > 12)
        {     
            // Se for 13 digitos ( DDD + 9 digitos) ponhe o traço no quinto digito           
            if (texto.length > 13)
                texto = [texto.slice(0, 10), "-", texto.slice(10)].join('');
            else
             // Se for 12 digitos ( DDD + 8 digitos) ponhe o traço no quarto digito
                texto = [texto.slice(0, 9), "-", texto.slice(9)].join('');
        }  
            // Não adianta digitar mais digitos!
            if (texto.length > 15)               
               texto = texto.substr(0,15);
    }
    // Retorna o texto
   $(this).val(texto);    
})

// Formata Telefone
$("#telefone2").bind('input propertychange',function(){
    // pego o valor do telefone
    var texto = $(this).val();
    // Tiro tudo que não é numero
    texto = texto.replace(/[^\d]/g, '');
    // Se tiver alguma coisa
    if (texto.length > 0)
    {
    // Ponho o primeiro parenteses do DDD   
    texto = "(" + texto;
 
        if (texto.length > 3)
        {
            // Fecha o parenteses do DDD
            texto = [texto.slice(0, 3), ") ", texto.slice(3)].join(''); 
        }
        if (texto.length > 12)
        {     
            // Se for 13 digitos ( DDD + 9 digitos) ponhe o traço no quinto digito           
            if (texto.length > 13)
                texto = [texto.slice(0, 10), "-", texto.slice(10)].join('');
            else
             // Se for 12 digitos ( DDD + 8 digitos) ponhe o traço no quarto digito
                texto = [texto.slice(0, 9), "-", texto.slice(9)].join('');
        }  
            // Não adianta digitar mais digitos!
            if (texto.length > 15)               
               texto = texto.substr(0,15);
    }
    // Retorna o texto
   $(this).val(texto);    
})

//Valida Formulario Antes de Enviar
function validaFormulario() {
    var stats = true;
    var errorText = '';

    if ($.trim($('#nome').val()) === '') {
        errorText += '- ' + 'Preencha o nome ! <br />';
        stats = false;
    }

    if ($.trim($('#senha').val()) === '') {
        errorText += '- ' + 'Preencha a senha corretamente !<br />';
        stats = false;
    }

    if ($.trim($('#email').val()) === '') {
        errorText += '- ' + 'Preencha o e-mail corretamente !<br />';
        stats = false;
    }

    if (errorText) {
        showMessage(errorText);
        
    }

    return stats;
}

function validaEmail() {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\.\-_-a]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec($('#email').val())){
    }else{    
        showMessage("E-mail invalido");
        $('#email').focus();
        $('#email').val('');        
    }
}

//Salvar Click Button
function btn_salvar_usuario_perfil(){
  alert('opa');
  /*
  url='/usuarios/gravar_usuario_perfil';
  if(validaFormulario()){
      $.post(url, $('frm-perfil-usuario').serialize())
  }else{
      showMessage('<br />' + 'Log Gravado!', 10000, 'success');        
  }*/
}	


//Adiciona novo Colaborador
function btn_novo_usuario_perfil(){
 // alert('opa ' + $('#idUsuario').val());
$('#frm-usuario-perfil').hide(200).load('/usuarios/novo_usuario_perfil/idUsuario/'+$('#idUsuario').val()).show(200)}

function validarData(campo){
    
    var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;    
    var msgErro = 'Formato inválido de data.';
    var campo = $('#data').val();
    
    if ($('#data').val() != ''){
        var dia = $('#data').val().substring(0,2);
        var mes = $('#data').val().substring(3,5);
        var ano = $('#data').val().substring(6,10);
        
        if(mes=='01' || mes=='03' || mes=='05' || mes=='07' || mes=='08' || mes=='10' || mes=='12'){
            // VALIDAR DIA 31
            if(dia != 31) {
                alert("Dia incorreto !!! O mês especificado contém no exatamente 31 dias.");
                return false;
            }
            // FIM DO VALIDAR DIA 31
        }
        alert(mes);
        if(mes==4 || mes==6 || mes==9 || mes==11){
        // VALIDAR DIA 30
            if(dia > 30) {
                alert("Dia incorreto !!! O mês especificado contém no máximo 30 dias.");
            return false;
        }
        // FIM DO VALIDAR DIA 30

        if(mes==2) {
            // VALIDAR DIA 28 E ANO
            if(dia > 28 && ano%4!=0) {
                alert("Dia incorreto !!! O mês especificado contém no máximo 28 dias.");
                return false;
            }
        } // FIM DO VALIDAR DIA 28 E ANO

        // VALIDAR DIA 29 E ANO
        if(dia > 29 && ano%4==0) {
            alert("Dia incorreto !!! O mês especificado contém no máximo 29 dias.");
            return false;
        } // FIM DO VALIDAR DIA 29 E ANO
    
    } else {
        alert(msgErro);
        $('#data').focus();
        return false;
    }
}
}

