<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:40:17
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/linha/linha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1174238391569cb301ac6ed7-28804403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37853245cafcb679def7d7eae0f306439775d2c4' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/linha/linha.tpl',
      1 => 1452706020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1174238391569cb301ac6ed7-28804403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_parceiro' => 0,
    'selecione_parceiro' => 0,
    'existeumfinanceiro' => 0,
    'options_linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb301b05191_14447950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb301b05191_14447950')) {function content_569cb301b05191_14447950($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><div class="panel panel-default">    
    <div class="panel-body">

        <input type="hidden" id="id_telefonia" name="id_telefonia" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['id_telefonia'])===null||$tmp==='' ? '' : $tmp);?>
"/>

        <div class="row">   
            <div class="col-xs-1">
                <div class="form-group"> 
                    <label for="obs">MOVIMENTO</label>
                    <input data-label="DATA MOVIMENTO" name="dt_movimento" type="text" class="form-control obg data" id="dt_movimento" maxlength="10"  value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dt_movimento'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
"/>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-group">
                    <label for="des">REFERENCIA </label>
                    <input type="number" id="ds_referencia" name="ds_referencia" class="form-control obg" maxlength="6" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['ds_referencia'])===null||$tmp==='' ? '' : $tmp);?>
"/>
                </div>    
            </div>      
            <div class="col-xs-2">
                <div class="form-group">
                    <label for="id_parceiro">PARCEIRO</label>                                                   
                    <select class="form-control obg" id="id_parceiro" name="id_parceiro">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_parceiro']->value,'selected'=>$_smarty_tpl->tpl_vars['selecione_parceiro']->value),$_smarty_tpl);?>

                    </select>  
                </div>
            </div>              
            <div class="col-xs-1">    
                <div class="form-group"> 
                    <label for="obs">VENCIMENTO</label>
                    <input data-label="DATA VENCIMENTO" name="dt_vencimento" type="text" class="form-control obg data" id="dt_vencimento" maxlength="10"  value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dt_vencimento'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
"/>
                </div>
            </div>
            <div class="col-xs-3">    
                <div class="form-group"> 
                    <label for="obs">OBSERVACAO</label>
                    <input type="text" class="form-control" maxlength="150" name="ds_observacao" id="ds_observacao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['ds_observacao'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <label for="vl_totaldigitado">VALOR TOTAL DIGITADO</font></label>
                    <input type="text" maxlength="9" class="form-control valor FormataMoeda" disabled="disabled" name="vl_totaldigitado" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['vl_totalmovimento'];?>
" id="vl_totaldigitado"></input>
                </div>
            </div>                     
            <div class="col-xs-2">
                <div class="form-group">
                    <label for="vl_financeiro">VALOR FINANCEIRO</font></label>
                    <input type="text" maxlength="9" class="form-control valor FormataMoeda obg" <?php if ($_smarty_tpl->tpl_vars['existeumfinanceiro']->value['temfinanceiro']=='1') {?> disabled="disabled"<?php }?>  name="vl_financeiro" id="vl_financeiro" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vl_financeiro'])===null||$tmp==='' ? '' : $tmp);?>
"></input>
                </div>
            </div>                     
        </div>
        <hr />
        <div class="row">
            <div class="col-xs-2">
                <div class="form-group">
                    <label for="id_linha">LINHA</label>
                    <select name="id_linha" id="id_linha"  onchange="dados.lerlinha();"  class="form-control obg">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options_linha']->value),$_smarty_tpl);?>

                    </select>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label  for="cd_barras_valor">CÓDIGO DE BARRAS DO VALOR</font></label>
                    <input type="text" maxlength="50" class="form-control" name="cd_barras_valor" onblur="dados.validarbarras();" id="cd_barras_valor"/>
                </div>
            </div>                                                    
            <div class="col-xs-2">
                <div class="form-group">
                    <label for="vl_totalitem">VALOR A PAGAR</font></label>
                    <input type="text" maxlength="9" class="form-control valor FormataMoeda obg"  name="vl_totalitem" id="vl_totalitem"></input>
                </div>
            </div>                     
            <div class="col-xs-2 button-m-top">
                <div class="form-group marginTopButtom">
                    <input type="button" class="btn btn-default btn-inserir form-control" <?php if ($_smarty_tpl->tpl_vars['registro']->value['id_telefonia']==false) {?> disabled="disabled" <?php }?> id="inserir_linha" onclick="linha.set();" value="INSERIR"/>
                </div>
            </div> 
            <div class="col-xs-2 button-m-top">
                <div class="form-group marginTopButtom">
                    <input type="button" class="btn btn-default btn-inserir form-control" name="enviar_financeiro" id="enviar_financeiro" <?php if ($_smarty_tpl->tpl_vars['existeumfinanceiro']->value['temfinanceiro']=='1') {?> disabled="disabled"<?php }?> onclick="linha.financeiro();" value="ENVIAR FINANCEIRO"/>  
                </div>
            </div> 

        </div>   
        <div class="row">    
            <div class="col-sm-2">    
                <div class="form-group"> 
                    <label for="obs">DEPARTAMENTO</label>
                    <input type="text" id="departamento" name="departamento" disabled = "disabled" class="form-control"/>
                </div>
            </div>
            <div class="col-sm-2">    
                <div class="form-group"> 
                    <label for="obs">COLABORADOR</label>
                    <input type="text" id="colaborador" name="colaborador" disabled = "disabled" class="form-control"/>
                </div>
            </div>
            <div class="col-sm-2">    
                <div class="form-group"> 
                    <label for="obs">FUNÇÃO</label>
                    <input type="text" id="cargo" name="cargo" disabled = "disabled" class="form-control"/>
                </div>
            </div>
        </div>         
        <hr />
                
        <div class="row"> 
            <div class="col-sm-12">
                <div id="retornoColaborador">
                    <?php echo $_smarty_tpl->getSubTemplate ("telefonia/linha/linha_grid.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/files/js/telefonia/cadastrar.js"></script>
<?php }} ?>
