{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idMaquina}>0} {$registro.dsMaquina|default:''}{else} Inclus&atilde;o de Maquinas{/if}</h1></tt>
            </div>          
            <a href="/maquina" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-maquina" 
                  action="/maquina/gravar_maquina" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
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
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsMaquina|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="maquinapai">Máquina mãe</label>
                            <select class="form-control" name="idMaquinaPai" id="idMaquinaPai">
                                {html_options options=$lista_maquina selected=$registro.idMaquinaPai}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <select class="form-control" name="idModelo" id="idModelo">
                                {html_options options=$lista_modelo selected=$registro.idModelo}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <select class="form-control" name="idMarca" id="idMarca">
                                {html_options options=$lista_marca selected=$registro.idMarca}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Número de série</label>
                        <input type="text" class="form-control" name="nrSerie" id="nrSerie" value="{$registro.nrSerie|default:''}" >           
                    </div> 
                </div>    
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <label for="form-control">Código do Fabricante</label>
                        <input type="text" class="form-control" name="dsCodigoDoFabricante" id="dsCodigoDoFabricante" value="{$registro.dsCodigoDoFabricante|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Caracteristicas</label>
                        <input type="text" class="form-control" name="dsCaracteristicas" id="dsCaracteristicas" value="{$registro.dsCaracteristicas|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="grupocusto">Grupo de Custo</label>
                            <select class="form-control" name="idGrupoCusto" id="idGrupoCusto">
                                {html_options options=$lista_grupocusto selected=$registro.idGrupoCusto}
                            </select>                      
                        </div>
                    </div> 
                            
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Setor</label>
                            <select class="form-control" name="idSetor" id="idSetor">
                                {html_options options=$lista_setor selected=$registro.idSetor}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="unidade">Unidade</label>
                            <select class="form-control" name="idUnidade" id="idUnidade">
                                {html_options options=$lista_unidade selected=$registro.idUnidade}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Valor Unitário</label>
                        <input type="text" class="form-control" name="vlUnitario" id="vlUnitario" value="{$registro.vlUnitario|default:''}" >           
                    </div> 
                            
                </div> 
                <br>
                  <div class="col-xs-3">
                    <div class="row">
                        <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                    </div> 
                  </div> 
                <br>
            </form>
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da Máquina:</h3>
                <br>
            </div>
            {include file="maquina/listaocorrencias.html"}
            
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
<script src="/files/js/maquina/maquina_novo.js"></script>



{include file="comuns/footer.tpl"}

