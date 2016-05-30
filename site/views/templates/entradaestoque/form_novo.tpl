{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
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
                    <a class="btn btn-primary" id="btn-gravarcabecalho" title="Clique aqui para gravar o cabeçalho da Entrada de Estoque"onclick="entradaestoque.gravarcabecalho();" {if $registro.idMovimento  neq  ''}  disabled {/if}  >Gravar Cabeçalho</a> 
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
                            <input type="text" class="form-control" name="idMovimento" id="idMovimento" value="{$registro.idMovimento|default:''}" READONLY>           
                        </div>
                    </div>                     
                        <div class="col-xs-2">
                        <div class="form-group">
                            <label for="tipomovimento">Tipo de Movimento</label>
                            <select class="form-control" name="idTipoMovimento" id="idTipoMovimento">
                                {html_options options=$lista_tipomovimento selected=$registro.idTipoMovimento}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="fornecedor">Fornecedor</label>
                            <select class="form-control" name="idFornecedor" id="idFornecedor">
                                {html_options options=$lista_fornecedor selected=$registro.idFornecedor}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <label for="form-control">Observacao</label>
                        <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value="{$registro.dsObservacao|default:''}" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Data</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtMovimento" id="dtMovimento" value="{$registro.dtMovimento|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Nota</label>
                        <input type="text" class="form-control" name="nrNota" id="nrNota" value="{$registro.nrNota|default:''}" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Pedido</label>
                        <input type="text" class="form-control" name="nrPedido" id="nrPedido" value="{$registro.nrPedido|default:''} " >  {* ="entradaestoque.lerpedido();" *}          
                    </div> 
                    <hr>
                    <div class="col-xs-1">
                      <div class="row">
                          <a class="btn btn-primary" id="btn-lerdadospedido" title="Clique aqui para ler dados do pedido e baixa-lo automaticamente" {if $registro.idMovimento  eq  ''}  enabled {/if}  onclick="entradaestoque.lerpedido();">Ler Pedido </a> 
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
                            <select class="form-control" name="idInsumo" id="idInsumo" {if $registro.idMovimento  eq ''}  disabled  {/if} onchange="entradaestoque.lerunidade();"> 
                                {html_options options=$lista_insumo selected=null}
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
                        {*{var_dump($registro)}*}
                        <input type="text" class="form-control obg valor" name="qtMovimento" id="qtMovimento" {if $registro.idMovimento  eq ''}  disabled  {/if} value="">      
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Valor Total</label>
                        <input type="text" class="form-control obg valor" name="vlMovimento" {if $registro.idMovimento  eq  ''}  disabled {/if} id="vlMovimento" value=""> 
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Observação</label>
                        <input type="text" class="form-control" name="dsObservacaoItem" {if $registro.idMovimento  eq  ''}  disabled {/if} id="dsObservacaoItem" value=""> 
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="localestoque">Local para Estoque </label>
                            <select class="form-control" name="idLocalEstoque" id="idLocalEstoque" {if $registro.idMovimento  eq ''}  disabled  {/if}"> 
                                {html_options options=$lista_localestoque selected=null}
                            </select>                      
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-1">
                      <div class="row">
                          <a class="btn btn-primary" id="btn-adicionaitem" title="adicionaitem" {if $registro.idMovimento  eq  ''}  disabled {/if}  onclick="entradaestoque.gravaritem();">Adiciona Item</a> 
                      </div> 
                    </div> 
                </div>
                <div class="row" >
                    <h3> &nbsp; Aplicação Direta (Caso escolha uma das opçoes abaixo, o sistema vai gerar uma saída de estoque):</h3>
                    <br>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="centrocusto">Centro de Custo </label>
                            <select class="form-control" name="idCentroCusto" {if $registro.idMovimento  eq  ''}  disabled {/if} id="idCentroCusto">
                                {html_options options=$lista_centrocusto selected=null}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="maquina">Maquina </label>
                            <select class="form-control" name="idMaquina" {if $registro.idMovimento  eq  ''}  disabled {/if} id="idMaquina">  
                                {html_options options=$lista_maquina selected=null}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="ordemservico">Ordem de Serviço </label>
                            <select class="form-control" name="idOS" {if $registro.idMovimento  eq  ''}  disabled {/if} id="idOS"> 
                                {html_options options=$lista_os selected=null}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="motivo">Motivo para O.S. </label>
                            <select class="form-control" name="idMotivo" {if $registro.idMovimento  eq  ''} disabled {/if}  id="idMotivo">  
                                {html_options options=$lista_motivo selected=null}
                            </select>                      
                        </div>
                    </div>
                </div>
                <br>
            {include file="entradaestoque/lista.html"}
            
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



{include file="comuns/footer.tpl"}

