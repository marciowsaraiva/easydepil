<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:23:41
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroModelo/novo_modelo_geral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10622373665699716d57a394-56344316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81878b61d169021702e62987395d3fb82f96e4c2' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroModelo/novo_modelo_geral.tpl',
      1 => 1452527370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10622373665699716d57a394-56344316',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5699716d58ea46_54370340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5699716d58ea46_54370340')) {function content_5699716d58ea46_54370340($_smarty_tpl) {?><input type="hidden" id="stat" name="stat" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['stat'])===null||$tmp==='' ? '' : $tmp);?>
" />
<input type="hidden" id="id_modelo" name="id_modelo"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['id_modelo'])===null||$tmp==='' ? '' : $tmp);?>
" />

<div class="panel panel-default">    
    <div class="panel-body">
        <div class="row">    
            
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="des">DESCRICAO DO MODELO</label>
                    <input type="text" id="des" name="des" class="form-control obg" maxlength="150" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['des'])===null||$tmp==='' ? '' : $tmp);?>
" />
                </div>    
            </div>
        </div>
    </div>
</div>

<?php }} ?>
