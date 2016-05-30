<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:53:11
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/saidaestoque/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140010236057238367a8d3e7-66093611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c1b61b21da8e4e304418aae0ebec6b59fac34b0' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/saidaestoque/form_novo.tpl',
      1 => 1454802336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140010236057238367a8d3e7-66093611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_tipomovimento' => 0,
    'lista_cliente' => 0,
    'lista_insumo' => 0,
    'lista_centrocusto' => 0,
    'lista_maquina' => 0,
    'lista_os' => 0,
    'lista_motivo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57238367b18261_38857470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238367b18261_38857470')) {function content_57238367b18261_38857470($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Movimentação do Estoque - Saída</h1></tt>
            </div> 
            <div class="row">                
                <div class="col-xs-1">
                    <a class="btn btn-primary" id="btn-novasaida" title="Clique aqui para iniciar a digitação de uma nova saída de estoque" onclick="saidaestoque.novasaida();">Nova Saida</a> 
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-primary" id="btn-gravarcabecalho" title="Clique aqui para gravar o cabeçalho da Saída de Estoque"onclick="entradaestoque.gravarcabecalho();" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']!='') {?>  disabled <?php }?>  >Gravar Cabeçalho</a> 
                </div> 
                <div class="col-xs-2">
                    <a  class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair desta tela e voltar ao menu principal" href="/dashboard"  onclick="saidaestoque.desabilitaid();"> Sair da Tela </a><br>                
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
                            <label for="cliente">Cliente</label>
                            <select class="form-control" name="idCliente" id="idCliente">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_cliente']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idCliente']),$_smarty_tpl);?>

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
                        <label for="form-control">Número Nota</label>
                        <input type="text" class="form-control" name="nrNota" id="nrNota" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrNota'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Número Pedido</label>
                        <input type="text" class="form-control" name="nrPedido" id="nrPedido" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrPedido'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                </div> 
                <br>
                <div class="row" >
                    <h3> &nbsp; Insumos para esta Saída:</h3>
                    <br>
                    <div class="col-md-10">
                         <input type="hidden" class="form-control" id="idMovimentoItem" name="idMovimentoItem" readonly>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="insumo">Insumo/Produto </label>
                            <select class="form-control" name="idInsumo" id="idInsumo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled  <?php }?> onchange="saidaestoque.lerunidade();"> 
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
                        
                        <input type="text" class="form-control obg valor" name="qtMovimento" id="qtMovimento" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled  <?php }?> onchange="saidaestoque.calcularqtde();" value="">      
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Valor Total</label>
                        <input type="hidden" class="form-control" name="vlUltimaCompra"  id="vlUltimaCompra" value=""> 
                        <input type="text" class="form-control obg valor" name="vlMovimento" disabled  id="vlMovimento" value=""> 
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Observação</label>
                        <input type="text" class="form-control" name="dsObservacaoItem" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?> id="dsObservacaoItem" value=""> 
                    </div> 
                    <br>
                    <div class="col-xs-1">
                      <div class="row">
                          <a class="btn btn-primary" id="btn-adicionaitem" title="adicionaitem" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idMovimento']=='') {?>  disabled <?php }?> onclick="saidaestoque.gravaritem();">Adiciona Item</a> 
                      </div> 
                    </div> 
                </div>
                <div class="row" >
                    <h3> &nbsp; Destino do Insumo/Produto (Somente escolher caso não tenha escolhido o Cliente no cabeçalho): </h3>
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
            <?php echo $_smarty_tpl->getSubTemplate ("saidaestoque/lista.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
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
<script src="/files/js/saidaestoque/saidaestoque.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
