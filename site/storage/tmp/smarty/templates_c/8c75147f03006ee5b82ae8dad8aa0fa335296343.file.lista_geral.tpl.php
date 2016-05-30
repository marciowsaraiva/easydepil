<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:40:24
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista_geral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1740829392569cb308031c92-20913928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c75147f03006ee5b82ae8dad8aa0fa335296343' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista_geral.tpl',
      1 => 1452816552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1740829392569cb308031c92-20913928',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
    'registro' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb308063a04_42323128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb308063a04_42323128')) {function content_569cb308063a04_42323128($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
                <h1 style="margin-top: 0"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>            
        </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-xs-12">
                        <p><small>Impresso por: <?php echo $_SESSION['user']['nome'];?>
 - em: <?php echo date('d/m/Y H:i:s');?>
</small></p>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td><strong>REFERENCIA DO MOVIMENTO </strong></td>
                                        <td><strong>DATA DA DIGITAÇÃO </strong></td>
                                        <td><strong>DATA DO MOVIMENTO </strong></td>
                                        <td><strong>OBSERVAÇÃO </strong></td>
                                        <td align=right ><strong>VALOR TOTAL </strong></td>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['ds_referencia'];?>
</td>
                                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dt_movimento'],'%d/%m/%Y');?>
</td>
                                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dt_vencimento'],'%d/%m/%Y');?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['des'];?>
</td>
                                            <td align=right >R$ <?php echo $_smarty_tpl->tpl_vars['linha']->value['vl_totalmovimento'];?>
</td>
                                            <td></td>
                                        </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                        <tr><td colspan="6">Nenhum registro encontrado</td></tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    <?php }} ?>
