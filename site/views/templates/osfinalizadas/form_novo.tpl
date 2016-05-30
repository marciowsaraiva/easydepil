{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Finalizada</h1></tt>
            </div> 
            <div>
                <br>
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/osfinalizadas"  onclick="osfinalizadas.desabilitaid();"> Sair da Tela</a>
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
                            <select class="form-control" name="idColaboradorSolicitante" READONLY id="idColaboradorSolicitante">
                                {html_options options=$lista_colaboradorsolicitante selected=$registro.idColaboradorSolicitante}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Setor do Solicitante</label>
                            <select class="form-control" name="idSetorSolicitante" READONLY id="idSetorSolicitante">
                                {html_options options=$lista_setorsolicitante selected=$registro.idSetorSolicitante}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Número da O.S.</label>
                         <strong> <input type="text" class="form-control" name="nrOS" READONLY id="nrOS" value="{$registro.nrOS|default:''}"> </strong>           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Local do Serviço</label>
                            <select class="form-control" name="idSetor" READONLY id="idSetor">
                                {html_options options=$lista_setoros selected=$registro.idSetor}
                            </select>                      
                        </div>
                    </div>     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Centro de Custo</label>
                            <select class="form-control" name="idCentroCusto" READONLY id="idCentroCusto">
                                {html_options options=$lista_centrocusto selected=$registro.idCentroCusto}
                            </select>                      
                        </div>
                    </div>     
                </div> 
                <div class="row">
                    <div class="col-xs-12">
                        <label for="form-control">Descrição do problema</label>
                        <textarea type="text" class="form-control" name="dsProblema"  READONLY id="dsProblema" > {$registro.dsProblema|default:''} </textarea>
                    </div> 
                </div> 
                </br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Responsável</label>
                            <select class="form-control" name="idColaboradorResponsavel" READONLY id="idColaboradorResponsavel">
                                {html_options options=$lista_colaboradorresponsavel selected=$registro.idColaboradorResponsavel}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Inicio</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" READONLY name="dtInicio" onblur="os.verhoras();" id="dtInicio" value="{$registro.dtInicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Termino</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" READONLY name="dtFim" id="dtFim" onblur="os.verhoras();" value="{$registro.dtFim|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="manutencao">Tipo de Manutenção</label>
                            <select class="form-control" name="idTipoManutencao" READONLY id="idTipoManutencao">
                                {html_options options=$lista_tipomanutencao selected=$registro.idTipoManutencao}
                            </select>                      
                        </div>
                    </div>        
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="falha">Tipo de Falha</label>
                            <select class="form-control" name="idTipoFalha" READONLY id="idTipoFalha">
                                {html_options options=$lista_tipofalha selected=$registro.idTipoFalha}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Grupo</label>
                            <select class="form-control" name="idOSGrupo" READONLY id="idOSGrupo">
                                {html_options options=$lista_osgrupo selected=$registro.idOSGrupo}
                            </select>                      
                        </div>
                    </div>                     
                </div> 
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="falha">Motivo</label>
                            <select class="form-control" name="idMotivo" READONLY id="idMotivo">
                                {html_options options=$lista_motivo selected=$registro.idMotivo}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-9">
                        <label for="form-control">Analise da Causa</label>
                        <textarea type="text" class="form-control" name="dsAnaliseCausa" READONLY id="dsAnaliseCausa" > {$registro.dsAnaliseCausa|default:''} </textarea>
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
                    <a class="btn btn-primary" id="btn-adicionamaoobra" title="Gravar Informações" onclick="osfinalizadas.gravarosfinalizadas();">Re-Abrir</a> 
                </div>
            </div>   
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da O.S.:</h3>
                <br>
            </div>
            {include file="os/listaocorrencias.html"}
            <br>                        
            <div class="row" >
                <h3> &nbsp; Tarefas realizadas nesta Ordem de Serviço<h3>
            </div>
            {include file="osfinalizadas/ostarefaTarefas.html"}     
            <br>                        
            <div class="row" >
                <h3> &nbsp; Maquinas paradas<h3>
            </div>
            {include file="osfinalizadas/osmaquinaparada.html"}                        
            <div class="row" >
                <h3> &nbsp; Insumos utilizados<h3>
            </div>
            {include file="osfinalizadas/osinsumo.html"}                        
            <div class="row" >
                <h3> &nbsp; Mão de Obra utilizada<h3>
            </div>
            {include file="osfinalizadas/osmaoobra.html"}                        
            <div class="row" >
                <h3> &nbsp; Maquinas/equipamentos utilizados<h3>
            </div>
            {include file="osfinalizadas/osmaquina.html"}                        
            
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
<script src="/files/js/osfinalizadas/osfinalizadas.js"></script>



{include file="comuns/footer.tpl"}

