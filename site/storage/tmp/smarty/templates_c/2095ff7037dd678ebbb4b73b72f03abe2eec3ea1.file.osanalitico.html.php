<?php /* Smarty version Smarty-3.1.18, created on 2016-03-10 18:18:19
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osanalise/osanalitico.html" */ ?>
<?php /*%%SmartyHeaderCode:126569393056e1e49b0a8481-20979611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2095ff7037dd678ebbb4b73b72f03abe2eec3ea1' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osanalise/osanalitico.html',
      1 => 1457644030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126569393056e1e49b0a8481-20979611',
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
  'unifunc' => 'content_56e1e49b0e7388_53089527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e1e49b0e7388_53089527')) {function content_56e1e49b0e7388_53089527($_smarty_tpl) {?>                    <table class="table" border="1">
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
