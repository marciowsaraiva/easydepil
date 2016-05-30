function logar(){
  $.ajax({
    type: "POST",
    url: '/login/logar',
    data: $('#form_login').serialize(),
    dataType: "json",
    success: function (dataReturn){
      showNotificacao(dataReturn.text, dataReturn.timeout, dataReturn.layout, dataReturn.type, dataReturn.redirect);
    }
  });
}