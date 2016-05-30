<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:55:49
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/pedido/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:9511086855741d6852c2084-58713090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c54ca9fb734cb0cf1c7a1bb9951eae3e9df81932' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/pedido/lista.html',
      1 => 1454802116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9511086855741d6852c2084-58713090',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pedidoitens' => 0,
    'linha' => 0,
    'totalpedido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741d685303c78_83331579',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741d685303c78_83331579')) {function content_5741d685303c78_83331579($_smarty_tpl) {?>        <!--Altere daqui pra baixo-->
        <h3>Lista de insumos digitados neste pedido:</h3>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Sequencia</th>
                    <th>Código</th>
                    <th>Nome do Insumo</th>
                    <th>Grupo</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Valor Total</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pedidoitens']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idPedidoItem'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idInsumo'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsInsumo'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsGrupo'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['qtPedido'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlUnitario'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlPedido'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>
                        <a class="glyphicon glyphicon-trash" onclick="pedido.delpedidoitem(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPedidoItem'];?>
);">  Excluir</a>
                    </td>
                </tr>
                <?php } ?>        
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Valor Total deste Pedido:</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalpedido']->value)===null||$tmp==='' ? '' : $tmp);?>
 </strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <!--Altere daqui pra cima-->
<?php }} ?>
