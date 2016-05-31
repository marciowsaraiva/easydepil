<?php /* Smarty version Smarty-3.1.18, created on 2016-05-31 16:06:48
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendadia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:396260880574de0c82089c4-69846995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caa852301dc1ed5c085a07347fba86dffd054c47' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendadia.tpl',
      1 => 1464720125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '396260880574de0c82089c4-69846995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'diaextenso' => 0,
    'nomedodia' => 0,
    'lista_agendadia' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574de0c830d9a3_81732997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574de0c830d9a3_81732997')) {function content_574de0c830d9a3_81732997($_smarty_tpl) {?>                <div id="mostraragenda">    
                    <br>
                    <h2>Agenda do dia - <?php echo (($tmp = @$_smarty_tpl->tpl_vars['diaextenso']->value)===null||$tmp==='' ? '' : $tmp);?>
 <?php echo (($tmp = @$_smarty_tpl->tpl_vars['nomedodia']->value)===null||$tmp==='' ? '' : $tmp);?>
 </h2>
                    <br>
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Hora</th>
                            <th>Cliente</th>
                            <th>Tratamento</th>
                            <th>Observação</th>
                            <th>Celular</th>
                            <th>E-Mail</th>
                            <th>Valor</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_agendadia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsStatusAgenda'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['Hora'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCliente'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsTratamento'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsAgenda'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCelular'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsEmail'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                <td> <span style="color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlTratamento'])===null||$tmp==='' ? '0' : $tmp);?>
 </span></td> 
                                <td> 
                                    <?php if ($_smarty_tpl->tpl_vars['linha']->value['idStatusAgenda']!=6) {?> <a class="glyphicon glyphicon-ok" title ="Confirmar" onclick="dashboard.mudaragenda(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idAgenda'])===null||$tmp==='' ? '' : $tmp);?>
,'confirmar');" > Confirmar </a> |  
                                    <a class="glyphicon glyphicon-adjust" title ="Desmarcar" onclick="dashboard.mudaragenda(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idAgenda'])===null||$tmp==='' ? '' : $tmp);?>
,'desmarcar');" > D </a> |
                                    <a class="glyphicon glyphicon-pencil" title ="Remarcar" onclick="dashboard.mudaragenda(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idAgenda'])===null||$tmp==='' ? '' : $tmp);?>
,'remarcar');" > R </a> |
                                    <a class="glyphicon glyphicon-trash" title ="Cancelar" onclick="dashboard.mudaragenda(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idAgenda'])===null||$tmp==='' ? '' : $tmp);?>
,'cancelar');" > E </a> |
                                    <a class="glyphicon glyphicon-credit-card" title ="Atender" onclick="atendimento_modal.show(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idAgenda'])===null||$tmp==='' ? '' : $tmp);?>
,<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idCliente'])===null||$tmp==='' ? '' : $tmp);?>
,'<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCliente'])===null||$tmp==='' ? '' : $tmp);?>
','<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsTratamento'])===null||$tmp==='' ? '' : $tmp);?>
');"> Atender </a>  <?php }?>
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
                </div><?php }} ?>
