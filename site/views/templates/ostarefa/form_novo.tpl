{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Informar a Tarefa</h1></tt>
            </div> 
            <div>
                <br>
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/ostarefa"  onclick="ostarefa.desabilitaid();"> Sair da Tela</a>
                <input class="btn btn-primary" type="button" onclick="ostarefa.novaostarefa();"  value="  Nova Tarefa" name="btnGravar"/>         
                <input class="btn btn-primary" type="button" onclick="ostarefa.gravarostarefa();"  value="  Gravar Tarefa" name="btnGravar"/>         
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="text" class="form-control" name="idOS" id="idOS" value="{$idOS|default:''}" READONLY>           
                            <input type="hidden" class="form-control" name="idOSTarefa" id="idOSTarefa" disabled value="{$registrotarefa.idOSTarefa|default:''}" >           
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
                <div class="row" >
                    <h3> &nbsp; Informe a Tarefa Realizada:</h3>
                    <br>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="falha">Tarefa</label>
                            <select class="form-control" name="idTarefa" id="idTarefa">
                                {html_options options=$lista_tarefa}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-5">
                        <label for="form-control">Descrição da Tarefa</label>
                        <textarea type="text" class="form-control" name="dsObservacaoTarefa" id="dsObservacaoTarefa"> {''}</textarea>           
                    </div>   
                    <div class="col-xs-2">
                        <label for="form-control">Tarefa iniciada em</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicioTarefa" id="dtInicioTarefa" value="{Date("d/m/Y h:i:s")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Tarefa finalizada em</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFimTarefa" id="dtFimTarefa" value="{Date("d/m/Y h:i:s")}" >           
                    </div>                     
                </div>
            </div>           
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Insumos/Produtos usados nesta tarefa</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_insumo">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="insumo">Insumo/Produto </label>
                                <select class="form-control" name="idInsumo" id="idInsumo" > 
                                    {html_options options=$lista_insumo selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtInsumo" id="qtInsumo" onchange="ostarefa.calcularvalor();" value="">      
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoInsumo" id="dsObservacaoInsumo" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionainsumo" title="Adiciona Insumo" onclick="ostarefa.gravarinsumo();" {if $registrotarefa.idOSTarefa eq ''} disabled {/if}  >Adiciona Insumo</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarinsumos">
                         {include file="ostarefa/ostarefainsumo.html"}                        
                    </div>
                </div>
            </div>    
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Mão de obra utilizada nesta tarefa</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Colaborador / Mão de Obra </label>
                                <select class="form-control" name="idColaboradorMO" id="idColaboradorMO"> 
                                    {html_options options=$lista_maoobra selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label for="form-control">Iniciada em</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicioMOTarefa" id="dtInicioMOTarefa" value="{Date("d/m/Y h:i:s")}" >           
                        </div> 
                        <div class="col-xs-2">
                            <label for="form-control">Finalizada em</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFimMOTarefa" id="dtFimMOTarefa" value="{Date("d/m/Y h:i:s")}" >           
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaoObra" id="dsObservacaoMaoObra" value=""> 
                        </div> 
                                
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaoobra" title="Adiciona Mão de Obra" onclick="ostarefa.gravarmaoobra();" {if $registrotarefa.idOSTarefa eq ''} disabled {/if}  >Adiciona Mão de Obra</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaodeobra">
                         {include file="ostarefa/ostarefamaoobra.html"}                        
                    </div>
                </div>
            </div>   
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Maquinas / equipamentos utilizadas nesta tarefa</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Maquina </label>
                                <select class="form-control" name="idMaquinaP" id="idMaquinaP"> 
                                    {html_options options=$lista_maquina selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtMaquina" id="qtMaquina" value="">      
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaquina" id="dsObservacaoMaquina" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaquina" title="Adiciona Maquina" onclick="ostarefa.gravarmaquina();" {if $registrotarefa.idOSTarefa eq ''} disabled {/if}>Adiciona Maquina</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaquina">
                         {include file="ostarefa/ostarefamaquina.html"}                        
                    </div>
                </div>
            </div>   
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Maquinas paradas nesta tarefa:</strong> <h3>
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
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maquinaparada">Motivo da parada</label>
                                <select class="form-control" name="idMaquinaParada" id="idMaquinaParada"> 
                                    {html_options options=$lista_maquinaparada selected=null}
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
                              <a class="btn btn-primary" id="btn-adicionamaqparada" title="Adiciona Informações" onclick="osmaquinaparada.gravarosmaquinaparada();" {if $registrotarefa.idOSTarefa eq ''} disabled {/if} >Adiciona Informações</a> 
                          </div> 
                        </div> 
                    </div>
                    <br>
                    <div id="mostrarmaquinaparada">
                         {include file="osmaquinaparada/osmaquinaparada.html"}                        
                    </div>
                </div>
            </div>   
            <br>
            <div class="row">
                <h3> <strong>Tarefas já realizadas nesta Ordem de Serviço</strong> <h3>
                <div class="form-control" >
                        <div id="mostrartarefas">
                         {include file="ostarefa/ostarefaTarefas.html"}                                            
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
<script src="/files/js/ostarefa/ostarefa.js"></script>
<script src="/files/js/osmaquinaparada/osmaquinaparada.js"></script>



{include file="comuns/footer.tpl"}

