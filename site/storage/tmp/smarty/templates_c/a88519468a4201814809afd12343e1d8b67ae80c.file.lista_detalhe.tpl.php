<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:43:35
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista_detalhe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1630219282569cb3c7ec9c84-72100195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a88519468a4201814809afd12343e1d8b67ae80c' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista_detalhe.tpl',
      1 => 1452975410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1630219282569cb3c7ec9c84-72100195',
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
  'unifunc' => 'content_569cb3c7f0c4b4_91428090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb3c7f0c4b4_91428090')) {function content_569cb3c7f0c4b4_91428090($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
                <h1 style="margin-top: 0"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>            
        </div>
        <div class="panel-body">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-xs-12">
                    <p><strong><small>Impresso por: <?php echo $_SESSION['user']['nome'];?>
 - em: <?php echo date('d/m/Y H:i:s');?>
 | Referencia : <?php echo mb_strtoupper($_SESSION['referencia']['dadosdareferencia'], 'UTF-8');?>
</small> </strong></p>
                </div> 
            </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td><strong>LINHA</strong></td>
                                        <td><strong>COLABORADOR</strong></td>
                                        <td><strong>DEPARTAMENTO</strong></td>
                                        <td><strong>FUNCAO</strong></td>
                                        <td  align=right ><strong>VALOR A PAGAR</strong></td>
                                        <td></td>
                                        <td><strong>FINANCEIRO</strong></td>
                                        <td><strong>CODIGO DE BARRAS</strong></td> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['linha'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['colaborador'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['departamento'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['funcao'];?>
</td>
                                            <td  align=right >R$ <?php echo $_smarty_tpl->tpl_vars['linha']->value['vl_totalitem'];?>
</td>
                                            <td></td>
                                            <td><?php if ($_smarty_tpl->tpl_vars['linha']->value['stFinanceiro']==1) {?>------SIM------<?php } else { ?>------NAO-----<?php }?> </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['cd_barras_valor'];?>
</td>
                                        </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                        <tr><td colspan="6">Nenhum registro encontrado</td></tr>
                                    <?php } ?>
                                </tbody>
                                <tr> 
                                    <td><strong> Valor total: </strong></td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td align=right > <strong> R$ <?php echo $_SESSION['total']['valortotal'];?>
 </strong></td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    
                                </tr>                                
                            </table>
                        </div>
                    </div>

                </div>
                </div>
        </div>
<script type="text/javascript" src="/files/js/tiCadastroLinha/cadastrar.js"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/util.js" type="text/javascript"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js" type="text/javascript"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>                                    
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    <?php }} ?>
