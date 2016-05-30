{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Pedido de Compra</h1></tt>
            </div> 
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="text" class="form-control" name="idPedido" id="idPedido" value="{$idPedido|default:''}" READONLY>           
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
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtPedido" id="dtPedido" value="{$registro.dtPedido|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Número Pedido</label>
                        <input type="text" class="form-control" name="nrPedido" id="nrPedido" value="{$registro.nrPedido|default:''}">           
                    </div> 
                    <br>
                    <a class="btn btn-primary" id="btn-gravarcabecalho" title="Clique aqui para gravar o cabeçalho do Pedido"onclick="pedido.gravarcabecalho();" {if $registro.idPedido  neq  ''}  disabled {/if}  >Gravar</a> 
                    <a class="btn btn-primary" id="btn-gravarfinanceiro" title="Clique aqui para informar o Financeiro" href="/pedido/financeiro/idPedido/{$registro.idPedido}" {if $registro.idPedido  eq  ''}  disabled {/if}  >Financeiro</a> 
                    <a class="btn btn-primary" id="btn-novopedido" title="Clique aqui para começar um novo pedido" onclick="pedido.novopedido();">Novo Pedido</a> 
                    <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de pedidos" href="/pedido"  onclick="pedido.desabilitaid();"> Sair da Tela</a><br>                
                </div> 
                <br>
                <div class="row" >
                    <h3> &nbsp; Insumos para este Pedido:</h3>
                    <br>
                    <input type="hidden" class="form-control" id="idPedidoItem" name="idPedidoItem" readonly>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="insumo">Insumo/Produto </label>
                            <select class="form-control" name="idInsumo" id="idInsumo" {if $registro.idPedido  eq ''}  disabled  {/if} onchange="pedido.lerunidade();"> 
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
                        <input type="text" class="form-control obg valor" name="qtPedido" id="qtPedido" {if $registro.idPedido  eq ''}  disabled  {/if} value="">      
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Valor Total</label>
                        <input type="text" class="form-control obg valor" name="vlPedido" {if $registro.idPedido  eq  ''}  disabled {/if} id="vlPedido" value=""> 
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Observação</label>
                        <input type="text" class="form-control" name="dsObservacaoItem" {if $registro.idPedido  eq  ''}  disabled {/if} id="dsObservacaoItem" value=""> 
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="localestoque">Local para Estoque </label>
                            <select class="form-control" name="idLocalEstoque" id="idLocalEstoque" {if $registro.idPedido  eq ''}  disabled  {/if}"> 
                                {html_options options=$lista_localestoque selected=null}
                            </select>                      
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-1">
                      <div class="row">
                          <a class="btn btn-primary" id="btn-adicionaitem" title="Clique aqui para adicionar este insumo/clinuto na lista abaixo" {if $registro.idPedido  eq  ''}  disabled {/if} onclick="pedido.gravaritem();">Gravar Item</a> 
                      </div> 
                    </div> 
                </div>
                <div class="row" >
                    <h3> &nbsp; Aplicação Direta (Caso escolha uma das opçoes abaixo, o sistema vai gerar uma saída de estoque):</h3>
                    <br>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="centrocusto">Centro de Custo </label>
                            <select class="form-control" name="idCentroCusto" {if $registro.idPedido  eq  ''}  disabled {/if} id="idCentroCusto">
                                {html_options options=$lista_centrocusto selected=null}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="maquina">Maquina </label>
                            <select class="form-control" name="idMaquina" {if $registro.idPedido  eq  ''}  disabled {/if} id="idMaquina">  
                                {html_options options=$lista_maquina selected=null}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="ordemservico">Ordem de Serviço </label>
                            <select class="form-control" name="idOS" {if $registro.idPedido  eq  ''}  disabled {/if} id="idOS"> 
                                {html_options options=$lista_os selected=null}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="motivo">Motivo para O.S. </label>
                            <select class="form-control" name="idMotivo" {if $registro.idPedido  eq  ''} disabled {/if}  id="idMotivo">  
                                {html_options options=$lista_motivo selected=null}
                            </select>                      
                        </div>
                    </div>
                </div>
                <br>
            {include file="pedido/lista.html"}
            
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



{include file="comuns/footer.tpl"}

