var pb_valor = 0;
var TimerXuxu;

function aguarde() {        
     $("#painel2").removeAttr('class');
 };

//Confirma Excluir Items
function confirma_excluir_item(nItem) {
    var url_de_Exclusao = "/log/dellog/idLog/" + nItem;
    bootbox.confirm("Confirma Excluir o item " + nItem + "?", function(result) {
        //Example.show("Confirm result: "+result);
        //window.location = "/dashboard";
        // $("#buscamensagem").val(result);
        if (result) {
            $.ajax({
                type: "POST",
                url: url_de_Exclusao
            })
                    .done(function(msg) {
                //Recarrega a pagina
                window.location = '/log';
            });
        }
    });

}

//Confirma Exclusao com tres botoes padroes em ingles
function confirma_zeratudo1() {

    bootbox.confirm("Tem certeza que deseja excluir todo o historico de logs?", function(result) {
        //Example.show("Confirm result: "+result);
        //window.location = "/dashboard";
        // $("#buscamensagem").val(result);
        if (result) {
            zera_log();
        }
    });
}

//Chama um Popup Modal
function confirma_zeratudo2() {
    var some_html = '<img src="/files/images/areyousure.gif" width="200px"/><br />';
    some_html += '<h2>Voce tem certeza do que esta fazendo?</h2><br />';
    some_html += '<h4>isso é irreversivel você sabe né?</h4>';
    bootbox.alert(some_html);
}

//Confirma Exclusao com tres botoes customizados
function confirma_zeratudo() {

    bootbox.dialog({
        message: "Tem certeza que deseja excluir todo o historico de logs?",
        title: "Confirmação",
        buttons: {
            success: {
                label: "Sim",
                className: "btn-success",
                callback: function() {
                    zera_log();
                }
            },
            danger: {
                label: "Não!",
                className: "btn-danger",
                callback: function() {

                }
            },
            main: {
                label: "Saiba mais...",
                className: "btn-primary",
                callback: function() {
                    mostra_video();
                }
            }
        }
    });
}

// Mostra o Video em uma pop-up
function mostra_video() {
    var some_html = '<div style="text-align:center;"><iframe width="420" height="315" src="//www.youtube.com/embed/k2UQprQLUmQ?rel=0" frameborder="0" allowfullscreen></iframe>';
    some_html += '<h2>Quais as implicações em fazer isso?</h2><br />';
    some_html += '<h4>Assista até entender o que você precisa saber.</h4>';
    bootbox.alert(some_html);
}
//chama uma funcao para zerar os logs
function zera_log() {

    //Mostra Amensagem
    $("#box-mensagem-log").removeClass("hidden");
    //Desabilita botao
    $("#btnZeraLogs").attr("disabled", true);
    //Envia uma requisição AJAX para o servidor.
    $.ajax({
        type: "POST",
        url: "/log/zeralogs",
        data: {resposta: "SIM"}
    })
            .done(function(msg) {
        //Oculta a mensagem
        $("#box-mensagem-log").addClass("hidden");
        //Habilita o botao novamente
        $("#btnZeraLogs").removeAttr("disabled");
        //Recarrega a pagina
        window.location = '/log';
    });
}


//Quando tudo estiver carregado
$(document).ready(function() {
//    $('#btn1').click(function() {
//        //$("#painel").slideDown("slow");
//        $("#painel").fadeIn(1500);
//    });
//
//    $('#btn2').click(function() {
//        //$("#painel").slideUp("slow");
//        $("#painel").fadeOut(1500);
//    });
//
//
//
//    $('#btn6').click(function() {
//        //Criar o Timer
//        TimerXuxu =
//                setInterval(function() {
//            //Faz algo de 1 segundos
//            if (pb_valor > 100)
//                pb_valor = 0;
//
//            pb_valor = pb_valor + 5;
//            $("#progressbar1").attr('style', 'width: ' + pb_valor + '%');
//        }, 500);
//
//    });
//
//    $('#btn7').click(function() {
//        //Limpar o Timer
//        clearInterval(TimerXuxu);
//    });
//
//    //Coloca o Foco na mensagem
//    $('#btn8').click(function() {
//        $("#buscamensagem").focus();
//    });
//
//
//    $('#btn3').click(function() {
//        //exibe liga/desliga 
//        $("#painel").toggle();
//        //muda texto
//        if ($("#btn3").text() === 'Oculta')
//            $("#btn3").text('Mostra');
//        else
//            $("#btn3").text('Oculta');
//    });
//
//    $('#btn4').click(function() {
//        pb_valor = pb_valor + 10;
//        $("#progressbar1").attr('style', 'width: ' + pb_valor + '%');
//    });
//    $('#btn5').click(function() {
//        pb_valor = pb_valor - 10;
//        $("#progressbar1").attr('style', 'width: ' + pb_valor + '%');
//    });

    //Mostra mensagem no foco  
    $("#buscamensagem").focus(function() {
        $("#msg-helper").html("Por favor digite uma mensagem!");
    });
    //Oculta mensagem ao sai do foco.
    $("#buscamensagem").blur(function() {
        $("#msg-helper").html("");
    });


    //GET AJAX
    $('#btn9').click(function() {
        $.get('/log/ajax_retorno_lista', function(retorno_html) {
            $("#painel2").html(retorno_html);
        });
    });

    //CONTADOR
    $('#btn10').click(function() {
        $("#painel2").html("Aguarde a requisição voltar... <img src='/files/images/loading.gif'>");
        $.ajax({
            type: "POST",
            url: "/log/ajax_retorno_contador",
            dataType:"json",
            data: {variaveltexto123: $("#buscamensagem").val()}
        })
                .done(function(retorno_json) {
            if (retorno_json.status===0){
                alert('Erro ao carregar arquivos do servidor....');
            }else{
            //Oculta a mensagem
            $("#painel2").html("O Status foi: "+retorno_json.status);
            
            }
        });
    });
    
    //Processamento no Servidor
    $('#btn11').click(function() {
        $("#painel2").html("Aguarde a requisição voltar... \n\
<img src='/files/images/loading.gif'>");
        $.ajax({
            type: "POST",
            url: "/log/ajax_processa",
            dataType:"json",
            data: {msg: $("#buscamensagem").val()}
        })
                .done(function(retorno_json) {
            $("#painel2").html("");
            if (retorno_json.ret===0){
                window.location='/dashboard';
            }else{
                //Oculta a mensagem            
                bootbox.alert("mensagem de retorno do servidor: "+
                        retorno_json.mensagem);
            }
        });
    });    
    
    
    //get Externo
    $('#btn12').click(function() {
        var url = "/log/ajax_retorno_lista";
       
        $("#painel2").load(url);
        
        
    });    
    //

//Oculta  a tabela
//$("#painel").fadeOut(1500);
});