<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 09:34:24
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/fases.html" */ ?>
<?php /*%%SmartyHeaderCode:9900025856efea50f157f8-99042469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450ab63d54c7c74f72f6bf289f336ad9fc3340f7' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/fases.html',
      1 => 1456335016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9900025856efea50f157f8-99042469',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_fase' => 0,
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56efea50f23608_35526713',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56efea50f23608_35526713')) {function content_56efea50f23608_35526713($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?>                            <label for="nomefase">Fase</label>
                            <select class="form-control" name="idFase" id="idFase">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_fase']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idFase']),$_smarty_tpl);?>

                            </select>                      
<?php }} ?>
