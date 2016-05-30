$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: '/notificacoes',
    dataType: "json",
    success: function (dataReturn){
      $.each(dataReturn, function(i, item){
        var HTMLMsg = '<img src="/files/images/'+dataReturn[i]['icone']+'" style="float:left;margin-right:20px;margin-top:20px;margin-left:10px;"/>'+dataReturn[i]['mensagem'];
        if(dataReturn[i]['link'] != null){
          HTMLMsg += '<a href="#" onclick="dispatcher(\'busca\')">Acessar</a>';
        }
        show_notify(HTMLMsg, dataReturn[i]['not_id']);
      });
    }
  });
});

function show_notify(text, not_id){
  var noty_id = noty({
    text: text,
    layout: 'bottomRight',
    theme: 'defaultTheme',
    type: 'warning',
    dismissQueue: true, // If you want to use queue feature set this true
    template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
    animation: {
      open: {
        height: 'toggle'
      },
      close: {
        height: 'toggle'
      },
      easing: 'swing',
      speed: 500 // opening & closing animation speed
    },
    timeout: false, // delay for closing event. Set false for sticky notifications
    force: false, // adds notification to the beginning of queue when set to true
    modal: false,
    closeWith: ['button'], // ['click', 'button', 'hover']
    callback: {
      onClose: function() {
        visualizado(not_id);
      }
    }
  })
}

function visualizado(not_id){
  $.ajax({
    type: "GET",
    url: '/notificacoes/visualizado/not_id/'+not_id
  });
}