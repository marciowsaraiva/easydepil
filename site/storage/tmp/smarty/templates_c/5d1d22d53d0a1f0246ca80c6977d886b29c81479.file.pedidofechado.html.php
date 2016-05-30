<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:50:37
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/pedido/pedidofechado.html" */ ?>
<?php /*%%SmartyHeaderCode:1175858054572382cda7f827-10926278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d1d22d53d0a1f0246ca80c6977d886b29c81479' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/pedido/pedidofechado.html',
      1 => 1455309075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1175858054572382cda7f827-10926278',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pedidos' => 0,
    'linha' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572382cdb30694_63329526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572382cdb30694_63329526')) {function content_572382cdb30694_63329526($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>    
    <div id="page-wrapper">
        <hr>
        <!--Altere daqui pra baixo-->
        <h1>Lista de Pedidos Fechados</h1>
        <hr>        
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Sequencia</th>
                    <th>Numero do Pedido</th>
                    <th>Nota Fiscal</th>
                    <th>Data do Pedido</th>
                    <th>Fornecedor</th>
                    <th>Data Baixa</th>
                    <th>Usuario Baixa</th>
                    <th>Situação</th>
                    <th>origem</th>
                    <th>Valor Total</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pedidos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['idPedido'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['nrPedido'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['nrNota'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtPedido'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsFornecedor'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtBaixa'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsUsuario'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php if ($_smarty_tpl->tpl_vars['linha']->value['stSituacao']==2) {?> Fechado <?php }?></td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsOrigemInformacao'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlTotalPedido'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>
                        <a class="glyphicon glyphicon-trash" href="/pedido/delpedido/idPedido/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPedido'];?>
">  Excluir</a></td>
                </tr>
                <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['linha']->value['vlTotalPedido'], null, 0);?>                
                <?php } ?>        
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total:</strong></td>
                    <td><strong>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['total']->value)===null||$tmp==='' ? '' : $tmp);?>
 </strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <!--Altere daqui pra cima-->
    </div>
</div>
<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
<?php }} ?>
