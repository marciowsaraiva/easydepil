<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:40:33
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osmaquinaparada/osmaquinaparada.html" */ ?>
<?php /*%%SmartyHeaderCode:152393903157238071de55a5-23658018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc65b1a1f58c4003c5d116fae2895c49ee93a257' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osmaquinaparada/osmaquinaparada.html',
      1 => 1458776237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152393903157238071de55a5-23658018',
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
  'unifunc' => 'content_57238071e1b934_80693863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238071e1b934_80693863')) {function content_57238071e1b934_80693863($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>        <table class="table table-striped" border="1">
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
                    <th>Ação</th>
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
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y H:i") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtFim'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUsuario'];?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtDigitado'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td> 
                        <a class="glyphicon glyphicon-trash" title ="Excluir esta informação" onclick="osmaquinaparada.delOSMaquinaParada(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSMaquinaParada'];?>
);"> Excluir </a> 
                    </td>
                </tr>
                <?php } ?>        
            </tbody>
        </table><?php }} ?>
