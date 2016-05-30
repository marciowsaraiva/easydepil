<?php /* Smarty version Smarty-3.1.18, created on 2016-01-25 08:56:07
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/tipousuario/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146742637856a5ff47537a79-53626204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24a8fad48398890db3f227aea7fbdaf2f93c4ec3' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/tipousuario/form_novo.tpl',
      1 => 1453718991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146742637856a5ff47537a79-53626204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56a5ff47569ac1_67133901',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a5ff47569ac1_67133901')) {function content_56a5ff47569ac1_67133901($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoUsuario'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> Edi&ccedil;&atilde;o <?php } else { ?> Inclus&atilde;o <?php }?></h1></tt>
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
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoUsuario'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label class="form-control">Código</label>
                                <input type="text" class="form-control" name="idTipoUsuario" id="idTipoUsuario" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoUsuario'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label class="form-control">Código</label>
                                 <input type="text" class="form-control" name="idTipoUsuario" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label class="form-control">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTipoUsuario'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label class="form-control">Acesso total</label>
                        <input type="checkbox" class="form-control" name="stInclui" id="stInclui" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['stInclui'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3>0) {?> checked="checked" <?php }?>>           
                    </div> 
                    <div class="col-xs-2">
                        <label class="form-control">Somente consulta</label>
                        <input type="checkbox" class="form-control" name="stConsulta" id="stConsulta" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['stConsulta'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4>0) {?> checked="checked" <?php }?> >           
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



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
