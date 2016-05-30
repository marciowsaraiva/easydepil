<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:40:05
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/dashboard/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:971703322569cb2f5c573e0-18365284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bab144ab0fde22769bdbfc342f4c279ac9388bae' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/dashboard/dashboard.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '971703322569cb2f5c573e0-18365284',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prodProjetoUsuario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb2f5c8b482_03799652',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb2f5c8b482_03799652')) {function content_569cb2f5c8b482_03799652($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <script type="text/javascript" src="/files/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/files/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script type="text/javascript" src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

    <div id="page-wrapper">

        <form name="frm-filtro" 
              method="POST" 
              enctype="multipart/form-data">
            
            <?php if (in_array('1',$_smarty_tpl->tpl_vars['prodProjetoUsuario']->value)||in_array('3',$_smarty_tpl->tpl_vars['prodProjetoUsuario']->value)||in_array('4',$_smarty_tpl->tpl_vars['prodProjetoUsuario']->value)) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("dashboard/troca/dashboard_troca.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php }?>
            <hr>
            
            <?php if (in_array('2',$_smarty_tpl->tpl_vars['prodProjetoUsuario']->value)) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("dashboard/event/dashboard_event.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php }?>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<script type="text/javascript" src="/files/js/jquery.price/jquery.price_format.1.3.js"></script>
<script type="text/javascript" src="/files/js/tablesorter/jquery.tablesorter.js"></script>
<script type="text/javascript" src="/files/js/tablesorter/tables.js"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script type="text/javascript" src="/files/js/util.js"></script>
<script type="text/javascript" src="/files/js/dashboard/dashboard.js"></script>


<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
