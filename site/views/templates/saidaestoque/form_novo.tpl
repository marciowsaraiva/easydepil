{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
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
                    <a class="btn btn-primary" id="btn-gravarcabecalho" title="Clique aqui para gravar o cabeçalho da Saída de Estoque"onclick="entradaestoque.gravarcabecalho();" {if $registro.idMovimento  neq  ''}  disabled {/if}  >Gravar Cabeçalho</a> 
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
                            <label for="cliente">Cliente</label>
                            <select class="form-control" name="idCliente" id="idCliente">
                                {html_options options=$lista_cliente selected=$registro.idCliente}
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
                        <label for="form-control">Número Nota</label>
                        <input type="text" class="form-control" name="nrNota" id="nrNota" value="{$registro.nrNota|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Número Pedido</label>
                        <input type="text" class="form-control" name="nrPedido" id="nrPedido" value="{$registro.nrPedido|default:''}" >           
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
                            <select class="form-control" name="idInsumo" id="idInsumo" {if $registro.idMovimento  eq ''}  disabled  {/if} onchange="saidaestoque.lerunidade();"> 
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
                        <input type="text" class="form-control obg valor" name="qtMovimento" id="qtMovimento" {if $registro.idMovimento  eq ''}  disabled  {/if} onchange="saidaestoque.calcularqtde();" value="">      
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Valor Total</label>
                        <input type="hidden" class="form-control" name="vlUltimaCompra"  id="vlUltimaCompra" value=""> 
                        <input type="text" class="form-control obg valor" name="vlMovimento" disabled  id="vlMovimento" value=""> 
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Observação</label>
                        <input type="text" class="form-control" name="dsObservacaoItem" {if $registro.idMovimento  eq  ''}  disabled {/if} id="dsObservacaoItem" value=""> 
                    </div> 
                    <br>
                    <div class="col-xs-1">
                      <div class="row">
                          <a class="btn btn-primary" id="btn-adicionaitem" title="adicionaitem" {if $registro.idMovimento  eq  ''}  disabled {/if} onclick="saidaestoque.gravaritem();">Adiciona Item</a> 
                      </div> 
                    </div> 
                </div>
                <div class="row" >
                    <h3> &nbsp; Destino do Insumo/Produto (Somente escolher caso não tenha escolhido o Cliente no cabeçalho): </h3>
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
            {include file="saidaestoque/lista.html"}
            
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



{include file="comuns/footer.tpl"}

