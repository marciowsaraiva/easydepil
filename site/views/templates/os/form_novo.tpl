{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço</h1></tt>
            </div> 
            <form name="frm-grava-os" action="/os/gravar_os" method="POST" enctype="multipart/form-data">
                <br>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <a class="btn btn-primary" id="btn-novaos" title="Clique aqui para começar uma nova O.S" onclick="os.novaos();">Nova O.S</a> 
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/os"  onclick="os.desabilitaid();"> Sair da Tela</a><br>                
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
                    <br>
                    <input type="hidden" class="form-control" name="idColaboradorEscolhido" id="idColaboradorEscolhido">
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="text" class="form-control" name="idOS" id="idOS" value="{$idOS|default:''}" READONLY>           
                        </div>
                    </div>                     
                    <div class="col-xs-1">
                        <label for="form-control">Data</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtOS" id="dtOS" value="{$registro.dtOS|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <select class="form-control" name="idColaboradorSolicitante" id="idColaboradorSolicitante">
                                {html_options options=$lista_colaboradorsolicitante selected=$registro.idColaboradorSolicitante}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Setor do Solicitante</label>
                            <select class="form-control" name="idSetorSolicitante" id="idSetorSolicitante">
                                {html_options options=$lista_setorsolicitante selected=$registro.idSetorSolicitante}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Número da O.S.</label>
                         <strong> <input type="text" class="form-control" name="nrOS" id="nrOS" value="{$registro.nrOS|default:''}"> </strong>           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Local do Serviço</label>
                            <select class="form-control" name="idSetor" id="idSetor">
                                {html_options options=$lista_setoros selected=$registro.idSetor}
                            </select>                      
                        </div>
                    </div>     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Centro de Custo</label>
                            <select class="form-control" name="idCentroCusto" id="idCentroCusto">
                                {html_options options=$lista_centrocusto selected=$registro.idCentroCusto}
                            </select>                      
                        </div>
                    </div>     
                </div> 
                <div class="row">
                    <div class="col-xs-12">
                        <label for="form-control">Descrição do problema</label>
                        <textarea type="text" class="form-control" name="dsProblema" id="dsProblema" > {$registro.dsProblema|default:''} </textarea>
                    </div> 
                </div> 
                </br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Responsável</label>
                            <select class="form-control" name="idColaboradorResponsavel" id="idColaboradorResponsavel">
                                {html_options options=$lista_colaboradorresponsavel selected=$registro.idColaboradorResponsavel}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Inicio</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicio" onblur="os.verhoras();" id="dtInicio" value="{$registro.dtInicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Termino</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFim" id="dtFim" onblur="os.verhoras();" value="{$registro.dtFim|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="manutencao">Tipo de Manutenção</label>
                            <select class="form-control" name="idTipoManutencao" id="idTipoManutencao">
                                {html_options options=$lista_tipomanutencao selected=$registro.idTipoManutencao}
                            </select>                      
                        </div>
                    </div>        
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="falha">Tipo de Falha</label>
                            <select class="form-control" name="idTipoFalha" id="idTipoFalha">
                                {html_options options=$lista_tipofalha selected=$registro.idTipoFalha}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Grupo</label>
                            <select class="form-control" name="idOSGrupo" id="idOSGrupo">
                                {html_options options=$lista_osgrupo selected=$registro.idOSGrupo}
                            </select>                      
                        </div>
                    </div>                     
                </div> 
                </br>
            </form>
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da O.S.:</h3>
                <br>
            </div>
            {include file="os/listaocorrencias.html"}
            <br>
            <div class="row" >
                <div class="col-xs-1">
                    <label for="dtinicial">Data inicial </label>                    
                    <input type="text" class="form-control" name="datainicion" id="datainicion" value="{$registro.dtInicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" readonly="true"/>           
                </div>
                <div class="col-xs-1">
                    <label for="dtfinal">Data final </label>                    
                    <input type="text" class="form-control" name="datafinaln" id="datafinaln" value="{$registro.dtFim|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" readonly="true" />           
                </div>                        
                <br>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="atualizar"></label>                    
                        <a class="btn btn-primary" id="btnReservar" title="Selecionar" onclick="os.selecionaColaborador();" disabled >Selecionar</a> 
                    </div>
                </div>                         
            </div>    
            <div id="labelcolaborador">
                <label for="statusagenda"></label>
            </div> 
            <div class="row" >
                <h3> &nbsp; Mão de Obra Disponível: (em horas) </h3>
                <br>
            </div>    
            <div id="mostraragendacompleta">
                 {include file="os/osanalitico.html"}
            </div>
            <br>            
            <div class="row" >
                <h3> &nbsp; Colaboradores comprometidos em ordem de serviço neste período: </h3>
                <br>
            </div>    
            <div id="mostrarcolaboradoresos">
                 {include file="os/oscolabanalitico.html"}
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
<script src="/files/js/os/os.js"></script>



{include file="comuns/footer.tpl"}

