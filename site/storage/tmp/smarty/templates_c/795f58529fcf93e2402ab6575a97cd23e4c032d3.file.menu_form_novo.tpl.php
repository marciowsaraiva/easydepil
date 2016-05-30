<?php /* Smarty version Smarty-3.1.18, created on 2016-03-29 17:53:46
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/menu/menu_form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59711424756faeb5adbc050-45804352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '795f58529fcf93e2402ab6575a97cd23e4c032d3' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/menu/menu_form_novo.tpl',
      1 => 1455572421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59711424756faeb5adbc050-45804352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_MenusPais' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56faeb5ae02323_24546236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56faeb5ae02323_24546236')) {function content_56faeb5ae02323_24546236($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
  
            <br>

    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="alert alert-info" >'
            <h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idMenu'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['descricao'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Menu<?php }?></h1>
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
                   <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idMenu'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                        C&oacute;digo:<?php echo $_smarty_tpl->tpl_vars['registro']->value['idMenu'];?>

                   <?php } else { ?>
                        C&oacute;digo: Novo Registro
                   <?php }?> 
            </label>
            <div type="hidden" class="form-group">        
                <input  type="hidden" class="form-control" name="idMenu" id="id_menu" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idMenu'];?>
" />
            </div>               
            <div class="input-group col-lg-4">
                <span class="input-group-addon btn-outline btn-primary">Url</span>                    
                <input type="text" class="form-control" name="url" id="url" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['url'])===null||$tmp==='' ? '' : $tmp);?>
" />                 
            </div>
            <br>
            <div class="input-group col-lg-4">                
                <span class="input-group-addon btn-outline btn-primary">Descri&ccedil;&atilde;o</span>                    
                <input type="text" class="form-control col-lg-12" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['descricao'])===null||$tmp==='' ? '' : $tmp);?>
" />                 
            </div>
            <br>    
            <div class="input-group col-lg-4">                               
                <span class="input-group-addon btn-outline btn-primary">Menu Pai</span>                   
                <select class="form-control col-lg-4" name="parent_menu" id="parent_menu"> 
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['parent_menu'];?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_MenusPais']->value,'selected'=>$_tmp3),$_smarty_tpl);?>

                </select> 
            </div>
            <br>        
            <div class="input-group col-lg-4">
                <span class="input-group-addon btn-outline btn-primary">Target</span>                    
                <input type="text" class="form-control" name="target" id="target" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['target'])===null||$tmp==='' ? '' : $tmp);?>
" />                 
            </div>
            <br>        
            <div class="input-group col-lg-4">
                <span class="input-group-addon btn-outline btn-primary">Ordem</span>                    
                <input type="text" class="form-control" name="ordem" id="ordem" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['ordem'])===null||$tmp==='' ? '' : $tmp);?>
" />                 
            </div>
            <input type="hidden" name="tipo" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['tipo'];?>
" />
            <br>          
            <input type="hidden" name="status" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['status'];?>
" />
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

<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
