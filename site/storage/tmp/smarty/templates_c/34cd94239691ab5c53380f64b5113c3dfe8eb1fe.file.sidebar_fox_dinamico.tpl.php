<?php /* Smarty version Smarty-3.1.18, created on 2016-01-11 15:57:19
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/comuns/sidebar_fox_dinamico.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15476915265693ecff8bcdb1-79556317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34cd94239691ab5c53380f64b5113c3dfe8eb1fe' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/comuns/sidebar_fox_dinamico.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15476915265693ecff8bcdb1-79556317',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dados_pai' => 0,
    'menu_pai' => 0,
    'dados_filho' => 0,
    'menu_filho' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5693ecff8ecfa7_90785683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5693ecff8ecfa7_90785683')) {function content_5693ecff8ecfa7_90785683($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["menu_pai"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu_pai"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_pai']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["menu_pai"]->key => $_smarty_tpl->tpl_vars["menu_pai"]->value) {
$_smarty_tpl->tpl_vars["menu_pai"]->_loop = true;
?>  
    <!--<ul class="nav navbar-nav side-nav"> -->
        <li class="dropdown">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu_pai']->value['link'];?>
" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> <?php echo $_smarty_tpl->tpl_vars['menu_pai']->value['descricao'];?>
<b class="caret"></b></a></li>    
        <ul class="dropdown-menu">            
              <?php  $_smarty_tpl->tpl_vars["menu_filho"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu_filho"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_filho']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["menu_filho"]->key => $_smarty_tpl->tpl_vars["menu_filho"]->value) {
$_smarty_tpl->tpl_vars["menu_filho"]->_loop = true;
?> 
                <?php if (($_smarty_tpl->tpl_vars['menu_filho']->value['id_pai']==$_smarty_tpl->tpl_vars['menu_pai']->value['id'])) {?>                
                    <li>                       
                        <a href="<?php echo $_smarty_tpl->tpl_vars['menu_filho']->value['link'];?>
"><i class="fa fa-bar-chart-o"></i><?php echo $_smarty_tpl->tpl_vars['menu_filho']->value['descricao'];?>
</a>
                    </li>
                <?php }?>
            <?php } ?> 
          
        </ul>
        </li>
        <!-- /.nav-second-level -->  
    <!--</ul> -->     
<?php } ?><?php }} ?>
