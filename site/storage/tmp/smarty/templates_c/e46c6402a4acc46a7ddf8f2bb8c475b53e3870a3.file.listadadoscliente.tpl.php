<?php /* Smarty version Smarty-3.1.18, created on 2016-07-11 19:10:12
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/listadadoscliente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:771602735784194466b9f9-77769259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e46c6402a4acc46a7ddf8f2bb8c475b53e3870a3' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/listadadoscliente.tpl',
      1 => 1464746349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '771602735784194466b9f9-77769259',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nomedocliente' => 0,
    'lista_dadoscliente' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57841944705661_97341609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57841944705661_97341609')) {function content_57841944705661_97341609($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>                <br>
                <div id="mostradadoscliente">  
                    <div class="col-xs-10">          
                        <h2>Agenda do Cliente <?php echo (($tmp = @$_smarty_tpl->tpl_vars['nomedocliente']->value)===null||$tmp==='' ? '' : $tmp);?>
 </h2>
                         <label for="voltaraotopo"></label>                    
                         <a class="btn btn-primary" id="btnTopo" title="Voltar ao topo" href="#topo">Voltar ao Topo</a> 
                    </div> 
                    <div class="col-xs-12">          
                        <table class="table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Data/Hora</th>
                                <th>Hora</th>
                                <th>Tratamento</th>
                                <th>Observação</th>
                                <th>Celular</th>
                                <th>E-Mail</th>
                                <th>Valor Pago</th>
                                <th>Pago em</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_dadoscliente']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                                <tr>
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsStatusAgenda'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtAgenda'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['Hora'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsTratamento'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsAgenda'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCelular'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsEmail'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlFinanceiro'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                    <td> <span style="color: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCor'])===null||$tmp==='' ? '#000000' : $tmp);?>
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsFormaPagamento'])===null||$tmp==='' ? '' : $tmp);?>
 </span></td> 
                                </tr>
                            <?php } ?>        
                        </tbody>
                        </table>
                    </div>
                </div><?php }} ?>
