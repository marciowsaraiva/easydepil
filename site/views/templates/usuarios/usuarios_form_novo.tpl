{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="alert alert-info" >
            <h1>{if {$registro.idUsuario}>0} Edi&ccedil;&atilde;o {else} Inclus&atilde;o {/if}</h1>
        </div>  

        <a href="/usuarios" class="btn btn-primary"> Voltar</a><br> <br>
        <form name="frm-usuario" id="frm-usuario" action="/usuarios/gravar_usuario" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario();">
            <div class="form-group">
                <label for="idUsuario">            
                       {if {$registro.idUsuario}>0}
                            C&oacute;digo:{$registro.idUsuario}
                            
                       {else}
                            C&oacute;digo: Novo Registro
                       {/if} 
                </label>
                <div type="hidden" class="form-group">        
                    <input type="hidden" class="form-control" name="idUsuario" id="idUsuario" value="{$registro.idUsuario}" />
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="dsUsuario" id="nome" value="{$registro.dsUsuario}" />
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="nome">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" value="{$registro.senha}" >           
                        </div>
                    </div>              
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="nome">Tipo Usu&aacute;rio</label>
                            <select class="form-control" name="idTipoUsuario" id="idTipoUsuario">
                                {html_options options=$lista_tipos selected=$registro.idTipoUsuario}
                            </select>                      
                        </div>
                    </div>                                      
                </div> 
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" onblur="validaEmail()" value="{$registro.email}">           
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="telefone1">Telefone 1</label>
                            <input type="text" class="form-control" name="telefone1" id="telefone1" value="{$registro.telefone1}" >           
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="telefone2">Telefone 2</label>
                            <input type="text" class="form-control" name="telefone2" id="telefone2" value="{$registro.telefone2}" >           
                        </div>
                    </div>                        
                </div>     
                <br>            
                <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
            </div>
        </form>
        <br>   
        {if {$registro.idUsuario}>0} 
                <!--Altere daqui pra cima-->
                <div class="alert alert-info" >
                    <h1>Perfis do Usuario</h1>
                </div>          
                <div class="panel-body">
                {if ($lista_Perfis > 0)}
                    <form name="frm-usuario-perfil" 
                          action="/usuarios/novo_usuario_perfil/" 
                          method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="idPerfil_usuario">Perfis</label>
                                    <select class="form-control" name="idUsuarioPerfil" id="idUsuarioPerfil">
                                        {html_options options=$lista_Perfis}
                                    </select>
                                    <input type="hidden" name="idUsuarioPerfil" id="idUsuarioPerfil"value="{$registro.idUsuario}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" value="Inserir" name="btnInserir" id="btnInserir" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                {else}
                    Todos os Perfis já estão definidos para esse Usuario.
                {/if}
                </div>        
               
                <div class="panel-body">                    
                    <table class="table" border="1">
                        <thead>
                            <tr>                        
                                <th>Perfil</th>
                                <th>stStatus</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            {foreach from=$lista_Perfil_Usuario item="linha"}
                            <tr>                                                
                                <td>{$linha.dsPerfil}</td>
                                <td>{if $linha.stStatus=1} Ativo {else} Inativo {/if}</td>                        
                                <td><a class="glyphicon glyphicon-trash" href="/usuarios/del_usuario_perfil/idUsuario/{$linha.idUsuario}/idPerfil/{$linha.idPerfil}">Excluir</a> </td>
                            </tr>
                            {foreachelse}
                            <tr><td colspan="3">nenhum Perfil associado a esse Usuario</td></tr>
                            {/foreach}                                                  
                        </tbody>
                    </table> 
                </div>  
                <br>        
                <!--Altere daqui pra cima-->
                <div class="alert alert-info" >
                    <h1>Projetos do Usuario</h1>
                </div>                                  
                <div class="panel-body">
                {if ($lista_Projetos > 0)}
                    <form name="frm-usuario-projeto" 
                          action="/usuarios/novo_clinProjetoUsuario/" 
                          method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="idProjeto">Projetos</label>
                                    <select class="form-control" name="idProjeto" id="idProjeto">
                                        {html_options options=$lista_Projetos}
                                    </select>
                                    <input type="hidden" name="idUsuario" id="idUsuario"value="{$registro.idUsuario}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" value="Inserir" name="btnInserir" id="btnInserir" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                {else}
                    Todos os Projeto já estão definidos para esse Usuario.
                {/if}
                </div>        
                <br>        
                <div class="panel-body">                    
                    <table class="table" border="1">
                        <thead>
                            <tr>                        
                                <th>Projetos</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            {foreach from=$lista_clinProjetoUsuarios item="linha"}
                            <tr>                                                
                                <td>{$linha.projeto}</td>                                
                                <td><a class="glyphicon glyphicon-trash" href="/usuarios/del_clinProjetoUsuario/idUsuario/{$linha.idUsuario}/idProjeto/{$linha.idProjeto}">Excluir</a> </td>
                            </tr>
                            {foreachelse}
                            <tr><td colspan="3">nenhum Projeto associado a esse Usuario</td></tr>
                            {/foreach}                                                  
                        </tbody>
                    </table> 
                </div>    
                        
        {else} 
            nenhum Perfil e Projeto associado a esse Usuario
        {/if}
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
<script src="/files/js/usuarios/usuario_novo.js"></script>

{include file="comuns/footer.tpl"}

