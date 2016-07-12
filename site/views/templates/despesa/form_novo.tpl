{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idDespesa}>0} {$registro.dsDespesa|default:''}{else} Inclus&atilde;o de Despesas{/if}</h1></tt>
            </div>          
            <a href="/despesa" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-despesa" 
                  action="/despesa/gravar_despesa" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idDespesa}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idDespesa" id="idDespesa" value="{$registro.idDespesa}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idDespesa" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome da Despesa</label>
                        <input type="text" class="form-control" name="dsDespesa" id="dsDespesa" value="{$registro.dsDespesa|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="grupodespesa">Tipo de Despesa</label>
                            <select class="form-control" name="idTipoDespesa" id="idTipoDespesa">
                                {html_options options=$lista_tipodespesa selected=$registro.idTipoDespesa}
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
<script src="/files/js/despesa/despesa_novo.js"></script>



{include file="comuns/footer.tpl"}

