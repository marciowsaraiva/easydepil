{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->

        <h1>Novo Tipo de Usu&aacute;rio</h1>

        <a href="/usuarios_tipo" class="btn btn-primary"> Voltar</a><br> <br>
        <form name="frm-clinTipoUsuario" action="/usuarios_tipo/gravar_clinTipoUsuario" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario()">
            <div class="form-group">
                <label for="idTipoUsuario">            
                    {if {$registro.idTipoUsuario}>0}
                        C&oacute;digo:{$registro.idTipoUsuario}
                    {else}
                        C&oacute;digo: Novo Registro
                    {/if} 
                </label>
            </div>                   
            <input  type="hidden" class="form-control" name="idTipoUsuario" value="{$registro.idTipoUsuario}" />
            <input  type="hidden" class="form-control" name="stStatus" value="{$registro.stStatus|default:'1'}" />
            <div class="form-group">
                <label for="descricao">Descri&ccedil;&atilde;o</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.descricao}" />
            </div>
            <br>
            <br>
            <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
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
<!-- JS Especifico do Controller -->
<script src="/files/js/usuarios_tipo/clinTipoUsuario_novo.js"></script>

{include file="comuns/footer.tpl"}

