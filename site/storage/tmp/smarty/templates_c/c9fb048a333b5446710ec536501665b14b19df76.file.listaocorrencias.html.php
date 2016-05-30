<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 09:23:57
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/projeto/listaocorrencias.html" */ ?>
<?php /*%%SmartyHeaderCode:125886775456efe7dd49d575-66615549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9fb048a333b5446710ec536501665b14b19df76' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/projeto/listaocorrencias.html',
      1 => 1457474871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125886775456efe7dd49d575-66615549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'projeto_listastatus' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56efe7dd4c2bb5_79448729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56efe7dd4c2bb5_79448729')) {function content_56efe7dd4c2bb5_79448729($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>        <table class="table table-striped" border="1">
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
 $_from = $_smarty_tpl->tpl_vars['projeto_listastatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtMudanca'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusProjeto'];?>
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
