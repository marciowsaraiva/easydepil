<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:37:28
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/os/listaocorrencias.html" */ ?>
<?php /*%%SmartyHeaderCode:19849414495741d238549a73-87054602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '144445ff9c83e0d941e2f986a030a3ee60db3f7f' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/os/listaocorrencias.html',
      1 => 1459129232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19849414495741d238549a73-87054602',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'os_listastatus' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741d238565d08_68066326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741d238565d08_68066326')) {function content_5741d238565d08_68066326($_smarty_tpl) {?>        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Mudança</th>
                    <th>Usuário</th>
                    <th>Observação</th>
                    <th>Origem</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['os_listastatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtMudanca'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusOS'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUsuario'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsOrigemInformacao'];?>
</td> 
                </tr>
                <?php } ?>        
            </tbody>
        </table><?php }} ?>
