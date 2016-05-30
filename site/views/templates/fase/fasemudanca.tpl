{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idFase}>0} {$registro.dsFase|default:''}{else} Mudança do Status da Fase{/if}</h1></tt>
            </div>          

            <form name="frm-fasemudanca" 
                  action="/fase/gravar_mudanca" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/fase" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="Gravar" name="btnGravar"/>  
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
                    <div class="col-xs-4">
                        <label for="form-control">Nome do Fase</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsFase|default:''}" >           
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
                            <label for="nomecargo">Colaborador</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                {html_options options=$lista_colaborador selected=$registro.idColaborador}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Fase:</label>
                                 <input type="text" class="form-control obg data" id="dtAbertura" name="dtAbertura" value="{$registro.dtAbertura|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="status">Escolha o novo Status</label>
                            <select class="form-control" name="idStatusFase" id="idStatusFase" >
                                {html_options options=$lista_status selected=$registro.idStatusFase}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-5">
                        <label for="form-control">Observações</label>
                        <input type="text" class="form-control" name="dsObservacao" id="dsObservacao">           
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
<script src="/files/js/fase/fase_novo.js"></script>



{include file="comuns/footer.tpl"}

