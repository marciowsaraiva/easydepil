<?php /* Smarty version Smarty-3.1.18, created on 2016-01-11 11:07:40
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/usuarios/usuarios_form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:455106055693a91c596555-63359461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41f39d2dc0fbe624efca6420c2d507dbbd5cf75c' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/usuarios/usuarios_form_novo.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '455106055693a91c596555-63359461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_tipos' => 0,
    'lista_motoristas' => 0,
    'lista_Perfis' => 0,
    'lista_Perfil_Usuario' => 0,
    'linha' => 0,
    'lista_Projetos' => 0,
    'lista_prodProjetoUsuarios' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5693a91c6fa020_71147623',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5693a91c6fa020_71147623')) {function content_5693a91c6fa020_71147623($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="alert alert-info" >
            <h1>Novo Usu&aacute;rio - Status : <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idUsuario'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> Edi&ccedil;&atilde;o <?php } else { ?> Inclus&atilde;o <?php }?></h1>
        </div>  

        <a href="/usuarios" class="btn btn-primary"> Voltar</a><br> <br>
        <form name="frm-usuario" id="frm-usuario" action="/usuarios/gravar_usuario" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario()">
            <div class="form-group">
                <label for="idUsuario">            
                       <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idUsuario'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                            C&oacute;digo:<?php echo $_smarty_tpl->tpl_vars['registro']->value['idUsuario'];?>

                            
                       <?php } else { ?>
                            C&oacute;digo: Novo Registro
                       <?php }?> 
                </label>
                <div type="hidden" class="form-group">        
                    <input type="hidden" class="form-control" name="idUsuario" id="idUsuario" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idUsuario'];?>
" />
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['nome'];?>
" />
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="nome">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['senha'];?>
" >           
                        </div>
                    </div>              
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="nome">Tipo Usu&aacute;rio</label>
                            <select class="form-control" name="idTipoUsuario" id="idTipoUsuario">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipos']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoUsuario']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                                      
                </div> 
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" onblur="validaEmail()" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['email'];?>
">           
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="telefone1">Telefone 1</label>
                            <input type="text" class="form-control" name="telefone1" id="telefone1" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['telefone1'];?>
" >           
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="telefone2">Telefone 2</label>
                            <input type="text" class="form-control" name="telefone2" id="telefone2" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['telefone2'];?>
" >           
                        </div>
                    </div>                        
                </div>     
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="email">Motorista</label>
                        <select class="form-control" name="id_motorista" id="id_motorista">
                            <option value="" ></option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_motoristas']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['id_motorista']),$_smarty_tpl);?>

                        </select>                    
                        <input type="hidden" class="form-control" name="idProjeto" id="idProjeto" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjeto'];?>
" >                               
                        <input type="hidden" class="form-control" name="id_parceiro" id="id_parceiro" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['id_parceiro'])===null||$tmp==='' ? '' : $tmp);?>
" >
                        <input type="hidden" class="form-control" name="status" id="idUsuario" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['status'];?>
" />
                        </div>
                    </div>
                </div>                
                <br>            
                <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
            </div>
        </form>
        <br>   
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idUsuario'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3>0) {?> 
                <!--Altere daqui pra cima-->
                <div class="alert alert-info" >
                    <h1>Perfis do Usuario</h1>
                </div>          
                <div class="panel-body">
                <?php if (($_smarty_tpl->tpl_vars['lista_Perfis']->value>0)) {?>
                    <form name="frm-usuario-perfil" 
                          action="/usuarios/novo_usuario_perfil/" 
                          method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="idPerfil_usuario">Perfis</label>
                                    <select class="form-control" name="idPerfil_usuario" id="idPerfil_usuario">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_Perfis']->value),$_smarty_tpl);?>

                                    </select>
                                    <input type="hidden" name="idUsuario_perfil" id="idUsuario_perfil"value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idUsuario'];?>
" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" value="Inserir" name="btnInserir" id="btnInserir" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    Todos os Perfis já estão definidos para esse Usuario.
                <?php }?>
                </div>        
               
                <div class="panel-body">                    
                    <table class="table" border="1">
                        <thead>
                            <tr>                        
                                <th>Perfil</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>                        
                            <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_Perfil_Usuario']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                            <tr>                                                
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao'];?>
</td>
                                <td><?php if (!isset($_smarty_tpl->tpl_vars['linha']) || !is_array($_smarty_tpl->tpl_vars['linha']->value)) $_smarty_tpl->createLocalArrayVariable('linha');
if ($_smarty_tpl->tpl_vars['linha']->value['status'] = 1) {?> Ativo <?php } else { ?> Inativo <?php }?></td>                        
                                <td><a class="glyphicon glyphicon-trash" href="/usuarios/del_usuario_perfil/idUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idUsuario'];?>
/idPerfil/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPerfil'];?>
">Excluir</a> </td>
                            </tr>
                            <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                            <tr><td colspan="3">nenhum Perfil associado a esse Usuario</td></tr>
                            <?php } ?>                                                  
                        </tbody>
                    </table> 
                </div>  
                <br>        
                <!--Altere daqui pra cima-->
                <div class="alert alert-info" >
                    <h1>Projetos do Usuario</h1>
                </div>                                  
                <div class="panel-body">
                <?php if (($_smarty_tpl->tpl_vars['lista_Projetos']->value>0)) {?>
                    <form name="frm-usuario-projeto" 
                          action="/usuarios/novo_prodProjetoUsuario/" 
                          method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="idProjeto">Projetos</label>
                                    <select class="form-control" name="idProjeto" id="idProjeto">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_Projetos']->value),$_smarty_tpl);?>

                                    </select>
                                    <input type="hidden" name="idUsuario" id="idUsuario"value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idUsuario'];?>
" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" value="Inserir" name="btnInserir" id="btnInserir" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    Todos os Projeto já estão definidos para esse Usuario.
                <?php }?>
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
                            <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_prodProjetoUsuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                            <tr>                                                
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['projeto'];?>
</td>                                
                                <td><a class="glyphicon glyphicon-trash" href="/usuarios/del_prodProjetoUsuario/idUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idUsuario'];?>
/idProjeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjeto'];?>
">Excluir</a> </td>
                            </tr>
                            <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                            <tr><td colspan="3">nenhum Projeto associado a esse Usuario</td></tr>
                            <?php } ?>                                                  
                        </tbody>
                    </table> 
                </div>    
                        
        <?php } else { ?> 
            nenhum Perfil e Projeto associado a esse Usuario
        <?php }?>
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

<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
