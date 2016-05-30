<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:55:46
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/pedido/financeiro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20902637285741d6823c35f2-03528541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f1362e6768c441e4cdfe4deb8ecb71ba820dbba' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/pedido/financeiro.tpl',
      1 => 1455487744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20902637285741d6823c35f2-03528541',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idPedido' => 0,
    'registrofinanceiro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741d682428722_87778434',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741d682428722_87778434')) {function content_5741d682428722_87778434($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Previsão Financeira para o Pedido de Compra Número <?php echo $_smarty_tpl->tpl_vars['idPedido']->value;?>
</h1></tt>
            </div> 
                <br>
                <div class="row">
                    <h3> &nbsp; Informações para Financeiro: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="hidden" class="form-control" name="idPedido" id="idPedido" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['idPedido']->value)===null||$tmp==='' ? '' : $tmp);?>
" >           
                            <input type="text" class="form-control" name="idFinanceiro" id="idFinanceiro" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registrofinanceiro']->value['idFinanceiro'])===null||$tmp==='' ? '' : $tmp);?>
" readonly>           
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão de Entrega</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtPrevisaoEntrega" id="dtPrevisaoEntrega" <?php if ($_smarty_tpl->tpl_vars['registrofinanceiro']->value['idFinanceiro']!='') {?> readonly <?php }?> value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registrofinanceiro']->value['dtPrevisaoEntrega'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Qtde Parcelas</label>
                        <input type="text" class="form-control" name="qtParcelas" id="qtParcelas"  <?php if ($_smarty_tpl->tpl_vars['registrofinanceiro']->value['idFinanceiro']!='') {?> readonly <?php }?> value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registrofinanceiro']->value['qtParcelas'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Primeiro vencimento</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtPrimeiroVencimento" id="dtPrimeiroVencimento"  <?php if ($_smarty_tpl->tpl_vars['registrofinanceiro']->value['idFinanceiro']!='') {?> readonly <?php }?> value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registrofinanceiro']->value['dtPrimeiroVencimento'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Observacao</label>
                        <input type="text" class="form-control" name="dsObservacao" id="dsObservacao"  <?php if ($_smarty_tpl->tpl_vars['registrofinanceiro']->value['idFinanceiro']!='') {?> readonly <?php }?> value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registrofinanceiro']->value['dsObservacao'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <br>
                    <a class="btn btn-primary" id="btn-gravarfinan" title="Clique aqui para gravar as informações das parcelas"  <?php if ($_smarty_tpl->tpl_vars['registrofinanceiro']->value['idFinanceiro']!='') {?> DISABLED <?php }?> onclick="pedido.gravarfinanceiro();"  >Gravar</a> 
                    <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar ao pedido" href="/pedido"  onclick="pedido.financeirosair();"> Sair da Tela</a><br>                
                </div> 
                <br>
            <?php echo $_smarty_tpl->getSubTemplate ("pedido/listafinanceiro.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery.price_format.1.3"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<!-- Toast Message -->
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<!-- Utils -->
<script src="/files/js/util.js"></script>
<script src="/files/js/pedido/pedido.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
