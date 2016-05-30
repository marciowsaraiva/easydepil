{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Informar Maquina Parada</h1></tt>
            </div> 
            <div>
                <br>
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/osmaquinaparada"  onclick="osmaquinaparada.desabilitaid();"> Sair da Tela</a>
                <input class="btn btn-primary" type="button" onclick="osmaquinaparada.novaosmaquinaparada();"  value="  Nova Tarefa" name="btnGravar"/>         
                <input class="btn btn-primary" type="button" onclick="osmaquinaparada.gravarosmaquinaparada();"  value="  Gravar Tarefa" name="btnGravar"/>         
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
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
                    <h3> <strong>Maquinas paradas nesta ordem de serviço:</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Maquina </label>
                                <select class="form-control" name="idMaquina" id="idMaquina"> 
                                    {html_options options=$lista_maquina selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="maquinaparada">Motivo da parada</label>
                                <select class="form-control" name="idMaquinaParada" id="idMaquinaParada"> 
                                    {html_options options=$lista_maquinaparada selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="tarefa">Tarefa</label>
                                <select class="form-control" name="idOSTarefa" id="idOSTarefa">
                                    {html_options options=$lista_tarefas}
                                </select>                      
                            </div>
                        </div>                     
                        <div class="col-xs-2">
                            <label for="form-control">Parada desde</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicio" id="dtInicio" value="{Date("d/m/Y h:i:s")}" >           
                        </div> 
                        <div class="col-xs-2">
                            <label for="form-control">Até</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFim" id="dtFim" value="{Date("d/m/Y h:i:s")}" >           
                        </div> 
                    </div> 
                    <div class="row" >
                        <div class="col-xs-10">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-2">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaoobra" title="Adiciona Informações" onclick="osmaquinaparada.gravarosmaquinaparada();"   >Adiciona Informações</a> 
                          </div> 
                        </div> 
                    </div>
                    <br>
                    <div id="mostrarmaquinaparada">
                         {include file="osmaquinaparada/osmaquinaparada.html"}                        
                    </div>
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
<script src="/files/js/osmaquinaparada/osmaquinaparada.js"></script>



{include file="comuns/footer.tpl"}

