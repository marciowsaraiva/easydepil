<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:40:04
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefamaquina.html" */ ?>
<?php /*%%SmartyHeaderCode:633945393572380544f6d77-59627459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '168ad720246cbf88317f2b0f21c9bcb7951596af' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefamaquina.html',
      1 => 1458162756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '633945393572380544f6d77-59627459',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_ostarefamaquina' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723805450f156_65233965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723805450f156_65233965')) {function content_5723805450f156_65233965($_smarty_tpl) {?>                <table class="table">
                    <thead>
                        <tr>
                            <th>Maquina</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Observacao</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_ostarefamaquina']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaquina'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtHoras'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUnidade'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="ostarefa.delOSTarefaMaquina(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefa'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefaMaquina'];?>
);" > Excluir </a>
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
<?php }} ?>
