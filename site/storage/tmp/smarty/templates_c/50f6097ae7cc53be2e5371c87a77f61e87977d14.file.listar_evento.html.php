<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:28:20
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/evento/listar_evento.html" */ ?>
<?php /*%%SmartyHeaderCode:150956958056966d145049f2-20602156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50f6097ae7cc53be2e5371c87a77f61e87977d14' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/evento/listar_evento.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150956958056966d145049f2-20602156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'eventos' => 0,
    'reg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56966d1452efd2_39486149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56966d1452efd2_39486149')) {function content_56966d1452efd2_39486149($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Listar Eventos</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Data</th>
                            <th>Evento</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['reg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reg']->key => $_smarty_tpl->tpl_vars['reg']->value) {
$_smarty_tpl->tpl_vars['reg']->_loop = true;
?>
                        <tr>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reg']->value['data'],'%d/%m/%Y');?>
</td>
                            <td style="text-transform: uppercase;"><a href="/evento/evento_detalhes/id_evento/<?php echo $_smarty_tpl->tpl_vars['reg']->value['id_evento'];?>
"><?php echo $_smarty_tpl->tpl_vars['reg']->value['nome_evento'];?>
</a></td>
                            <td>
                                <span class="latitude geo" id="<?php echo $_smarty_tpl->tpl_vars['reg']->value['id_evento'];?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['reg']->value['latitude'])===null||$tmp==='' ? 'null' : $tmp);?>
</span>
                                <span class="glyphicon glyphicon-edit"></span>
                            </td>
                            <td>
                                <span class="longitude geo" id="<?php echo $_smarty_tpl->tpl_vars['reg']->value['id_evento'];?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['reg']->value['longitude'])===null||$tmp==='' ? 'null' : $tmp);?>
</span>
                                <span class="glyphicon glyphicon-edit"></span>
                            </td>
                        </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars['reg']->_loop) {
?>
                    <tr>
                        <td colspan="100%">Nenhum registro encontrado.</td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<!-- JavaScript -->
<script type="text/javascript" src="/files/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script type="text/javascript" src="/files/js/util.js"></script>


<!-- Page Specific Plugins -->
<script type="text/javascript" src="/files/js/bootbox.min.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<script type="text/javascript" src="/files/js/jquery.jeditable/jquery.jeditable.js"></script>
<script type="text/javascript" src="/files/js/evento/listar_evento.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
