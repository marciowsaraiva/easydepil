<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:42:41
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/comuns/lista_padrao.html" */ ?>
<?php /*%%SmartyHeaderCode:170090981856967071868033-20374153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0aa94efef98eaf61ce1ee0046d159858b74fb94' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/comuns/lista_padrao.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170090981856967071868033-20374153',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56967071875c36_34842951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56967071875c36_34842951')) {function content_56967071875c36_34842951($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['selected']->value)===null||$tmp==='' ? null : $tmp)),$_smarty_tpl);?>
<?php }} ?>
