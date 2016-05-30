<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:54:16
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/perfil/perfil_form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:638944066572383a8d60713-06771400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1bf9df5b10e3bffbc96c4688a6598acc5b0d4d6' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/perfil/perfil_form_novo.tpl',
      1 => 1454016143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '638944066572383a8d60713-06771400',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_de_menus' => 0,
    'lista_de_mp' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572383a8dc7375_57139265',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572383a8dc7375_57139265')) {function content_572383a8dc7375_57139265($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idPerfil'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsPerfil'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Perfis<?php }?></h1></tt>
            </div>          
            <a href="/perfil" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-perfil" 
                  action="/perfil/gravar_perfil" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="input-group col-lg-8">                    
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idPerfil'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                            <input type="text" class="form-control" name="idPerfil" id="idPerfil" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idPerfil'];?>
" READONLY>           
                    <?php } else { ?>
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                              <input type="text" class="form-control" name="idPerfil" value="" READONLY>           
                    <?php }?>                     
                    <span class="input-group-addon btn-outline btn-primary">Descri&ccedil;&atilde;o</span>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsPerfil'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                </div> 
                <br>            
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
                <br>
            </form>
            
            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idPerfil'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3>0) {?>
                <?php if ((isset($_smarty_tpl->tpl_vars['lista_de_menus']->value))) {?>
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
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_de_menus']->value),$_smarty_tpl);?>
 
                            </select>   

                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-primary" value="Insere Menu" name="btnInsereMenu" id="btnInsereMenu"/>
                            </span>                                      
                        </div><!-- /input-group -->
                    </div>                
                    <input type="hidden" name="idPerfil" id="idPerfil"value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idPerfil'];?>
" />

                </form>
               <?php } else { ?>
                   todos os menus já associados a esse perfil
                <?php }?>
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
                            <?php if ((isset($_smarty_tpl->tpl_vars['lista_de_mp']->value))) {?>
                                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_de_mp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                <tr> 
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descpai'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descfilho'];?>
</td>
                                    <td><a href="/perfil/excluir_menu/idPerfil/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPerfil'];?>
/idMenu/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMenu'];?>
">Excluir</a></td>
                                </tr>
                                <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                <tr><td colspan="3">nenhum menu associado a esse perfil</td></tr>
                                <?php } ?>  
                            <?php }?>                            
                        </tbody>
                    </table>
                </div>
           <?php }?> 
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



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
