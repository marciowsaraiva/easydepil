{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if $registro.idProjetoServico > 0} {$registro.dsServicoProjeto|default:''}{else} Inclus&atilde;o de Serviços na Fase do Projeto{/if}</h1></tt>
            </div>          

            <form name="frm-servicoprojeto" 
                  action="/servicoprojeto/gravar_servicoprojeto" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <a href="/servicoprojeto" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <input type="hidden" class="form-control" name="idFase" id="idFase" value="{$registro.idFase}" READONLY>           
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idProjetoServico}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProjetoServico" id="idProjetoServico" value="{$registro.idProjetoServico}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProjetoServico" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Objetivo do Serviço</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsServicoProjeto|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Responsável pelo Serviço</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                {html_options options=$lista_colaborador selected=$registro.idColaboradorResponsavel}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomeprojeto">Projeto</label>
                            <select class="form-control" name="idProjeto" id="idProjeto" onclick="lerfasedoprojeto();">
                                {html_options options=$lista_projeto selected=$registro.idProjeto}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div id="listarfase" class="form-group">
                            {include file="servicoprojeto/fases.html"}                            
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Valor do Orçamento:</label>
                                 <input type="text" class="form-control obg data" id="vlOrcado" name="vlOrcado" value="{$registro.vlOrcado|default:'0'}" disabled >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Prevista para Inicio:</label>
                                 <input type="text" class="form-control obg data" id="dtPrevisaoInicio" name="dtPrevisaoInicio" value="{$registro.dtPrevisaoInicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Prevista para Termino:</label>
                                 <input type="text" class="form-control obg data" id="dtPrevisaoTermino" name="dtPrevisaoTermino" value="{$registro.dtPrevisaoTermino|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-control">Resumo do Serviço</label>
                            <textarea class="form-control" name="dsTermoAbertura" id="dsTermoAbertura">{$registro.dsTermoAbertura|default:''}</textarea>           
                        </div>
                    </div>                         
                </div> 
                <div class="row">
                    <h3> &nbsp; Documentos ou imagens que fazem parte deste Serviço:</h3>
                    <br>
                    <div class="col-xs-4">
                        <div class="form-group">
                                 <label for="form-control">Descrição do documento</label>
                                 <input type="text" class="form-control obg data" id="dsDocumento" name="dsDocumento" value="" >           
                        </div>
                    </div> 
                    <div class="col-xs-4">
                        <div class="form-group">
                                 <label for="form-control">Nome do documento ou imagem</label>
                                 <input type="text" class="form-control obg data" id="dsLocal" name="dsLocal" value="" >           
                        </div>
                    </div> 
                    <br>
                    <a class="btn btn-primary" id="btn-seleciona" title="Clique aqui para selecionar um arquivo" {if $registro.idProjetoServico  eq  ''}  disabled {/if} onclick="servico.lerdoc();">Procurar.....</a> 
                    <a class="btn btn-primary" id="btn-adicionaitem" title="Clique aqui para adicionar este arquivo na lista abaixo" {if $registro.idProjetoServico  eq  ''}  disabled {/if} onclick="servico.gravardoc();">Adicionar</a> 
                </div> 
            </form>
            {include file="servicoprojeto/listadocumentos.html"}
            <br>            
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>SERVIÇOS QUE FARÃO PARTE DESTE SERVIÇO </strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_insumo">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; ESCOLHA O SERVIÇO:</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="servico">Servico </label>
                                <select class="form-control" name="idServico" id="idServico"  onchange="lerservico();"> 
                                    {html_options options=$lista_servicos selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label for="form-control">Valor do Serviço</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioServico" id="vlUnitarioServico" readonly value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtServico" id="qtServico"  onchange="calcularvalor();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalServico" id="vlTotalServico" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoServico" id="dsObservacaoServico" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionaservico" title="Adiciona Serviço" onclick="gravarservicoprojeto();" {if $registro.idProjetoServico eq ''} disabled {/if}  >Adiciona Servico</a> 
                          </div> 
                        </div> 
                    </div>
                    <br>
                    <div id="servicosprojeto">
                         {include file="servicoprojeto/listaservicos.html"}
                    </div>
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Mudanças de Status do Servico:</h3>
                        <br>
                    </div>
                    <br>
                    {include file="servicoprojeto/listaocorrencias.html"}
                </div>
            </div>    
            
            
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<!-- Toast Message -->
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<!-- Utils -->
<script src="/files/js/util.js"></script>
<script src="/files/js/servicoprojeto/servico.js"></script>



{include file="comuns/footer.tpl"}

