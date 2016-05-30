<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:52:19
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/entradaestoque/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203759703357238333b44f53-60222645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b427f919c0937a240ea75f8215a21fbcb23f13f' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/entradaestoque/form_novo.tpl',
      1 => 1455446799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203759703357238333b44f53-60222645',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_tipomovimento' => 0,
    'lista_fornecedor' => 0,
    'lista_insumo' => 0,
    'lista_localestoque' => 0,
    'lista_centrocusto' => 0,
    'lista_maquina' => 0,
    'lista_os' => 0,
    'lista_motivo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57238333c0d7e5_79043621',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238333c0d7e5_79043621')) {function content_57238333c0d7e5_79043621($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <br>
            <div class="alert alert-info" >
                <tt><h1>Movimentação do Estoque - Entrada</h1></tt>
            </div> 
            <div class="row">                
                <div class="col-xs-1">
                    <a class="btn btn-primary" id="btn-novaentrada" title="Clique aqui para iniciar a digitação de uma nova entrada de estoque" onclick="entradaestoque.novaentrada();">Nova Entrada</a> 
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-primary" id="btn-gravarcabecalho" title="Clique aqui para gravar o cabeçalho da Entrada de Estoque"onclick="entradaestoque.gravarcabecalho();" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']!='') {?>  disabled <?php }?>  >Gravar Cabeçalho</a> 
                </div> 
                <div class="col-xs-2">
                    <a  class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair desta tela e voltar ao menu principal" href="/dashboard"  onclick="entradaestoque.desabilitaid();"> Sair da Tela </a><br>                
                </div>
                
            </div>    
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="movimento">Código</label>
                            <input type="text" class="form-control" name="idMovimento" id="idMovimento" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idMovimento'])===null||$tmp==='' ? '' : $tmp);?>
" READONLY>           
                        </div>
                    </div>                     
                        <div class="col-xs-2">
                        <div class="form-group">
                            <label for="tipomovimento">Tipo de Movimento</label>
                            <select class="form-control" name="idTipoMovimento" id="idTipoMovimento">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipomovimento']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoMovimento']),$_smarty_tpl);?>

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
                    <div class="col-xs-3">
                        <label for="form-control">Observacao</label>
                        <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsObservacao'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Data</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtMovimento" id="dtMovimento" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtMovimento'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Nota</label>
                        <input type="text" class="form-control" name="nrNota" id="nrNota" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrNota'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Pedido</label>
                        <input type="text" class="form-control" name="nrPedido" id="nrPedido" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrPedido'])===null||$tmp==='' ? '' : $tmp);?>
 " >            
                    </div> 
                    <hr>
                    <div class="col-xs-1">
                      <div class="row">
                          <a class="btn btn-primary" id="btn-lerdadospedido" title="Clique aqui para ler dados do pedido e baixa-lo automaticamente" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  enabled <?php }?>  onclick="entradaestoque.lerpedido();">Ler Pedido </a> 
                      </div> 
                    </div> 
                    
                </div> 
                <br>
                <div class="row" >
                    <h3> &nbsp; Insumos para esta Entrada:</h3>
                    <br>
                    <input type="hidden" class="form-control" id="idMovimentoItem" name="idMovimentoItem" readonly>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="insumo">Insumo/Produto </label>
                            <select class="form-control" name="idInsumo" id="idInsumo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled  <?php }?> onchange="entradaestoque.lerunidade();"> 
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_insumo']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <label for="form-control">Unidade</label>
                        <input type="text" class="form-control" name="dsUnidade" id="dsUnidade" disabled='disabled' value="">       
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Estoque</label>
                        <input type="text" class="form-control" name="qtEstoque" id="qtEstoque" disabled='disabled' value="">       
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Quantidade</label>
                        
                        <input type="text" class="form-control obg valor" name="qtMovimento" id="qtMovimento" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled  <?php }?> value="">      
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Valor Total</label>
                        <input type="text" class="form-control obg valor" name="vlMovimento" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?> id="vlMovimento" value=""> 
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Observação</label>
                        <input type="text" class="form-control" name="dsObservacaoItem" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?> id="dsObservacaoItem" value=""> 
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="localestoque">Local para Estoque </label>
                            <select class="form-control" name="idLocalEstoque" id="idLocalEstoque" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled  <?php }?>"> 
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_localestoque']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-1">
                      <div class="row">
                          <a class="btn btn-primary" id="btn-adicionaitem" title="adicionaitem" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?>  onclick="entradaestoque.gravaritem();">Adiciona Item</a> 
                      </div> 
                    </div> 
                </div>
                <div class="row" >
                    <h3> &nbsp; Aplicação Direta (Caso escolha uma das opçoes abaixo, o sistema vai gerar uma saída de estoque):</h3>
                    <br>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="centrocusto">Centro de Custo </label>
                            <select class="form-control" name="idCentroCusto" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?> id="idCentroCusto">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_centrocusto']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="maquina">Maquina </label>
                            <select class="form-control" name="idMaquina" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?> id="idMaquina">  
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquina']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="ordemservico">Ordem de Serviço </label>
                            <select class="form-control" name="idOS" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?> id="idOS"> 
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_os']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="motivo">Motivo para O.S. </label>
                            <select class="form-control" name="idMotivo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?> disabled <?php }?>  id="idMotivo">  
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_motivo']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                </div>
                <br>
            <?php echo $_smarty_tpl->getSubTemplate ("entradaestoque/lista.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
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
<script src="/files/js/entradaestoque/entradaestoque.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
