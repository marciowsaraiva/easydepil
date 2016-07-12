{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idPerfil}>0} {$registro.dsPerfil|default:''}{else} Inclus&atilde;o de Perfis{/if}</h1></tt>
            </div>          
            <a href="/perfil" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-perfil" 
                  action="/perfil/gravar_perfil" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="input-group col-lg-8">                    
                    {if {$registro.idPerfil}>0}
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                            <input type="text" class="form-control" name="idPerfil" id="idPerfil" value="{$registro.idPerfil}" READONLY>           
                    {else}
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                              <input type="text" class="form-control" name="idPerfil" value="" READONLY>           
                    {/if}                     
                    <span class="input-group-addon btn-outline btn-primary">Descri&ccedil;&atilde;o</span>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsPerfil|default:''}" >           
                </div> 
                <br>            
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
                <br>
            </form>
            
            {if {$registro.idPerfil}>0}
                {if (isset($lista_de_menus)) }
                <div class="alert alert-info" >
                    <tt><h1>Menus Disponíveis </h1></tt>
                </div>                            
                <form name="frm-perfil-menu" 
                  action="/perfil/insere_menu" 
                  method="POST" enctype="multipart/form-data">
                    <div class="input-group col-lg-12">
                        <div class="input-group col-lg-8">
                            <span class="input-group-addon btn-outline btn-primary">Menus</span>                    
                            <select class="form-control col-lg-12" name="idMenu" id="idMenu"> 
                                {html_options options=$lista_de_menus} 
                            </select>   

                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-primary" value="Insere Menu" name="btnInsereMenu" id="btnInsereMenu"/>
                            </span>                                      
                        </div><!-- /input-group -->
                    </div>                
                    <input type="hidden" name="idPerfil" id="idPerfil"value="{$registro.idPerfil}" />

                </form>
               {else}
                   todos os menus já associados a esse perfil
                {/if}
                <div class="panel-body" id ="painel_menu"> 
                    <table class="table-bordered" border="1" width="100%">
                        <thead>
                            <tr class="alert alert-info"><td colspan="3"><tt><h1>Menus do Perfil </h1></tt></tr>
                            <tr style="font-size: large">
                                <th>Grupo do Menu</th>
                                <th>Item do Menu</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody> 
                            {if (isset($lista_de_mp))}
                                {foreach from=$lista_de_mp item="linha"}
                                <tr> 
                                    <td>{$linha.descpai}</td>
                                    <td>{$linha.descfilho}</td>
                                    <td><a href="/perfil/excluir_menu/idPerfil/{$linha.idPerfil}/idMenu/{$linha.idMenu}">Excluir</a></td>
                                </tr>
                                {foreachelse}
                                <tr><td colspan="3">nenhum menu associado a esse perfil</td></tr>
                                {/foreach}  
                            {/if}                            
                        </tbody>
                    </table>
                </div>
           {/if} 
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
<script src="/files/js/perfil/perfil_novo.js"></script>



{include file="comuns/footer.tpl"}

