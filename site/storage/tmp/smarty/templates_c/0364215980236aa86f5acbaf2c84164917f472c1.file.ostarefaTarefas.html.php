<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:41:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/ostarefaTarefas.html" */ ?>
<?php /*%%SmartyHeaderCode:1690878320572380991b95b4-87127023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0364215980236aa86f5acbaf2c84164917f472c1' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/ostarefaTarefas.html',
      1 => 1459043098,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1690878320572380991b95b4-87127023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listatarefasdatarefa' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57238099227cb5_48119002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238099227cb5_48119002')) {function content_57238099227cb5_48119002($_smarty_tpl) {?>                <table class="table" border='1'>
                    <thead>
                        <tr>
                            <th>Tarefa</th>
                            <th>Detalhes</th>
                            <th>Digitado em</th>
                            <th>Digitado por</th>
                            <th>Inicio da Tarefa</th>
                            <th>Fim da Tarefa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listatarefasdatarefa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTarefa'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacaoTarefa'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtDigitado'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUsuario'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtInicio'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtFim'];?>
</td> 
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
<?php }} ?>
