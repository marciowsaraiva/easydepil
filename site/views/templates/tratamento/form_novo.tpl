{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idTratamento}>0} {$registro.dsTratamento|default:''}{else} Inclus&atilde;o de Tratamentos{/if}</h1></tt>
            </div>          
            <a href="/tratamento" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-tratamento" 
                  action="/tratamento/gravar_tratamento" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idTratamento}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idTratamento" id="idTratamento" value="{$registro.idTratamento}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idTratamento" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Tratamento</label>
                        <input type="text" class="form-control" name="dsTratamento" id="dsTratamento" value="{$registro.dsTratamento|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="grupotratamento">Tipo de Tratamento</label>
                            <select class="form-control" name="idTipoTratamento" id="idTipoTratamento">
                                {html_options options=$lista_tipotratamento selected=$registro.idTipoTratamento}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Valor</label>
                        <input type="text" class="form-control" name="vlTratamento" id="vlTratamento" value="{$registro.vlTratamento|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Tempo por sessão</label>
                        <input type="text" class="form-control" name="dsTempo" id="dsTempo" value="{$registro.dsTempo|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="receita">Codigo Receita</label>
                            <select class="form-control" name="idReceita" id="idReceita">
                                {html_options options=$lista_receita selected=$registro.idReceita}
                            </select>                      
                        </div>
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
<script src="/files/js/tratamento/tratamento_novo.js"></script>



{include file="comuns/footer.tpl"}

