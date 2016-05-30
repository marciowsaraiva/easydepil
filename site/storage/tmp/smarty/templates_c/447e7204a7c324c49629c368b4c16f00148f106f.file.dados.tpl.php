<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:24:14
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroAparelho/dados/dados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6588663095699718e0ddc27-11651187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '447e7204a7c324c49629c368b4c16f00148f106f' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroAparelho/dados/dados.tpl',
      1 => 1452524128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6588663095699718e0ddc27-11651187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5699718e0f3b32_57516963',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5699718e0f3b32_57516963')) {function content_5699718e0f3b32_57516963($_smarty_tpl) {?><div class="tab-pane fade active in">

    <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value[$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? '' : $tmp);?>
"/>

    <div class="panel panel-default">    
        <div class="panel-body">
            <div class="row">   
                <div class="col-xs-5">
                    <div class="form-group">
                        <label for="des">DESCRICAO</label>
                        <input type="text" id="des" name="des" class="form-control obg" maxlength="150" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['des'])===null||$tmp==='' ? '' : $tmp);?>
" />
                    </div>    
                </div>                
            </div>
        </div>
    </div>
</div>
<?php }} ?>
