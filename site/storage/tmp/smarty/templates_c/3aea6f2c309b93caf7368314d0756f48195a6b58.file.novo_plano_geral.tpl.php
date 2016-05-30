<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:25:15
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroPlano/novo_plano_geral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2099613538569971cb26ec97-40934510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3aea6f2c309b93caf7368314d0756f48195a6b58' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroPlano/novo_plano_geral.tpl',
      1 => 1452527370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2099613538569971cb26ec97-40934510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_operadora' => 0,
    'operadora_padrao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569971cb299bc2_01298758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569971cb299bc2_01298758')) {function content_569971cb299bc2_01298758($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><input type="hidden" id="stat" name="stat" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['stat'])===null||$tmp==='' ? '' : $tmp);?>
" />
<input type="hidden" id="id_plano" name="id_plano"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['id_plano'])===null||$tmp==='' ? '' : $tmp);?>
" />

<div class="panel panel-default">    
    <div class="panel-body">
        <div class="row">    
            <div class="col-sm-2">  
                <div class="form-group"> 
                    <label for="id_operadora">OPERADORA</label>

                    <select name="id_operadora" id="id_operadora" class="form-control obg">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_operadora']->value,'selected'=>$_smarty_tpl->tpl_vars['operadora_padrao']->value),$_smarty_tpl);?>

                    </select>
                </div>      
            </div>
            <div class="col-xs-2">    
                <div class="form-group"> 
                    <label for="des">DESCRIÇÃO DO PLANO</label>
                        <input type="text" id="des" name="des" class="form-control obg" maxlength="150" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['des'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </div>
            </div>
            <div class="col-xs-2">    
                <div class="form-group"> 
                    <label for="mensal">VALOR DO PLANO</label>
                        <input type="text" id="vl_mensal" name="vl_mensal" class="form-control"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vl_mensal'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </div>
            </div>
            <div class="col-xs-2">    
                <div class="form-group"> 
                    <label for="minutos">QTDE MIN OU TAMANHO</label>
                        <input type="text" id="qt_minutos" name="qt_minutos" class="form-control"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['qt_minutos'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </div>
            </div>
        </div>

    </div>
</div>

<?php }} ?>
