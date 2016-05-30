<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:40:04
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefainsumo.html" */ ?>
<?php /*%%SmartyHeaderCode:2138601561572380544be0f1-97945378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd1a17e54bb40bcb36edea34ba79323a6eb3d21b' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefainsumo.html',
      1 => 1458087303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2138601561572380544be0f1-97945378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_ostarefainsumo' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572380544d7729_29375460',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572380544d7729_29375460')) {function content_572380544d7729_29375460($_smarty_tpl) {?>                <table class="table">
                    <thead>
                        <tr>
                            <th>Insumo</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Observacao</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_ostarefainsumo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsInsumo'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtInsumo'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUnidade'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="ostarefa.delOSTarefaInsumo(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefa'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefaInsumo'];?>
);" > Excluir </a>
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>

<?php }} ?>
