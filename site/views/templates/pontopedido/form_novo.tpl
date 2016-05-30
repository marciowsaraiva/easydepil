{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idInsumo}>0} {$registro.dsInsumo|default:''}{else} Inclus&atilde;o de Insumos com Ponto de Pedido{/if}</h1></tt>
            </div>          
            <a href="/pontopedido" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-pontopedido" 
                  action="/pontopedido/gravar_pontopedido" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idInsumo}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idInsumo" id="idInsumo" value="{$registro.idInsumo}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idInsumo" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Insumo</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsInsumo|default:''}" READONLY >           
                    </div> 
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="unidade">Unidade</label>
                            <select class="form-control" name="idUnidade" id="idUnidade" disabled>
                                {html_options options=$lista_unidade selected=$registro.idUnidade}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="grupopontopedido">Grupo do Insumo</label>
                            <select class="form-control" name="idGrupo" id="idGrupo" disabled>
                                {html_options options=$lista_grupo selected=$registro.idGrupo}
                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <select class="form-control" name="idModelo" id="idModelo" disabled>
                                {html_options options=$lista_modelo selected=$registro.idModelo}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <select class="form-control" name="idMarca" id="idMarca" disabled>
                                {html_options options=$lista_marca selected=$registro.idMarca}
                            </select>                      
                        </div>
                    </div> 
                </div>    
                <br>
                <div class="row">
                    <div class="col-xs-4">
                        <label for="form-control">Número de série</label>
                        <input type="text" class="form-control" name="nrSerie" id="nrSerie" value="{$registro.nrSerie|default:''}" READONLY>           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Código do Fabricante</label>
                        <input type="text" class="form-control" name="dsCodigoDoFabricante" id="dsCodigoDoFabricante" value="{$registro.dsCodigoDoFabricante|default:''}" READONLY>           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Estoque mínimo</label>
                        <input type="text" class="form-control" name="qtMinima" id="qtMinima" value="{$registro.qtMinima|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Lote de Reposição</label>
                        <input type="text" class="form-control" name="qtLoteReposicao" id="qtLoteReposicao" value="{$registro.qtLoteReposicao|default:''}" >           
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
<script src="/files/js/pontopedido/pontopedido_novo.js"></script>



{include file="comuns/footer.tpl"}

