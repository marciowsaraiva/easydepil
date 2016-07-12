<?php /* Smarty version Smarty-3.1.18, created on 2016-07-11 19:00:30
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/fluxocaixa/fluxocaixa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1018534377578416fe405c80-08865339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7b4f63f948aef1bf03526ead09ea9eec5be8317' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/fluxocaixa/fluxocaixa.tpl',
      1 => 1465151140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1018534377578416fe405c80-08865339',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dtDe' => 0,
    'dtAte' => 0,
    'lista_despesa' => 0,
    'idDespesa' => 0,
    'lista_receita' => 0,
    'idReceita' => 0,
    'lista_fornecedor' => 0,
    'idFornecedor' => 0,
    'lista_cliente' => 0,
    'registro' => 0,
    'dsObservacao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_578416fe49fc00_30113664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578416fe49fc00_30113664')) {function content_578416fe49fc00_30113664($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
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
                <tt><h1>Fluxo de Caixa</h1></tt>
            </div> 
            <div class="row" >                
                <div class="col-xs-2">
                    <a  class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair desta tela e voltar ao menu principal" href="/dashboard" > Sair da Tela </a><br>                
                </div>
            </div>    
            <br>
            <div class="row col-lg-12">
                <h3> Dados para o filtro</h3>
            </div>
            <br>
            <div class="row" for="form-control">
                <div class="col-lg-1">
                    <label for="form-control">De</label>
                    <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtDe" id="dtDe" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['dtDe']->value,'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                </div>                         
                <div class="col-lg-1">
                    <label for="form-control">Até</label>
                    <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtAte" id="dtAte" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['dtAte']->value,'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                </div>                         
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="despesa">Despesas</label>
                        <select class="form-control" name="idDespesa" id="idDespesa">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_despesa']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['idDespesa']->value)===null||$tmp==='' ? '' : $tmp)),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="receita">Receitas</label>
                        <select class="form-control" name="idReceita" id="idReceita">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_receita']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['idReceita']->value)===null||$tmp==='' ? '' : $tmp)),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="fornecedor">Fornecedor</label>
                        <select class="form-control" name="idFornecedor" id="idFornecedor">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_fornecedor']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['idFornecedor']->value)===null||$tmp==='' ? '' : $tmp)),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control" name="idCliente" id="idCliente">
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_cliente']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idCliente'])===null||$tmp==='' ? '' : $tmp)),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <label for="form-control">Observacao</label>
                    <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['dsObservacao']->value)===null||$tmp==='' ? '' : $tmp);?>
" >           
                </div> 
            </div>    
            <br>
            <div class="row" >                
                <div class="col-xs-2">
                    <a  class="btn btn-primary" id="btn-executar" title="Clique aqui para mostrar as informações" onclick="fluxocaixa.mostrar();" > Executar </a><br>                
                </div>
            </div>                
            <br>
            <div class="row col-lg-12">
                <?php echo $_smarty_tpl->getSubTemplate ("fluxocaixa/lista.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>            
        </div>
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
<script src="/files/js/fluxocaixa/fluxocaixa.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
