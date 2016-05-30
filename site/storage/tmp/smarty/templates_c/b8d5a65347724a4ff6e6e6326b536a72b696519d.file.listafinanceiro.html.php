<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:55:46
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/pedido/listafinanceiro.html" */ ?>
<?php /*%%SmartyHeaderCode:15210677865741d68246b806-69500639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8d5a65347724a4ff6e6e6326b536a72b696519d' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/pedido/listafinanceiro.html',
      1 => 1455580078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15210677865741d68246b806-69500639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'financeiroitens' => 0,
    'linha' => 0,
    'total' => 0,
    'totalpedido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741d6824bfa99_86431187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741d6824bfa99_86431187')) {function content_5741d6824bfa99_86431187($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>        <!--Altere daqui pra baixo-->
        <h3>Parcelas</h3>
        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable(0, null, 0);?>            
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Parcela</th>
                    <th>Vencimento Previsto</th>
                    <th>Valor da Parcela</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['financeiroitens']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['nrParcela'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                    <td> <input type="text" disabled id="dtVencimento-<?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
" name="dtVencimento" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtVencimento'],'%d/%m/%Y'))===null||$tmp==='' ? Date('d/m/Y') : $tmp);?>
"></td> 
                    <td>R$ <input type="text" disabled id="vlParcela-<?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
" name="vlParcela" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['vlParcela'])===null||$tmp==='' ? '' : $tmp);?>
"></td> 
                    <td>
                        <a class="glyphicon glyphicon-pencil" onclick="pedido.editarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Editar</a>  |  
                        <a class="glyphicon glyphicon-floppy-disk" onclick="pedido.alterarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Gravar</a> |  
                        <a class="glyphicon glyphicon-trash" onclick="pedido.delfinanceiroitem(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
);">Excluir</a>
                    </td>
                </tr>
                <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['linha']->value['vlParcela'], null, 0);?>                                
                <?php } ?>        
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td><strong>Valor Total do Financeiro:</strong></td>
                    <td><strong>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['total']->value)===null||$tmp==='' ? '' : $tmp);?>
 </strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><strong>Valor Total Origem do Pedido:</strong></td>
                    <td><strong>R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalpedido']->value)===null||$tmp==='' ? '' : $tmp);?>
 </strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <!--Altere daqui pra cima--><?php }} ?>
