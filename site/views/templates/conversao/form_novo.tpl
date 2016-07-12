{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idConversao}>0} {$registro.dsConversao|default:''}{else} Inclus&atilde;o de Fator de Conversao{/if}</h1></tt>
            </div>          
            <a href="/conversao" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-conversao" 
                  action="/conversao/gravar_conversao" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idConversao}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idConversao" id="idConversao" value="{$registro.idConversao}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idConversao" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome desta Conversao</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsConversao|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="unidadeorigem">Unidade Origem</label>
                            <select class="form-control" name="idUnidadeOrigem" id="idUnidadeOrigem">
                                {html_options options=$lista_unidadeorigem selected=$registro.idUnidadeOrigem}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="unidadedestino">Unidade Destino para Conversão</label>
                            <select class="form-control" name="idUnidadeDestino" id="idUnidadeDestino">
                                {html_options options=$lista_unidadedestino selected=$registro.idUnidadeDestino}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-1">
                        <label for="form-control">Sinal</label>
                        <input type="text" class="form-control" name="sinal" id="sinal" value="{$registro.sinal|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Valor</label>
                        <input type="text" class="form-control" name="valordaconversao" id="valordaconversao" value="{$registro.valordaconversao|default:''}" >           
                    </div> 
                </div>    
                <br>
                  <div class="col-xs-3">
                    <div class="row">
                        <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                    </div> 
                  </div> 
                <br>
            </form>
            
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<!-- Toast Message -->
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<!-- Utils -->
<script src="/files/js/util.js"></script>
<script src="/files/js/conversao/conversao_novo.js"></script>



{include file="comuns/footer.tpl"}

