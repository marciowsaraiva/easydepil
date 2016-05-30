{include file="comuns/head.tpl"}

<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Inclusão de Agenda para Manutenção Preventiva</h1></tt>
            </div>          
            <a href="/maquina" class="btn btn-primary"> Voltar</a>

            <br>
            <div class="row">
                <div class="col-xs-1">
                    {if {$registro.idMaquina}>0}
                            <label for="form-control">Código</label>
                            <input type="text" class="form-control" name="idMaquina" id="idMaquina" value="{$registro.idMaquina}" READONLY>           
                    {else}
                             <label for="form-control">Código</label>
                             <input type="text" class="form-control" name="idMaquina" value="" READONLY>           
                    {/if}                     
                </div> 
                <div class="col-xs-3">
                    <label for="form-control">Nome do Maquina</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsMaquina|default:''}" READONLY>           
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="maquinapai">Máquina mãe</label>
                        <select class="form-control" name="idMaquinaPai" id="idMaquinaPai" READONLY>
                            {html_options options=$lista_maquina selected=$registro.idMaquinaPai}
                        </select>                      
                    </div>
                </div>                     
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <select class="form-control" name="idModelo" id="idModelo" READONLY>
                            {html_options options=$lista_modelo selected=$registro.idModelo}
                        </select>                      
                    </div>
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <select class="form-control" name="idMarca" id="idMarca" READONLY>
                            {html_options options=$lista_marca selected=$registro.idMarca}
                        </select>                      
                    </div>
                </div> 
                <div class="col-xs-2">
                    <label for="form-control">Número de série</label>
                    <input type="text" class="form-control" name="nrSerie" id="nrSerie" value="{$registro.nrSerie|default:''}" READONLY >           
                </div> 
            </div>    
            <br>
            <div class="row">
                <div class="col-xs-2">
                    <label for="form-control">Código do Fabricante</label>
                    <input type="text" class="form-control" name="dsCodigoDoFabricante" id="dsCodigoDoFabricante" value="{$registro.dsCodigoDoFabricante|default:''}" READONLY >           
                </div> 
                <div class="col-xs-2">
                    <label for="form-control">Caracteristicas</label>
                    <input type="text" class="form-control" name="dsCaracteristicas" id="dsCaracteristicas" value="{$registro.dsCaracteristicas|default:''}" READONLY >           
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="grupocusto">Grupo de Custo</label>
                        <select class="form-control" name="idGrupoCusto" id="idGrupoCusto" READONLY>
                            {html_options options=$lista_grupocusto selected=$registro.idGrupoCusto}
                        </select>                      
                    </div>
                </div> 

                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="setor">Setor</label>
                        <select class="form-control" name="idSetor" id="idSetor" READONLY>
                            {html_options options=$lista_setor selected=$registro.idSetor}
                        </select>                      
                    </div>
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="unidade">Unidade</label>
                        <select class="form-control" name="idUnidade" id="idUnidade" READONLY>
                            {html_options options=$lista_unidade selected=$registro.idUnidade}
                        </select>                      
                    </div>
                </div>                     
                <div class="col-xs-2">
                    <label for="form-control">Valor Unitário</label>
                    <input type="text" class="form-control" name="vlUnitario" id="vlUnitario" value="{$registro.vlUnitario|default:''}" READONLY >           
                </div>                             
            </div> 
            <br>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="form-control">Horário</label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"> Semana &nbsp <input type="checkbox" name="todasSemanas" value="ON" /></label>
                            </div>
                            <div class="col-xs-4">
                                <label for="form-control"> Dias &nbsp <input type="checkbox" name="todasSemanas" value="ON" /></label>
                            </div>
                            <div class="col-xs-1">
                                <label for="form-control"> Mêses &nbsp <input type="checkbox" name="todasSemanas" value="ON" /></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0" value="ON" /> &nbsp 00:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 06:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 12:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 18:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp Segunda </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 01 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 09 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 17 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 25 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Janeiro </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" />&nbsp Maio </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Setembro </label>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0" value="ON" /> &nbsp 00:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 07:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 13:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 19:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp Terça </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 02 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 10 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 18 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 26 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" />  &nbsp Fevereiro </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Junho </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Outubro  </label>
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da Máquina:</h3>
                <br>
            </div>
            {include file="manutprevincluir/listaocorrencias.html"}
            
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
<script src="/files/js/manutprevincluir/maquina_novo.js"></script>


{include file="comuns/footer.tpl"}

