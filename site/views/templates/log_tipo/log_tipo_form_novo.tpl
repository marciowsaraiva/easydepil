{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="page-header">
            <h1><small>Novo Tipo de Log</small></h1>
        </div>

        <div class="alert alert-info">
          <a href="/log_tipo" class="alert-link">voltar</a>
        </div>        
        <form name="frm-log_tipo" 
              action="/log_tipo/gravar_log_tipo" 
              method="POST" 
              enctype="multipart/form-data" 
              onsubmit="return validaFormulario()">   
            {if ($registro.idLogTipo>0)}
                codigo:{$registro.idLogTipo}
            {else}
                codigo: Novo Registro
            {/if}
            <div type="hidden" class="form-group">
                <input type="hidden" class="form-control" name="idLogTipo" value="{$registro.idLogTipo}" />
            </div>
            <div type="hidden" class="form-group">
                <label for="descricao">Descricao</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" size="100" value="{$registro.descricao}"/>
            </div>
            <div type="hidden" class="form-group">
                <input type="hidden" class="form-control" name="stStatus" value="{$registro.stStatus}"/>
            </div>
            <input type="submit" value="Gravar" class="btn btn-primary" name="btnGravar" />         
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

<script src="/files/js/log_tipo/log_tipo_novo.js"></script>
{include file="comuns/footer.tpl"}