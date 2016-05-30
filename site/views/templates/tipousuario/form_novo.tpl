{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idTipoUsuario}>0} {$registro.dsTipoUsuario|default:''}{else} Inclus&atilde;o de Tipos de Usuários{/if}</h1></tt>
            </div>          
            <a href="/tipousuario" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-tipousuario" 
                  action="/tipousuario/gravar_tipousuario" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idTipoUsuario}>0}
                                <label class="form-control">Código</label>
                                <input type="text" class="form-control" name="idTipoUsuario" id="idTipoUsuario" value="{$registro.idTipoUsuario}" READONLY>           
                        {else}
                                 <label class="form-control">Código</label>
                                 <input type="text" class="form-control" name="idTipoUsuario" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label class="form-control">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsTipoUsuario|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label class="form-control">Acesso total</label>
                        <input type="checkbox" class="form-control" name="stInclui" id="stInclui" {if {$registro.stInclui} > 0} checked="checked" {/if}>           
                    </div> 
                    <div class="col-xs-2">
                        <label class="form-control">Somente consulta</label>
                        <input type="checkbox" class="form-control" name="stConsulta" id="stConsulta" {if {$registro.stConsulta} > 0} checked="checked" {/if} >           
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
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
<script src="/files/js/tipousuario/tipousuario_novo.js"></script>



{include file="comuns/footer.tpl"}

