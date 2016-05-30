<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:37:28
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/os/osanalitico.html" */ ?>
<?php /*%%SmartyHeaderCode:17596843515741d238568920-77336622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '649141ced7c899090c738fe50cfb3ed504936b42' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/os/osanalitico.html',
      1 => 1457625753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17596843515741d238568920-77336622',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_reduzida' => 0,
    'linha' => 0,
    'lista_status' => 0,
    'itemdet' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741d2385a7bd8_70821897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741d2385a7bd8_70821897')) {function content_5741d2385a7bd8_70821897($_smarty_tpl) {?>                    <table class="table" border="1">
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
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                        <tr>
                            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsColaborador'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                <?php  $_smarty_tpl->tpl_vars["itemdet"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["itemdet"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['linha']->value['tipoagenda']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["itemdet"]->key => $_smarty_tpl->tpl_vars["itemdet"]->value) {
$_smarty_tpl->tpl_vars["itemdet"]->_loop = true;
?>
                                  <td> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['itemdet']->value['qtHoras'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                  <?php if ($_smarty_tpl->tpl_vars['itemdet']->value['idTipoAgenda']==1) {?>
                                  <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['itemdet']->value['qtHoras'], null, 0);?>
                                  <?php }?>
                                <?php } ?>
                            <td><a class="glyphicon glyphicon-book" title ="Reservar" onclick="os.reservarColaborador(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idColaborador'];?>
, '<?php echo $_smarty_tpl->tpl_vars['linha']->value['dsColaborador'];?>
');" > Reservar </a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    <strong>Total de Horas Disponíveis:</strong>
                    <strong><?php echo (($tmp = @$_smarty_tpl->tpl_vars['total']->value)===null||$tmp==='' ? '' : $tmp);?>
</strong>                            

<?php }} ?>
