<?php /* Smarty version Smarty-3.1.18, created on 2016-07-11 19:00:46
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/fluxocaixa/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20173600655784170eccc789-99740166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fca689335fd1bfb42db5cea2b4546278b8c6bdf0' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/fluxocaixa/lista.tpl',
      1 => 1465151624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20173600655784170eccc789-99740166',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'linha' => 0,
    'totalreceita' => 0,
    'totaldespesa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5784170ed33bf1_29330934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5784170ed33bf1_29330934')) {function content_5784170ed33bf1_29330934($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>    <div id='mostrarresultado'>
        <?php $_smarty_tpl->tpl_vars["totaldespesa"] = new Smarty_variable(0, null, 0);?>        
        <?php $_smarty_tpl->tpl_vars["totalreceita"] = new Smarty_variable(0, null, 0);?>        
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
                        <?php $_smarty_tpl->tpl_vars['totalreceita'] = new Smarty_variable($_smarty_tpl->tpl_vars['totalreceita']->value+$_smarty_tpl->tpl_vars['linha']->value['vlFinanceiro'], null, 0);?>        
                    <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsFornecedor'];?>
</td> 
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsDespesa'];?>
</td> 
                        <td></td> 
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vlFinanceiro'];?>
</td> 
                        <?php $_smarty_tpl->tpl_vars['totaldespesa'] = new Smarty_variable($_smarty_tpl->tpl_vars['totaldespesa']->value+$_smarty_tpl->tpl_vars['linha']->value['vlFinanceiro'], null, 0);?>        
                    <?php }?>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                    <td><a class="glyphicon glyphicon-trash" href="/fluxocaixa/dellancamento/idFinanceiro/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiro'];?>
">  Excluir</a></td>
                </tr>
                <?php } ?>                   
            </tbody>
            <tfoot>
                <td></td>
                <td></td>
                <td><strong>TOTAL:</strong></td>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['totalreceita']->value;?>
</strong></td>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['totaldespesa']->value;?>
</strong></td>            
                <td></td>
                <td></td>
            </tfoot>
        </table>
    </div><?php }} ?>
