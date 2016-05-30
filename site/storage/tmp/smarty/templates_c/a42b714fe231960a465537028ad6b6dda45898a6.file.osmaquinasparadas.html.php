<?php /* Smarty version Smarty-3.1.18, created on 2016-03-19 17:35:18
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osmaquinaparada/osmaquinasparadas.html" */ ?>
<?php /*%%SmartyHeaderCode:166915962356edb8063f1247-97663822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a42b714fe231960a465537028ad6b6dda45898a6' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osmaquinaparada/osmaquinasparadas.html',
      1 => 1458419287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166915962356edb8063f1247-97663822',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'os_listamaquinasparadas' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56edb80641d489_62521575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56edb80641d489_62521575')) {function content_56edb80641d489_62521575($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Motivo</th>
                    <th>Maquina</th>
                    <th>De</th>
                    <th>Ate</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['os_listamaquinasparadas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMotivoMaquinaParada'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaquina'];?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtFim'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                    <td> 
                        <a class="glyphicon glyphicon-trash" title ="Excluir esta informação" onclick="osmaquinaparada.delOSMaquinaParada(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefa'];?>
);"> Excluir </a> 
                    </td>
                </tr>
                <?php } ?>        
            </tbody>
        </table><?php }} ?>
