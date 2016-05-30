<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:41:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/osmaquinaparada.html" */ ?>
<?php /*%%SmartyHeaderCode:766294085723809922b838-89996577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2b32f3349d1e205c284734c09003e242938471a' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/osmaquinaparada.html',
      1 => 1459129392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '766294085723809922b838-89996577',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'os_listamaquinaparada' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723809929a873_75597941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723809929a873_75597941')) {function content_5723809929a873_75597941($_smarty_tpl) {?>        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Maquina</th>
                    <th>Motivo</th>
                    <th>Tarefa</th>
                    <th>De</th>
                    <th>Ate</th>
                    <th>Observação</th>
                    <th>Usuario Digitado</th>
                    <th>Data Digitado</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['os_listamaquinaparada']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaquina'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaquinaParada'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTarefa'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtInicio'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtFim'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUsuario'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtDigitado'];?>
</td> 
                </tr>
                <?php } ?>        
            </tbody>
        </table><?php }} ?>
