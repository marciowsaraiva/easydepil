<?php /* Smarty version Smarty-3.1.18, created on 2016-03-09 15:46:55
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/os/agendaanalitica.html" */ ?>
<?php /*%%SmartyHeaderCode:22977663756e06f9fdf1348-63755089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93de73f7d96029d7effa000f629881e15b9c9354' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/os/agendaanalitica.html',
      1 => 1457549214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22977663756e06f9fdf1348-63755089',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_reduzida' => 0,
    'linha' => 0,
    'lista_status' => 0,
    'itemdet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e06f9fe21388_76559908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e06f9fe21388_76559908')) {function content_56e06f9fe21388_76559908($_smarty_tpl) {?>                    <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Colaborador</th>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_reduzida']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                            <th <span style="background-color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsResumida'])===null||$tmp==='' ? '' : $tmp);?>
</span> </th>
                        <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                        <tr>
                            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsColaborador'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                            
                                <?php echo var_dump($_smarty_tpl->tpl_vars['linha']->value);?>
;
                                <?php  $_smarty_tpl->tpl_vars["itemdet"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["itemdet"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['linha']->value['tipoagenda']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["itemdet"]->key => $_smarty_tpl->tpl_vars["itemdet"]->value) {
$_smarty_tpl->tpl_vars["itemdet"]->_loop = true;
?>
                                  <td> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['itemdet']->value['qtHoras'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                <?php } ?>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

<?php }} ?>
