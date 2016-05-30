var
  pb_valor = 0;
  timer_xuxu = 0;
  
//Confirma Excluir Items
function confirma_excluir_item(nItem){
    var url_de_Exclusao = "/usuarios/del_usuario/idUsuario/"+nItem;
    bootbox.confirm("Confirma Excluir o item "+nItem+"?", function(result) {
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
                window.location='/usuarios';
            });
        }
    });  
}
//
function mostra_tabela(){
    
}
//
function oculta_tabela(){
    
}
//

//Confirma Exclusao com tres botoes padroes em ingles
function confirma_zeratudo1() {

    bootbox.confirm("Tem certeza que deseja excluir todo o historico de logs?", function(result) {
        //Example.show("Confirm result: "+result);
        //window.location = "/dashboard";
        // $("#buscamensagem").val(result);
        if (result) {            
            zera_usuario();
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
                    zera_usuario();
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
function zera_usuario() {

    //Mostra Amensagem
    $("#box-mensagem-usuario").removeClass("hidden");
    //Desabilita botao
    $("#btnZeraUsuarios").attr("disabled", true);
    //Envia uma requisição AJAX para o servidor.
    $.ajax({
        type: "POST",
        url: "/usuarios/zeraUsuarios",
        data: {resposta: "SIM"}
    })
            .done(function(msg) {        
        //Oculta a mensagem
        $("#box-mensagem-usuario").addClass("hidden");
        //Habilita o botao novamente
        $("#btnZeraUsuarios").removeAttr("disabled");
        //Recarrega a pagina
        window.location='/usuarios';
    });
}

//Quanto tudo estiver carrregado
$(document).ready(function(){
   //Mostra Tabela 
   $('#btn1').click(function(){
     //$('#painel').slideDown("slow");
     $('#painel').fadeIn(3000);
     
   });
   
   //Oculta Tabela 
   $('#btn2').click(function(){
     //$('#painel').slideUp("slow");
     $('#painel').fadeOut(3000);
   });
   
   //Incrementa Progress Bar
   $('#btn4').click(function(){
     //$('#painel').slideUp("slow");
     pb_valor = pb_valor + 10;
     $('#progressbar1').attr('style','width: '+pb_valor+'%');
     $('#progressbar1').val(pb_valor+'%');
   });
   
   //Decrementa Progress Bar
   $('#btn5').click(function(){
     //$('#painel').slideUp("slow");
     pb_valor = pb_valor - 10;
     $('#progressbar1').attr('style','width: '+pb_valor+'%');
     $('#progressbar1').val(pb_valor+'%');
   });
   
   //Decrementa com timer Progress Bar
   $('#btn6').click(function(){
     //$('#painel').slideUp("slow");
        timer_xuxu =
        setInterval(function(){
        if (pb_valor>100) pb_valor = 0;
        pb_valor = pb_valor + 5;
        $('#progressbar1').attr('style','width: '+pb_valor+'%');            
        },500);
   });
   
   // Para Timer
   $('#btn7').click(function(){
       clearInterval(timer_xuxu)
   })
   
   // Muda Foco
   $('#btn8').click(function(){
       $('#buscamensagem').focus();
   })
   
   // Ajax Get
   $('#btn9').click(function(){
     $.get('/usuarios/ajax_retorno_lista',function(retorno_html){
         $('#panel2').html(retorno_html);
     })  
   })
   
   // Ajax Contador
   $('#btn10').click(function(){
  
     //$('#painel2').html("Aguarde a requisição voltar : <img src='/files/images/loading.gif'>");
     
     $.ajax({
        type: "POST",
        url: "/usuarios/ajax_contador",
        dataType : "json",
        data: {resposta: $("#buscamensagem").val()}
    })
            .done(function(retorno_json){
         if (retorno_json.status===0){
             alert('Erro ao carregar arquivo do servidor....');
         }else{
             $('#panel2').html("O Status foi : "+retorno_json.status);
         }
     });  
   });
   
   // Ajax Contador
   $('#btn11').click(function(){
  
     $('#panel2').html("Aguarde a requisição voltar : <img src='/files/images/loading.gif'>");
     
     $.ajax({
        type: "POST",
        url: "/usuarios/ajax_processa",
        dataType : "json",
        data: {msg: $("#buscamensagem").val()}
    })
            .done(function(retorno_json){
         $('#panel2').html("");
         if (retorno_json.ret===0){   
             window.location='/dashborad';
         }else{
             bootbox.alert("mensagem de retorno do servidor: "+retorno_json.mensagem);
         }
     });  
   });
   
   //Mostra Foco
   $('#buscamensagem').focus(function(){
       $('#msg_helper').html("Por favor digite um nome !");
   });
   
   // Oculta mensagem do foco
   $('#buscamensagem').blur(function(){
       $('#msg_helper').html("");
   });
   
   // Tabela 
   $('#btn3').click(function(){
     // liga e Desliga  
     $('#painel').toggle();
     // Escreve Oculta e Mostra no Botão
     if ($('#btn3').text()=='Oculta'){
        $('#btn3').text('Mostra')
     }else{
        $('#btn3').text('Oculta')
     }   
   });
   
});