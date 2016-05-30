<?php /* Smarty version Smarty-3.1.18, created on 2016-01-25 18:55:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/colaborador/grid_colaborador.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164236898456a68bb1593f16-77892978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48429bc159c8248869c40744781a5157da865d60' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/colaborador/grid_colaborador.tpl',
      1 => 1453283230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164236898456a68bb1593f16-77892978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'colaborador_lista' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56a68bb15c10b3_36620124',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a68bb15c10b3_36620124')) {function content_56a68bb15c10b3_36620124($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["data"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["data"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['colaborador_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["data"]->key => $_smarty_tpl->tpl_vars["data"]->value) {
$_smarty_tpl->tpl_vars["data"]->_loop = true;
?>
  <tr id="line_<?php echo $_smarty_tpl->tpl_vars['data']->value['idColaborador'];?>
">
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['idColaborador'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['nome'];?>
</td>    
    <td>
      <span class="link_falso" onclick="link_edita_colaborador(<?php echo $_smarty_tpl->tpl_vars['data']->value['idColaborador'];?>
)">
        <img src="/files/images/cad_edit.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span> 
      
      
      <span class="link_falso" onclick="link_exclui_colaborador(<?php echo $_smarty_tpl->tpl_vars['data']->value['idColaborador'];?>
)">
        <img src="/files/images/cad_exclui.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span> 

    </td>
  </tr>   
  <?php }
if (!$_smarty_tpl->tpl_vars["data"]->_loop) {
?>    
  <tr>
    <td>--</td>
    <td>--</td>
    <td>--</td>
  </tr>
<?php } ?>

<?php }} ?>
