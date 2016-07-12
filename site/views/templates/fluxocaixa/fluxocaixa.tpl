{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
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
                    <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtDe" id="dtDe" value="{$dtDe|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                </div>                         
                <div class="col-lg-1">
                    <label for="form-control">Até</label>
                    <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtAte" id="dtAte" value="{$dtAte|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                </div>                         
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="despesa">Despesas</label>
                        <select class="form-control" name="idDespesa" id="idDespesa">
                            {html_options options=$lista_despesa selected=$idDespesa|default:''}
                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="receita">Receitas</label>
                        <select class="form-control" name="idReceita" id="idReceita">
                            {html_options options=$lista_receita selected=$idReceita|default:''}
                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="fornecedor">Fornecedor</label>
                        <select class="form-control" name="idFornecedor" id="idFornecedor">
                            {html_options options=$lista_fornecedor selected=$idFornecedor|default:''}
                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control" name="idCliente" id="idCliente">
                            {html_options options=$lista_cliente selected=$registro.idCliente|default:''}
                        </select>                      
                    </div>
                </div>                     
                <div class="col-lg-2">
                    <label for="form-control">Observacao</label>
                    <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value="{$dsObservacao|default:''}" >           
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
                {include file="fluxocaixa/lista.tpl"}
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



{include file="comuns/footer.tpl"}

