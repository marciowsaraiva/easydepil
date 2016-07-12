<?php /* Smarty version Smarty-3.1.18, created on 2016-07-11 19:11:15
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/lancardespesa/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90743221157841983d83268-02556762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14352f23ed2558441d87d23a5ed13e5583770c37' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/lancardespesa/form_novo.tpl',
      1 => 1464802621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90743221157841983d83268-02556762',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_despesa' => 0,
    'lista_fornecedor' => 0,
    'lista_formapagamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57841983e1f2c6_25524244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57841983e1f2c6_25524244')) {function content_57841983e1f2c6_25524244($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <br>
            <div class="alert alert-info" >
                <tt><h1>Lancamento de Despesas</h1></tt>
            </div> 
            <div class="row">                
                <div class="col-xs-2">
                    <a class="btn btn-primary" id="btn-gravarcabecalho" title="Clique aqui para gravar os dados da despesa"onclick="lancardespesa.gravardespesa();" >Gravar Despesa</a> 
                </div> 
                <div class="col-xs-2">
                    <a  class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair desta tela e voltar ao menu principal" href="/dashboard" > Sair da Tela </a><br>                
                </div>
            </div>    
            <br>
            <div class="row">
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="movimento">Código</label>
                        <input type="text" class="form-control" name="idFinanceiro" id="idFinanceiro" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idFinanceiro'])===null||$tmp==='' ? '' : $tmp);?>
" READONLY>           
                    </div>
                </div>                
                <div class="col-xs-1">
                    <label for="form-control">Data</label>
                    <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFinanceiro" id="dtFinanceiro" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtFinanceiro'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                </div>                         
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="despesa">Despesa</label>
                        <select class="form-control" name="idDespesa" id="idDespesa">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_despesa']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idDespesa']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="fornecedor">Fornecedor</label>
                        <select class="form-control" name="idFornecedor" id="idFornecedor">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_fornecedor']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idFornecedor']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-xs-2">
                    <label for="form-control">Observacao</label>
                    <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsObservacao'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                </div> 
                <div class="col-xs-2">
                    <label for="form-control">Valor Despesa</label>
                    <input type="text" class="form-control obg valor" name="vlFinanceiro" id="vlFinanceiro" value=""> 
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="formapagamento">Forma Pagamento</label>
                        <select class="form-control" name="idFormaPagamento" id="idFormaPagamento">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_formapagamento']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idFormaPagamento']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
            </div> 
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("lancardespesa/lista.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
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
<script src="/files/js/lancardespesa/lancardespesa.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
