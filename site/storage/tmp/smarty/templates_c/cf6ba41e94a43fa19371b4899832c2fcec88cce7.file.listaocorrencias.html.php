<?php /* Smarty version Smarty-3.1.18, created on 2016-03-10 18:18:19
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osanalise/listaocorrencias.html" */ ?>
<?php /*%%SmartyHeaderCode:116813325956e1e49b087909-55579095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf6ba41e94a43fa19371b4899832c2fcec88cce7' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osanalise/listaocorrencias.html',
      1 => 1457644030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116813325956e1e49b087909-55579095',
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
  'unifunc' => 'content_56e1e49b0a60f0_14479308',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e1e49b0a60f0_14479308')) {function content_56e1e49b0a60f0_14479308($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
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
 $_from = $_smarty_tpl->tpl_vars['os_listastatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtMudanca'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
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
