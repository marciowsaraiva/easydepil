<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 15:22:31
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/fluxocaixa/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:211551496157546de728ad34-51298498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42abfccfa6cb48a31236aec11ebb192060698fc1' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/fluxocaixa/lista.html',
      1 => 1465150867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211551496157546de728ad34-51298498',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57546de730e5c0_30343476',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57546de730e5c0_30343476')) {function content_57546de730e5c0_30343476($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>    <div id='mostrarresultado'>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Fornecedor/Cliente</th>
                    <th>Descricao da Receita/Despesa</th>
                    <th>Valor da Receita</th>
                    <th>Valor da Despesa</th>
                    <th>Observação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtFinanceiro'],'%d/%m/%Y');?>
</td> 
                    <?php if ($_smarty_tpl->tpl_vars['linha']->value['stTipo']=='C') {?>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCliente'];?>
</td> 
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsReceita'];?>
</td> 
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vlFinanceiro'];?>
</td> 
                        <td></td> 
                    <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsFornecedor'];?>
</td> 
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsDespesa'];?>
</td> 
                        <td></td> 
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vlFinanceiro'];?>
</td> 
                    <?php }?>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                    <td><a class="glyphicon glyphicon-trash" href="/fluxocaixa/dellancamento/idFinanceiro/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiro'];?>
">  Excluir</a></td>
                </tr>
                <?php } ?>        
            </tbody>
        </table>
    </div><?php }} ?>
