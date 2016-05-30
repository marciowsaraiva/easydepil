<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:41:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/osmaquina.html" */ ?>
<?php /*%%SmartyHeaderCode:1754169112572380993051f4-08003811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2984c1b516ba870df26cf20ad6d81d9f4027bc33' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/osmaquina.html',
      1 => 1459116135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1754169112572380993051f4-08003811',
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
  'unifunc' => 'content_57238099322cc0_20063855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238099322cc0_20063855')) {function content_57238099322cc0_20063855($_smarty_tpl) {?>                <table class="table"  border="1">
                    <thead>
                        <tr>
                            <th>Maquina</th>
                            <th>Quantidade</th>
                            <th>Unidade</th>
                            <th>Observacao</th>
                            <th>Tarefa</th>
                            <th>Resumo Tarefa</th>                            
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
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTarefa'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacaoTarefa'];?>
</td> 
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
<?php }} ?>
