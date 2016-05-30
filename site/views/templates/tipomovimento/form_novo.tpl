{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idTipoMovimento}>0} {$registro.dsTipoMovimento|default:''}{else} Inclus&atilde;o de Tipos de Movimento{/if}</h1></tt>
            </div>          
            <a href="/tipomovimento" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-tipomovimento" 
                  action="/tipomovimento/gravar_tipomovimento" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idTipoMovimento}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idTipoMovimento" id="idTipoMovimento" value="{$registro.idTipoMovimento}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idTipoMovimento" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsTipoMovimento|default:''}" >           
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Entrada ou Saída (E/S)</label>
                        <input type="text" class="form-control" name="stDC" id="stDC" value="{$registro.stDC|default:''}" >           
                    </div> 
                </div> 
                <br>            
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
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
<script src="/files/js/tipomovimento/tipomovimento_novo.js"></script>



{include file="comuns/footer.tpl"}

