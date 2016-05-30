<?php /* Smarty version Smarty-3.1.18, created on 2016-05-28 10:31:37
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendahorarioprofissional.html" */ ?>
<?php /*%%SmartyHeaderCode:144763633157499db9aaf314-03233022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2772fba6e66581a26bd41873b926082c7d201c6' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendahorarioprofissional.html',
      1 => 1464442264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144763633157499db9aaf314-03233022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_agendaprofissional' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57499db9ac21f7_99155733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57499db9ac21f7_99155733')) {function content_57499db9ac21f7_99155733($_smarty_tpl) {?>                    <table class="table">
                    <thead>
                        <tr>
                            <th>Profissional</th>
                            <th>Cargo</th>
                            <th>Celular</th>
                            <th>E-Mail</th>
<!--                            <th>Ação</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_agendaprofissional']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsProfissional'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCargo'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCelular'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsEmail'];?>
</td> 
<!--                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="delcolaborador(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProfissional'];?>
);" > Excluir </a>
                                </td>-->
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>

<?php }} ?>
