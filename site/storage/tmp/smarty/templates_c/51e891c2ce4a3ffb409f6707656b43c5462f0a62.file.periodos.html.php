<?php /* Smarty version Smarty-3.1.18, created on 2016-05-28 10:31:37
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/periodos.html" */ ?>
<?php /*%%SmartyHeaderCode:186436765257499db9ac42d7-81990775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51e891c2ce4a3ffb409f6707656b43c5462f0a62' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/periodos.html',
      1 => 1464441500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186436765257499db9ac42d7-81990775',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'valores' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57499db9af88e4_53727748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57499db9af88e4_53727748')) {function content_57499db9af88e4_53727748($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>                <div class="col-xs-1">
                     <label for="Voltar"></label>                    
                     <a class="btn btn-primary" id="btnVoltar" title="Voltar" href="/dashboard/voltar/idAgendaHorario/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'])===null||$tmp==='' ? '' : $tmp);?>
/dtInicio/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['valores']->value['datainicio'])===null||$tmp==='' ? '' : $tmp);?>
/dtFim/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['valores']->value['datafinal'])===null||$tmp==='' ? '' : $tmp);?>
" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'])===null||$tmp==='' ? '' : $tmp)=='') {?> disabled <?php }?>  >Mês Anterior</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="Avançar"></label>                    
                     <a class="btn btn-primary" id="btnAvancar" title="Avançar" href="/dashboard/avancar/idAgendaHorario/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'])===null||$tmp==='' ? '' : $tmp);?>
/dtInicio/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['valores']->value['datainicio'])===null||$tmp==='' ? '' : $tmp);?>
/dtFim/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['valores']->value['datafinal'])===null||$tmp==='' ? '' : $tmp);?>
" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'])===null||$tmp==='' ? '' : $tmp)=='') {?> disabled <?php }?>  >Próximo Mês</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="datainicio"></label>                    
                    <input type="text" class="form-control" name="datainicio" id="datainicio" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['valores']->value['datainicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" READONLY />           
                </div>
                <div class="col-xs-1">
                     <label for="datafinal"></label>                    
                    <input type="text" class="form-control" name="datafinal" id="datafinal" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['valores']->value['datafinal'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" READONLY />           
                </div>                        <?php }} ?>
