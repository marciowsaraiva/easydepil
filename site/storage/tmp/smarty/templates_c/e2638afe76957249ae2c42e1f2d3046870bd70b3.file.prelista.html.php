<?php /* Smarty version Smarty-3.1.18, created on 2016-03-08 18:22:01
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/os/prelista.html" */ ?>
<?php /*%%SmartyHeaderCode:99276433956df427903ed66-00787046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2638afe76957249ae2c42e1f2d3046870bd70b3' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/os/prelista.html',
      1 => 1457469769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99276433956df427903ed66-00787046',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscapedido' => 0,
    'pedidos' => 0,
    'linha' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56df4279137f46_13245249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56df4279137f46_13245249')) {function content_56df4279137f46_13245249($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 
    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>
    <div id="page-wrapper">
        <hr>
        <!--Altere daqui pra baixo-->
        <h1>Lista de Pedidos</h1>
        <hr>        
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-pedido" action="/pedido/busca_pedido" method="POST" enctype="multipart/form-data">
                    Número do Pedido:
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscapedido" name="buscapedido" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscapedido']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                            <br>
                            <br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>
        <br>
        <a class="btn btn-primary" href="/pedido/novo_pedido"> Novo Pedido</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Sequencia</th>
                    <th>Numero do Pedido</th>
                    <th>Data do Pedido</th>
                    <th>Fornecedor</th>
                    <th>Situção</th>
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
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtPedido'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsFornecedor'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php if ($_smarty_tpl->tpl_vars['linha']->value['stSituacao']==1) {?> Aberto <?php }?></td> 
                    <td>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlTotalPedido'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>
                        <a class="glyphicon glyphicon-pencil" href="/pedido/novo_pedido/idPedido/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPedido'];?>
"> Editar</a>  |  
                        <a class="glyphicon glyphicon-check" href="/pedido/baixamanual/idPedido/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPedido'];?>
">  Baixa Manual</a>  |
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
                    <td><strong>Total:</strong></td>
                    <td></td>
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
