<?php /* Smarty version Smarty-3.1.18, created on 2016-01-30 19:32:38
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/origemrateio/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4022720056ad2bf6cb9727-00398225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed2ed52dd18dff6a6f93a5512bc883e1467c39d7' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/origemrateio/form_novo.tpl',
      1 => 1454107248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4022720056ad2bf6cb9727-00398225',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56ad2bf6ce4292_88413262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ad2bf6ce4292_88413262')) {function content_56ad2bf6ce4292_88413262($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idOrigemRateio'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?>  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsOrigemRateio'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Origem de Rateios<?php }?></h1></tt>
            </div>          
            <a href="/origemrateio" class="btn btn-primary">Voltar</a><br>

            <form name="frm-origemrateio" 
                  action="/origemrateio/gravar_origemrateio" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="input-group col-lg-8">                    
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idOrigemRateio'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                            <input type="text" class="form-control" name="idOrigemRateio" id="idOrigemRateio" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idOrigemRateio'];?>
" READONLY>           
                    <?php } else { ?>
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                              <input type="text" class="form-control" name="idOrigemRateio" value="" READONLY>           
                    <?php }?>                     
                    <span class="input-group-addon btn-outline btn-primary">Descri&ccedil;&atilde;o</span>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsOrigemRateio'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                </div> 
                <br>            
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
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
<script src="/files/js/origemrateio/origemrateio_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
