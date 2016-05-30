<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:41:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/osmaoobra.html" */ ?>
<?php /*%%SmartyHeaderCode:927863842572380992cf654-68640845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94ed809c2d04e0b374268f3b1f099fa16bb4b99c' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/osmaoobra.html',
      1 => 1459116116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '927863842572380992cf654-68640845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_ostarefamaoobra' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57238099303593_11321078',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238099303593_11321078')) {function content_57238099303593_11321078($_smarty_tpl) {?>                <table class="table"  border="1">
                    <thead>
                        <tr>
                            <th>Mao de Obra</th>
                            <th>Inicio da Tarefa</th>
                            <th>Fim da Tarefa</th>
                            <th>Observação</th>
                            <th>Tarefa</th>                            
                            <th>Resumo Tarefa</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_ostarefamaoobra']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaoObra'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtInicio'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtFim'];?>
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
