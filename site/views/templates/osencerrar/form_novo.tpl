{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Encerrar</h1></tt>
            </div> 
            <div>
                <br>
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/osencerrar"  onclick="osencerrar.desabilitaid();"> Sair da Tela</a>
                <br>
                <div class="row">
                    <h3> &nbsp; Informações da Ordem de Serviço: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="text" class="form-control" name="idOS" id="idOS" value="{$idOS|default:''}" READONLY>           
                        </div>
                    </div>                     
                    <div class="col-xs-1">
                        <label for="form-control">Data</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" READONLY name="dtOS" id="dtOS" value="{$registro.dtOS|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <select class="form-control" name="idColaboradorSolicitante" disabled id="idColaboradorSolicitante">
                                {html_options options=$lista_colaboradorsolicitante selected=$registro.idColaboradorSolicitante}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="setor">Setor do Solicitante</label>
                            <select class="form-control" name="idSetorSolicitante" disabled id="idSetorSolicitante">
                                {html_options options=$lista_setorsolicitante selected=$registro.idSetorSolicitante}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Número da O.S.</label>
                         <strong> <input type="text" class="form-control" name="nrOS" id="nrOS" READONLY value="{$registro.nrOS|default:''}"> </strong>           
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="setor">Local do Serviço</label>
                            <select class="form-control" name="idSetor" disabled id="idSetor">
                                {html_options options=$lista_setoros selected=$registro.idSetor}
                            </select>                      
                        </div>
                    </div>                     
                </div> 
                <br>
            </div>           
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Informações do Encerramento:</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-2">
                            <label for="form-control">Data do Encerramento</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtEncerramento" id="dtEncerramento" value="{$registro.dtEncerramento|date_format:'%d/%m/%Y h:i:s'|default:Date("d/m/Y h:i:s")}" >           
                        </div> 
                    </div> 
                    <br>
                    <div class="row" >
                        <div class="col-xs-12">
                            <label for="form-control">Recomendações para Manutenção Preventiva (Descrever intervalo sugerido, avaliação a ser feita, etc)</label>
                            <textarea type="text" class="form-control" name="dsRecomendacaoMP" id="dsRecomendacaoMP" > {$registro.dsRecomendacaoMP}  </textarea>
                        </div> 
                    </div> 
                    <br>
                    <div class="row" >
                        <div class="col-xs-10">
                            <label for="form-control">Recomendações para Próxima Manutenção</label>
                            <textarea type="text" class="form-control" name="dsRecomendacaoPM" id="dsRecomendacaoPM" > {$registro.dsRecomendacaoPM} </textarea>
                        </div> 
                        <div class="col-xs-2">
                            <label for="form-control">Número da OS</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="nrProximaOS" id="nrProximaOS" value="{$registro.nrProximaOS}" >           
                        </div> 
                    </div> 
                    <br>
                    <a class="btn btn-primary" id="btn-adicionamaoobra" title="Gravar Informações" onclick="osencerrar.gravarosencerrar();">Encerrar</a> 
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
<script src="/files/js/osencerrar/osencerrar.js"></script>



{include file="comuns/footer.tpl"}

