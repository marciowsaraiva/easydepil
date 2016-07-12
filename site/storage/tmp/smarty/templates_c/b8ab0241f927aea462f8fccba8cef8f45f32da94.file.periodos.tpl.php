<?php /* Smarty version Smarty-3.1.18, created on 2016-07-11 19:10:12
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/periodos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15685064715784194438c231-47892130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8ab0241f927aea462f8fccba8cef8f45f32da94' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/periodos.tpl',
      1 => 1464744536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15685064715784194438c231-47892130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mesextenso' => 0,
    'idAgendaHorario' => 0,
    'datainicio' => 0,
    'datafinal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_578419443d6ca1_50691498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578419443d6ca1_50691498')) {function content_578419443d6ca1_50691498($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>                <h3> &nbsp; Use as setas para mudar de mês dentro do ano - <?php echo (($tmp = @$_smarty_tpl->tpl_vars['mesextenso']->value)===null||$tmp==='' ? '' : $tmp);?>
 </h3>
                <input type="hidden" id="idAgendaHorario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['idAgendaHorario']->value)===null||$tmp==='' ? '' : $tmp);?>
"/>
                <div class="col-xs-1">          
                     <label for="Voltar"></label>                    
                     <a class="btn btn-primary" id="btnVoltar" title="Voltar" onclick="dashboard.voltar();" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['idAgendaHorario']->value)===null||$tmp==='' ? '' : $tmp)=='') {?> disabled <?php }?>  >Mês Anterior</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="Avançar"></label>                    
                     <a class="btn btn-primary" id="btnAvancar" title="Avançar" onclick="dashboard.avancar();"<?php if ((($tmp = @$_smarty_tpl->tpl_vars['idAgendaHorario']->value)===null||$tmp==='' ? '' : $tmp)=='') {?> disabled <?php }?>  >Próximo Mês</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="datainicio"></label>                    
                    <input type="text" class="form-control" name="datainicio" id="datainicio" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['datainicio']->value,'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" READONLY />           
                </div>
                <div class="col-xs-1">
                     <label for="datafinal"></label>                    
                    <input type="text" class="form-control" name="datafinal" id="datafinal" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['datafinal']->value,'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" READONLY />           
                </div>        
                <div class="col-xs-1">          
                     <label for="VerAgenda"></label>                    
                     <a class="btn btn-primary" id="btnVerAgenda" title="Ver Agenda" href="#mostraragendadodia" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['idAgendaHorario']->value)===null||$tmp==='' ? '' : $tmp)=='') {?> disabled <?php }?>  >Ver Agenda dia</a> 
                </div> 
                <div class="col-xs-1">          
                     <label for="Agendar"></label>                    
                     <a class="btn btn-primary" id="btnNovaAgenda" title="Agendar" href="#agendar" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['idAgendaHorario']->value)===null||$tmp==='' ? '' : $tmp)=='') {?> disabled <?php }?>  >Agendar Horário</a> 
                </div> <?php }} ?>
