{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}  
            <br>

    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="alert alert-info" >'
            <h1>{if {$registro.idMenu}>0} {$registro.descricao|default:''}{else} Inclus&atilde;o de Menu{/if}</h1>
        </div>
        <br> 
        <a href="/menu" class="btn btn-primary"> Voltar</a><br>        
        <form name="frm-menu" 
              action="/menu/gravar_menu" 
              method="POST" 
              enctype="multipart/form-data"
              onsubmit="return validaFormulario()">
            <br> 
            <label for="idMenu">            
                   {if {$registro.idMenu}>0}
                        C&oacute;digo:{$registro.idMenu}
                   {else}
                        C&oacute;digo: Novo Registro
                   {/if} 
            </label>
            <div type="hidden" class="form-group">        
                <input  type="hidden" class="form-control" name="idMenu" id="id_menu" value="{$registro.idMenu}" />
            </div>               
            <div class="input-group col-lg-4">
                <span class="input-group-addon btn-outline btn-primary">Url</span>                    
                <input type="text" class="form-control" name="url" id="url" value="{$registro.url|default:''}" />                 
            </div>
            <br>
            <div class="input-group col-lg-4">                
                <span class="input-group-addon btn-outline btn-primary">Descri&ccedil;&atilde;o</span>                    
                <input type="text" class="form-control col-lg-12" name="descricao" id="descricao" value="{$registro.descricao|default:''}" />                 
            </div>
            <br>    
            <div class="input-group col-lg-4">                               
                <span class="input-group-addon btn-outline btn-primary">Menu Pai</span>                   
                <select class="form-control col-lg-4" name="parent_menu" id="parent_menu"> 
                    {html_options options=$lista_MenusPais selected={$registro.parent_menu}}
                </select> 
            </div>
            <br>        
            <div class="input-group col-lg-4">
                <span class="input-group-addon btn-outline btn-primary">Target</span>                    
                <input type="text" class="form-control" name="target" id="target" value="{$registro.target|default:''}" />                 
            </div>
            <br>        
            <div class="input-group col-lg-4">
                <span class="input-group-addon btn-outline btn-primary">Ordem</span>                    
                <input type="text" class="form-control" name="ordem" id="ordem" value="{$registro.ordem|default:''}" />                 
            </div>
            <input type="hidden" name="tipo" value="{$registro.tipo}" />
            <br>          
            <input type="hidden" name="status" value="{$registro.status}" />
            <input class="btn btn-primary" type="submit" value="Gravar" name="btnGravar" />
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
<!-- JS Especifico do Controller -->
<script src="/files/js/menu/menu_novo.js"></script>

{include file="comuns/footer.tpl"}

