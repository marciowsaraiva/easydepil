<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:53:58
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/comuns/erro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:711407292569673169e4c26-46058496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9de4f449f5b3fbc1f997a9bd312f20018194bb9' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/comuns/erro.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '711407292569673169e4c26-46058496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569673169f6857_69690382',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569673169f6857_69690382')) {function content_569673169f6857_69690382($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!-- Sidebar -->
        <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
        
        <!--Altere daqui pra baixo-->


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Erro <small>oops!</small></h1>                  
                    <p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['msg']->value)===null||$tmp==='' ? '' : $tmp);?>
</p>
                </div>
            </div><!-- /.row -->

        </div><!-- /#page-wrapper -->

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
<!-- Blank JS -->
<!--<script src="/files/js/blank/blank.js"></script> -->
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
