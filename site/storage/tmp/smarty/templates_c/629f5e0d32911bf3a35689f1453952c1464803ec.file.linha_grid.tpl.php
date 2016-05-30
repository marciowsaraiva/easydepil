<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:40:17
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/linha/linha_grid.tpl" */ ?>
<?php /*%%SmartyHeaderCode:509117510569cb301b08391-87984610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '629f5e0d32911bf3a35689f1453952c1464803ec' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/linha/linha_grid.tpl',
      1 => 1452527370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '509117510569cb301b08391-87984610',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_linha' => 0,
    'totalvalor' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb301b43658_23146400',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb301b43658_23146400')) {function content_569cb301b43658_23146400($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/modifier.replace.php';
?>                    <input type="hidden" id="totalvalor" name="totalvalor" value="0"/>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>LINHA</th>
                                <th class="col-xs-2">DEPARTAMENTO</th>
                                <th class="col-xs-2">COLABORADOR</th>
                                <th>FUNÇÃO</th>
                                <th>CÓDIGO DE BARRAS DO VALOR</th>
                                <th class="text-right">VALOR A PAGAR</th>
                                <th></th>
                                <th class="text-center">FINANCEIRO</th>
                                <th class="text-center">ACAO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $_smarty_tpl->tpl_vars['totalvalor'] = new Smarty_variable(0, null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_linha']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['totalvalor'] = new Smarty_variable($_smarty_tpl->tpl_vars['totalvalor']->value+$_smarty_tpl->tpl_vars['linha']->value['vl_totalitem'], null, 0);?> 
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nrlinha'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['departamento'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['colaborador'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['funcao'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['cd_barras_valor'];?>
</td>
                                    <td class="text-right">R$ <?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_totalitem'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                    <td></td>
                                    <td align="center"><?php if ($_smarty_tpl->tpl_vars['linha']->value['stFinanceiro']==0) {?>Não<?php } else { ?>Sim <?php }?> </td>
                                    <td class="text-center">
                                        <a class="btn btn-default btn-excluir btn-mini" title="EXCLUIR" onclick="linha.del('<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_linha'];?>
');">E</a> 
                                    </td>
                                </tr>
                            <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                <tr><td colspan="100%">NENHUM REGISTRO CADASTRADO.</td></tr>
                            <?php } ?>
                        </tbody>
                        <tr>
                            <th></th>
                            <th>TOTAL DOS VALORES A PAGAR:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right">R$ <?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['totalvalor']->value,".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>    
<?php }} ?>
