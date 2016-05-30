{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Informar a Analise</h1></tt>
            </div> 
            <form name="frm-grava-os" action="/osaprovar/gravar_os" method="POST" enctype="multipart/form-data">
                <br>
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
                <div class="row">
                    <div class="col-xs-12">
                        <label for="form-control">Descrição do problema</label>
                        <textarea type="text" class="form-control" name="dsProblema" READONLY  id="dsProblema" > {$registro.dsProblema|default:''} </textarea>
                    </div> 
                </div> 
                </br>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="responsavel">Responsável</label>
                            <select class="form-control" name="idColaboradorResponsavel" disabled id="idColaboradorResponsavel">
                                {html_options options=$lista_colaboradorresponsavel selected=$registro.idColaboradorResponsavel}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Inicio</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicio" onblur="os.verhoras();" id="dtInicio" READONLY value="{$registro.dtInicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Termino</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFim" id="dtFim" onblur="os.verhoras();" READONLY value="{$registro.dtFim|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="manutencao">Tipo de Manutenção</label>
                            <select class="form-control" name="idTipoManutencao" disabled    id="idTipoManutencao">
                                {html_options options=$lista_tipomanutencao selected=$registro.idTipoManutencao}
                            </select>                      
                        </div>
                    </div>        
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="falha">Tipo de Falha</label>
                            <select class="form-control" name="idTipoFalha" disabled id="idTipoFalha">
                                {html_options options=$lista_tipofalha selected=$registro.idTipoFalha}
                            </select>                      
                        </div>
                    </div>                     
                </div> 
                <br>
                <div class="row" >
                    <h3> &nbsp; Informe os dados da aprovação:</h3>
                    <br>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <label for="form-control">Aprovado em</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtAprovacao" id="dtAprovacao" value="{$registro.dtAprovacao|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                    </div>                             
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="aprovadopor">Aprovado por</label>
                            <select class="form-control" name="idColaboradorAprovado" id="idColaboradorAprovado">
                                {html_options options=$lista_colaboradoraprovado}
                            </select>                      
                        </div>
                    </div>                                            
                </div> 
                <br>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
            </form>
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
<script src="/files/js/osaprovar/aprovaros.js"></script>



{include file="comuns/footer.tpl"}

