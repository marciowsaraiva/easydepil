<?php /* Smarty version Smarty-3.1.18, created on 2016-05-30 07:35:31
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendahorarioprofissional.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1320693453574c17731ae8f7-93210142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48952f5472c98798788b94eeeec81308d466d060' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendahorarioprofissional.tpl',
      1 => 1464479875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1320693453574c17731ae8f7-93210142',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_agendaprofissional' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574c17731e0648_71431906',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574c17731e0648_71431906')) {function content_574c17731e0648_71431906($_smarty_tpl) {?>                    <table class="table">
                    <thead>
                        <tr>
                            <th>Profissional</th>
                            <th>Cargo</th>
                            <th>Celular</th>
                            <th>E-Mail</th>
<!--                            <th>Ação</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_agendaprofissional']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsProfissional'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCargo'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCelular'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsEmail'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
<!--                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="delcolaborador(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProfissional'];?>
);" > Excluir </a>
                                </td>-->
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table><?php }} ?>
