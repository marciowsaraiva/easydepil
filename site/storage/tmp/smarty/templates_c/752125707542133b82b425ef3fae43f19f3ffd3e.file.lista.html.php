<?php /* Smarty version Smarty-3.1.18, created on 2016-07-11 19:11:15
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/lancardespesa/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:109387551457841983e658a4-49893842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '752125707542133b82b425ef3fae43f19f3ffd3e' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/lancardespesa/lista.html',
      1 => 1464798741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109387551457841983e658a4-49893842',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'despesas' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57841983ed3601_62105082',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57841983ed3601_62105082')) {function content_57841983ed3601_62105082($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>        <!--Altere daqui pra baixo-->
        <h3>Lista de despesas digitadas hoje</h3>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Despesa</th>
                    <th>Fornecedor</th>
                    <th>Observacao</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['despesas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtFinanceiro'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsDespesa'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsFornecedor'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsObservacao'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlFinanceiro'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><a class="glyphicon glyphicon-trash" href="/lancardespesa/deldespesa/idFinanceiro/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiro'];?>
">  Excluir</a></td>
                </tr>
                <?php } ?>        
            </tbody>
        </table>
        <!--Altere daqui pra cima-->
<?php }} ?>
