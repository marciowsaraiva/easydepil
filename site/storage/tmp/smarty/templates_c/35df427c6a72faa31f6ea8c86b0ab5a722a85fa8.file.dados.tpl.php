<?php /* Smarty version Smarty-3.1.18, created on 2016-01-16 18:04:29
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroLinha/dados/dados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2062776519569aa24de87732-23458873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35df427c6a72faa31f6ea8c86b0ab5a722a85fa8' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroLinha/dados/dados.tpl',
      1 => 1452637196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2062776519569aa24de87732-23458873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'registro' => 0,
    'lista_plano' => 0,
    'plano_padrao' => 0,
    'lista_aparelho' => 0,
    'aparelho_padrao' => 0,
    'lista_marca' => 0,
    'marca_padrao' => 0,
    'lista_modelo' => 0,
    'modelo_padrao' => 0,
    'lista_colaborador' => 0,
    'colaborador_padrao' => 0,
    'lista_departamento' => 0,
    'departamento_padrao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569aa24defccb8_65199162',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569aa24defccb8_65199162')) {function content_569aa24defccb8_65199162($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value[$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? '' : $tmp);?>
"/>
<input type="hidden" id="id_linha" name="id_linha"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['id_linha'])===null||$tmp==='' ? '' : $tmp);?>
" />

<div class="panel panel-default">    
    <div class="panel-body">
        <div class="row">    
            <div class="col-sm-2">    
                <div class="form-group"> 
                    <label for="obs">NÚMERO DA LINHA</label>
                        <input type="text" id="des" name="des" class="form-control obg" maxlength="20" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['des'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </div>
            </div>
            <div class="col-sm-1">    
                <div class="form-group"> 
                    <label for="nr_ddd">COD DE ÁREA</label>
                    <input type="text" class="form-control obg" name="nr_ddd" maxlength="3"  id="nr_ddd" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nr_ddd'])===null||$tmp==='' ? '11' : $tmp);?>
"  onkeypress="return Onlychars(event)"/>
                </div>
            </div>
            <div class="col-sm-2">  
                <div class="form-group">                     
                    <label for="id_plano">PLANO</label>
                    <select name="id_plano" id="id_plano" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_plano']->value,'selected'=>$_smarty_tpl->tpl_vars['plano_padrao']->value),$_smarty_tpl);?>

                    </select>
                </div>    
            </div>
            <div class="col-sm-2">  
                <div class="form-group">                     
                    <label for="id_aparelho">APARELHO</label>
                    <select name="id_aparelho" id="id_aparelho" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_aparelho']->value,'selected'=>$_smarty_tpl->tpl_vars['aparelho_padrao']->value),$_smarty_tpl);?>

                    </select>
                </div>    
            </div>
            <div class="col-sm-2">  
                <div class="form-group">                     
                    <label for="id_marca">MARCA</label>
                    <select name="id_marca" id="id_marca" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_marca']->value,'selected'=>$_smarty_tpl->tpl_vars['marca_padrao']->value),$_smarty_tpl);?>

                    </select>
                </div>    
            </div>
            <div class="col-sm-2">  
                <div class="form-group">                     
                    <label for="id_modelo">MODELO</label>
                    <select name="id_modelo" id="id_modelo" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_modelo']->value,'selected'=>$_smarty_tpl->tpl_vars['modelo_padrao']->value),$_smarty_tpl);?>

                    </select>
                </div>    
            </div>
        </div>
                    
        <div class="row">    
            <div class="col-sm-3">  
                <div class="form-group">                     
                    <label for="colaborador">COLABORADOR</label>
                    <select name="id_colaborador" id="id_colaborador" onchange="cadastrar.lercargo();" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaborador']->value,'selected'=>$_smarty_tpl->tpl_vars['colaborador_padrao']->value),$_smarty_tpl);?>

                    </select>
                </div>    
            </div>
            <div class="col-sm-3">  
                <div class="form-group">                     
                    <label for="id_departamento">DEPARTAMENTO</label>
                    <select name="id_departamento" id="id_departamento" class="form-control">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_departamento']->value,'selected'=>$_smarty_tpl->tpl_vars['departamento_padrao']->value),$_smarty_tpl);?>

                    </select>
                </div>    
            </div>
            <div class="col-sm-3">    
                <div class="form-group"> 
                    <label for="obs">CARGO</label>
                    <input type="text" id="ds_cargo" name="ds_cargo" disabled = "disabled" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['cargo'])===null||$tmp==='' ? '' : $tmp);?>
"/>
                    <input type="hidden" id="id_cargo" name="id_cargo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['id_funcao'])===null||$tmp==='' ? '' : $tmp);?>
"/>
                </div>
            </div>
            <div class="col-sm-2">    
                <div class="form-group"> 
                    <label for="dt_ultimomovimento">DATA DA ULTIMA CONTA</label>
                        <input type="text" id="dt_ultimomovimento" name="dt_ultimomovimento" disabled="disabled" class="form-control" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dt_ultimomovimento'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
"/>
                </div>
            </div>
        </div>                
                    
        <div class="row">    
            <div class="col-sm-9">    
                <div class="form-group"> 
                    <label for="obs">OBSERVAÇÕES:</label>
                    <input type="text" class="form-control" name="observacoes" maxlength="255"  id="observacoes" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['observacoes'])===null||$tmp==='' ? '' : $tmp);?>
" onkeypress="return Onlychars(event)"/>
                </div>
            </div>                
            <div class="col-sm-2">    
                <div class="form-group"> 
                    <label for="vl_ultimomovimento">VALOR ULTIMA CONTA</label>
                    <input type="text" class="form-control" name="vl_ultimomovimento"  disabled="disabled"  id="vl_ultimomovimento" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vl_ultimomovimento'])===null||$tmp==='' ? '0' : $tmp);?>
"/>
                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>
