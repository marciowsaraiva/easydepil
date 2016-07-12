function execute(){
  $.ajax({
    type: "GET",
    url: '/updater.php?func=execute',
    success: function (dataReturn){
      if(dataReturn=='success'){
        alert('Importação realizada com sucesso!');
        location.reload();
      }
    }
  });
}