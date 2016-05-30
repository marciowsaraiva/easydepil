function confirma_excluir_item(nItem){
    var url_de_Exclusao = "/log_tipo/dellog_tipo/idLogTipo/"+nItem;
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
                window.location='/log_tipo';
            });
        }
    });
    


    
}