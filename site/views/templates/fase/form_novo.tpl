{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idFase}>0} {$registro.dsFase|default:''}{else} Inclus&atilde;o de Fases{/if}</h1></tt>
            </div>          

            <form name="frm-fase" 
                  action="/fase/gravar_fase" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <a href="/fase" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idFase}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idFase" id="idFase" value="{$registro.idFase}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idFase" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-5">
                        <label for="form-control">Objetivo do Fase</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsFase|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Responsável pelo Fase</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                {html_options options=$lista_colaborador selected=$registro.idColaboradorResponsavel}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomeprojeto">Projeto</label>
                            <select class="form-control" name="idProjeto" id="idProjeto">
                                {html_options options=$lista_projeto selected=$registro.idProjeto}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Valor do Orçamento:</label>
                                 <input type="text" class="form-control obg data" id="vlOrcado" name="vlOrcado" value="{$registro.vlOrcado|default:'0'}" DISABLED>           
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
                            <label for="form-control">Resumo da Fase</label>
                            <textarea class="form-control" name="dsTermoAbertura" id="dsTermoAbertura">{$registro.dsTermoAbertura|default:''}</textarea>           
                        </div>
                    </div>                         
                </div> 
                <div class="row">
                    <h3> &nbsp; Documentos ou imagens que fazem parte da Fase:</h3>
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
                    <a class="btn btn-primary" id="btn-seleciona" title="Clique aqui para selecionar um arquivo" {if $registro.idFase  eq  ''}  disabled {/if} onclick="fase.lerdoc();">Procurar.....</a> 
                    <a class="btn btn-primary" id="btn-adicionaitem" title="Clique aqui para adicionar este arquivo na lista abaixo" {if $registro.idFase  eq  ''}  disabled {/if} onclick="fase.gravardoc();">Adicionar</a> 
                </div> 
            </form>
            {include file="fase/listadocumentos.html"}
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da Fase:</h3>
                <br>
            </div>
            {include file="fase/listaocorrencias.html"}
            
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
<script src="/files/js/fase/fase_novo.js"></script>



{include file="comuns/footer.tpl"}

