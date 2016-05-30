{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idMaoObra}>0} {$registro.dsMaoObra|default:''}{else} Inclus&atilde;o de MaoObras{/if}</h1></tt>
            </div>          
            <a href="/maoobra" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-maoobra" 
                  action="/maoobra/gravar_maoobra" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idMaoObra}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idMaoObra" id="idMaoObra" value="{$registro.idMaoObra}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idMaoObra" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome da Mao de Obra</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsMaoObra|default:''}" >           
                    </div> 
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="unidade">Unidade</label>
                            <select class="form-control" name="idUnidade" id="idUnidade">
                                {html_options options=$lista_unidade selected=$registro.idUnidade}
                            </select>                      
                        </div>
                    </div>     
                            
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="tipomaoobra">Tipo de Mao de Obra</label>
                            <select class="form-control" name="idTipoMaoObra" id="idTipoMaoObra">
                                {html_options options=$lista_tipomaodeobra selected=$registro.idTipoMaoObra}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <label for="form-control">Valor da Unidade da Mao de Obra</label>
                        <input type="text" class="form-control" name="vlUnitario" id="vlUnitario" value="{$registro.vlUnitario|default:''}" >           
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
<script src="/files/js/maoobra/maoobra_novo.js"></script>



{include file="comuns/footer.tpl"}

