{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idServico}>0} {$registro.dsServico|default:''}{else} Inclus&atilde;o de Servicos{/if}</h1></tt>
            </div>          
            <form name="frm-servico" 
                  action="/servico/gravar_servico" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/servico" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idServico}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idServico" id="idServico" value="{$registro.idServico}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idServico" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Servico</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsServico|default:''}" >           
                    </div> 
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="unidade">Unidade</label>
                            <select class="form-control" name="idUnidade" id="idUnidade">
                                {html_options options=$lista_unidade selected=$registro.idUnidade}
                            </select>                      
                        </div>
                    </div>                                         
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="tiposervico">Tipo de Servico</label>
                            <select class="form-control" name="idTipoServico" id="idTipoServico">
                                {html_options options=$lista_tiposervico selected=$registro.idTipoServico}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <label for="form-control">Observacao</label>
                        <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value="{$registro.dsObservacao|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Valor do Serviço</label>
                        <input type="text" class="form-control" name="vlOrcado" id="vlOrcado" value="R$ {$totalservico|default:''}" disabled >           
                    </div> 
                </div> 
            </form>
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>INSUMOS / PRODUTOS</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_insumo">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Insumos para este Serviço</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="insumo">Insumo/Produto </label>
                                <select class="form-control" name="idInsumo" id="idInsumo"  onchange="lerunidade();"> 
                                    {html_options options=$lista_insumo selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Unidade</label>
                            <input type="text" class="form-control" name="dsUnidadeInsumo" id="dsUnidadeInsumo" disabled='disabled' value="">       
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtInsumo" id="qtInsumo" onchange="calcularvalor();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Unitário</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioInsumo" readonly  id="vlUnitarioInsumo" value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalInsumo" id="vlTotalInsumo" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoInsumo" id="dsObservacaoInsumo" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionainsumo" title="Adiciona Insumo" onclick="gravarinsumo();" {if $registro.idServico eq ''} disabled {/if}  >Adiciona Insumo</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarinsumos">
                         {include file="servico/servicoinsumo.html"}
                    </div>
                </div>
            </div>    
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>MÃO DE OBRA</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Mão de Obra para este Serviço</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Mão de Obra </label>
                                <select class="form-control" name="idMaoObra" id="idMaoObra"  onchange="lerunidademo();"> 
                                    {html_options options=$lista_maoobra selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Unidade</label>
                            <input type="text" class="form-control" name="dsUnidadeMaoObra" id="dsUnidadeMaoObra" disabled='disabled' value="">       
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtMaoObra" id="qtMaoObra" onchange="calcularvalormo();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Unitário</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioMaoObra" readonly  id="vlUnitarioMaoObra" value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalMaoObra" id="vlTotalMaoObra" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaoObra" id="dsObservacaoMaoObra" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaoobra" title="Adiciona Mão de Obra" onclick="gravarmaoobra();" {if $registro.idServico eq ''} disabled {/if}  >Adiciona Mão de Obra</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaodeobra">
                        {include file="servico/servicomaoobra.html"}
                    </div>
                </div>
            </div>   
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>MAQUINAS / EQUIPAMENTOS</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Maquinas / Equipamentos para este Serviço</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Maquina </label>
                                <select class="form-control" name="idMaquina" id="idMaquina"  onchange="lerunidademaquina();"> 
                                    {html_options options=$lista_maquina selected=null}
                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Unidade</label>
                            <input type="text" class="form-control" name="dsUnidadeMaquina" id="dsUnidadeMaquina" disabled='disabled' value="">       
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtMaquina" id="qtMaquina" onchange="calcularvalormaquina();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Unitário</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioMaquina" readonly  id="vlUnitarioMaquina" value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalMaquina" id="vlTotalMaquina" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaquina" id="dsObservacaoMaquina" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaquina" title="Adiciona Maquina" onclick="gravarmaquina();" {if $registro.idServico eq ''} disabled {/if}>Adiciona Maquina</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaquina">
                        {include file="servico/servicomaquina.html"}
                    </div>
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
<script src="/files/js/servico/servico.js"></script>



{include file="comuns/footer.tpl"}

