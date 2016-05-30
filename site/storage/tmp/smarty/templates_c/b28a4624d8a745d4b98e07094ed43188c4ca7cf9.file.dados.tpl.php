<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:23:56
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroMarca/dados/dados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12906362815699717c8e4053-23845463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b28a4624d8a745d4b98e07094ed43188c4ca7cf9' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroMarca/dados/dados.tpl',
      1 => 1452527370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12906362815699717c8e4053-23845463',
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
  'unifunc' => 'content_5699717c8fd975_73076640',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5699717c8fd975_73076640')) {function content_5699717c8fd975_73076640($_smarty_tpl) {?><div class="tab-pane fade active in">

    <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value[$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? '' : $tmp);?>
"/>

    <div class="panel panel-default">    
        <div class="panel-body">
            <div class="row">   
                <div class="col-xs-3">
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
