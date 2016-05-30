<?php /* Smarty version Smarty-3.1.18, created on 2016-01-21 19:13:31
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/statusos/dados/dados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172743671356a149fbacc009-10996554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbefa582860c9fc68c1de9821e12f9c82dce1352' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/statusos/dados/dados.tpl',
      1 => 1453410336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172743671356a149fbacc009-10996554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idStatusOS' => 0,
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56a149fbae0d87_69689618',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a149fbae0d87_69689618')) {function content_56a149fbae0d87_69689618($_smarty_tpl) {?><div class="tab-pane fade active in">

    <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['idStatusOS']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['idStatusOS']->value;?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value[$_smarty_tpl->tpl_vars['idStatusOS']->value])===null||$tmp==='' ? '' : $tmp);?>
"/>

    <div class="panel panel-default">    
        <div class="panel-body">
            <div class="row">   
                <div class="col-xs-5">
                    <div class="form-group">
                        <label for="dsStatusOS">DESCRICAO</label>
                        <input type="text" id="dsStatusOS" name="dsStatusOS" class="form-control obg" maxlength="150" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsStatusOS'])===null||$tmp==='' ? '' : $tmp);?>
" />
                    </div>    
                </div>                
            </div>
        </div>
    </div>
</div>
<?php }} ?>
