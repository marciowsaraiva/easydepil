{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Previsão Financeira para o Pedido de Compra Número {$idPedido}</h1></tt>
            </div> 
                <br>
                <div class="row">
                    <h3> &nbsp; Informações para Financeiro: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="hidden" class="form-control" name="idPedido" id="idPedido" value="{$idPedido|default:''}" >           
                            <input type="text" class="form-control" name="idFinanceiro" id="idFinanceiro" value="{$registrofinanceiro.idFinanceiro|default:''}" readonly>           
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão de Entrega</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtPrevisaoEntrega" id="dtPrevisaoEntrega" {if $registrofinanceiro.idFinanceiro neq ''} readonly {/if} value="{$registrofinanceiro.dtPrevisaoEntrega|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Qtde Parcelas</label>
                        <input type="text" class="form-control" name="qtParcelas" id="qtParcelas"  {if $registrofinanceiro.idFinanceiro neq ''} readonly {/if} value="{$registrofinanceiro.qtParcelas|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Primeiro vencimento</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtPrimeiroVencimento" id="dtPrimeiroVencimento"  {if $registrofinanceiro.idFinanceiro neq ''} readonly {/if} value="{$registrofinanceiro.dtPrimeiroVencimento|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Observacao</label>
                        <input type="text" class="form-control" name="dsObservacao" id="dsObservacao"  {if $registrofinanceiro.idFinanceiro neq ''} readonly {/if} value="{$registrofinanceiro.dsObservacao|default:''}" >           
                    </div> 
                    <br>
                    <a class="btn btn-primary" id="btn-gravarfinan" title="Clique aqui para gravar as informações das parcelas"  {if $registrofinanceiro.idFinanceiro neq ''} DISABLED {/if} onclick="pedido.gravarfinanceiro();"  >Gravar</a> 
                    <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar ao pedido" href="/pedido"  onclick="pedido.financeirosair();"> Sair da Tela</a><br>                
                </div> 
                <br>
            {include file="pedido/listafinanceiro.html"}
            
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

