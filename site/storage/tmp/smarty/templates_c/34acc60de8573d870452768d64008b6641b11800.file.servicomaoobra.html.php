<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:43:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servico/servicomaoobra.html" */ ?>
<?php /*%%SmartyHeaderCode:62482427257238111e8b7e0-28877810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34acc60de8573d870452768d64008b6641b11800' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servico/servicomaoobra.html',
      1 => 1457989803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62482427257238111e8b7e0-28877810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_servicomaoobra' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57238111f08f46_73220833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238111f08f46_73220833')) {function content_57238111f08f46_73220833($_smarty_tpl) {?>                <table class="table">
                    <thead>
                        <tr>
                            <th>Mao de Obra</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Valor Unitário</th>
                            <th>Valor Total</th>
                            <th>Observacao</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_servicomaoobra']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsMaoObra'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['qtHoras'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsUnidade'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlUnitario'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlTotal'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsObservacao'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="delmaoobra(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idServicoMaoObra'];?>
);" > Excluir </a>
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
<?php }} ?>
