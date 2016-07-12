$(document).ready(function() {
  $(".container").children().each(function(item, element) {
    getBoxContent(element.id)  
  });
  
  var $shape = $(".container").shapeshift({
    minColumns: 2
  });
  
  $shape.on("ss-rearranged", function(e, selected) {
    $objects = $(this).children();
    $objects.each(function(i, element) {
      saveBoxPosition(element.id, i);
    });
   
  });
  
});

function getBoxContent(divContent){
  var img_load = "<img src='/files/images/carregando.gif' width='50px' />";
  $('#'+divContent).html(img_load);
  $.ajax({
    type: "GET",
    url: '/homeBox/'+divContent,
    success: function (dataReturn){
      $('#'+divContent).html(dataReturn);
    }
  });
}

function saveBoxPosition(divContent, position){
  $.ajax({
    type: "GET",
    url: '/homeBox/saveBoxPosition/divContent/'+divContent+'/position/'+position
  });
}
