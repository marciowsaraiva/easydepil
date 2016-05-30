{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idProjeto}>0} {$registro.dsProjeto|default:''}{else} Inclus&atilde;o de Projetos{/if}</h1></tt>
            </div>          
            
            <form name="frm-projeto" 
                  action="/projeto/gravar_projeto" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <a href="/projeto" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>

                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idProjeto}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProjeto" id="idProjeto" value="{$registro.idProjeto}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProjeto" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-5">
                        <label for="form-control">Objetivo do Projeto (Descrição resumida)</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsProjeto|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomesetor">Empresa</label>
                            <select class="form-control" name="idEmpresa" id="idEmpresa">
                                {html_options options=$lista_empresa selected=$registro.idEmpresa}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Responsável pelo Projeto</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                {html_options options=$lista_colaborador selected=$registro.idColaborador}
                            </select>                      
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
                            <label for="form-control">Detalhes do Projeto</label>
                            <textarea class="form-control" name="dsTermoAbertura" id="dsTermoAbertura">{$registro.dsTermoAbertura|default:''}</textarea>           
                        </div>
                    </div>                         
                </div> 
                <div class="row">
                    <h3> &nbsp; Documentos ou imagens que fazem parte do Projeto:</h3>
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
                    <a class="btn btn-primary" id="btn-seleciona" title="Clique aqui para selecionar um arquivo" {if $registro.idProjeto  eq  ''}  disabled {/if} onclick="projeto.lerdoc();">Procurar.....</a> 
                    <a class="btn btn-primary" id="btn-adicionaitem" title="Clique aqui para adicionar este arquivo na lista abaixo" {if $registro.idProjeto  eq  ''}  disabled {/if} onclick="projeto.gravardoc();">Adicionar</a> 
                </div> 
            </form>
            <br>
            {include file="projeto/listadocumentos.html"}
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status do Projeto:</h3>
                <br>
            </div>
            {include file="projeto/listaocorrencias.html"}
            
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
<script src="/files/js/projeto/projeto_novo.js"></script>



{include file="comuns/footer.tpl"}

