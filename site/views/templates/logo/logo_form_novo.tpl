{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->

        <h1>Novo Logo</h1>
        <hr>
        
        <form name="frm-logo" 
              action="/logo/gravar_logo" 
              method="POST" 
              enctype="multipart/form-data"
              onsubmit="return validaFormulario()">
            
            {if {$registro.idLogo}>0}
                Codigo:{$registro.idLogo}
            {else}
                Codigo: Novo Registro
            {/if}
            <input type="hidden" name="idLogo" value="{$registro.idLogo}" /><br><br>
            
            Projeto:{html_options name=idProjeto options=$lista_projetos} 
            <br>
            <br>
            Nome do Arquivo:
            <br>
            <input type="text" id="arquivo" name="arquivo" value="{$registro.arquivo|default:''}" />            
            <br>
            <br>
            Caminho:
            <br>
            <input type="text" id="caminho" name="caminho" value="{$registro.caminho|default:''}" />
            <br>
            <br>
            
            <input type="hidden" name="stStatus" value="{$registro.stStatus}" />

            <input class="btn btn-primary" type="submit" value="Gravar" name="btnGravar" />
            <br>
            <hr>
            <a class="glyphicon glyphicon-backward" href="/logo"> Voltar</a>
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
<script src="/files/js/logo/logo_novo.js"></script>

{include file="comuns/footer.tpl"}

