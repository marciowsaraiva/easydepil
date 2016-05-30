{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idTipoAgenda}>0} {$registro.dsTipoAgenda|default:''}{else} Inclus&atilde;o de Tipo de Agenda{/if}</h1></tt>
            </div>          

            <form name="frm-tipoagenda" 
                  action="/tipoagenda/gravar_tipoagenda" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <a href="/tipoagenda" class="btn btn-primary"> Voltar</a>
                <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idTipoAgenda}>0}
                            <label for="form-control">Código</label>
                            <input type="text" class="form-control" name="idTipoAgenda" id="idTipoAgenda" value="{$registro.idTipoAgenda}" READONLY>           
                        {else}
                            <label for="form-control">Código</label>
                            <input type="text" class="form-control" name="idTipoAgenda" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Status da Agenda</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsTipoAgenda|default:''}" >           
                    </div>    
                    <div class="col-xs-2">
                        <label for="form-control">Código Resumido</label>
                        <input type="text" class="form-control" maxlength="3"  name="dsResumida" id="dsResumida" value="{$registro.dsResumida|default:''}" >           
                    </div>    
                    <div class="col-xs-2">
                        <label for="form-control">Cor para Diferenciar</label>
                        <input type="text" class="form-control" name="dsCor" id="dsCor" value="{$registro.dsCor|default:''}" >           
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
<script src="/files/js/tipoagenda/tipoagenda_novo.js"></script>



{include file="comuns/footer.tpl"}

