<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:06:38
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/comuns/erro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18014005895741cafe8a0948-82692279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5da538363e15497b569fa8024ad1f0d3301156ca' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/comuns/erro.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18014005895741cafe8a0948-82692279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741cafe8eeae7_56530115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741cafe8eeae7_56530115')) {function content_5741cafe8eeae7_56530115($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
