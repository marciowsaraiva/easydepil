<?php /* Smarty version Smarty-3.1.18, created on 2016-07-11 19:10:12
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendageral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1885221382578419445db4e8-44216090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcc36685e093ce8a21ecd0817fabebd75ab9b52d' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/agendageral.tpl',
      1 => 1464744646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1885221382578419445db4e8-44216090',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nometipoagenda' => 0,
    'lista_agendageral' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_578419446677a2_10036350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578419446677a2_10036350')) {function content_578419446677a2_10036350($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>                    <div id="mostraragendageral">
                        <div class="col-xs-10">          
                            <h2>Agendamento previsto a partir de hoje <?php echo (($tmp = @$_smarty_tpl->tpl_vars['nometipoagenda']->value)===null||$tmp==='' ? '' : $tmp);?>
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
                                <th>Cliente</th>
                                <th>Tratamento</th>
                                <th>Observação</th>
                                <th>Celular</th>
                                <th>E-Mail</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_agendageral']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCliente'])===null||$tmp==='' ? '' : $tmp);?>
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
">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlTratamento'])===null||$tmp==='' ? '0' : $tmp);?>
 </span></td> 
                                </tr>
                            <?php } ?>        
                        </tbody>
                        </table>
                        </div>
                    </div>
<?php }} ?>
