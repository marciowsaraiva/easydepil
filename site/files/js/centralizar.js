// JavaScript Document
$(document).ready(function() {
  $('.centralizar_container').height($(window).height() - 0);
  $(".carregar_conteudo").position({
    my: "center",
    at: "center",
    of: ".centralizar_container"
  });
} ); 
  
  
$(window).resize(function () {
  $('.centralizar_container').height($(window).height() - 0);
//  $(".carregar_conteudo").position({
//   my: "center",
//    at: "center",
//    of: ".total"
//  });
});
//$(window).trigger('resize');