{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{$titulo}</h1></tt>
            </div>          

            <form name="frm-servicomudanca" 
                  action="/servicoprojeto/gravar_mudanca" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/servicoprojeto" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="Gravar" name="btnGravar"/>  
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
                    <div class="col-xs-4">
                        <label for="form-control">Nome do Servico</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsServicoProjeto|default:''}" >           
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
                            <label for="nomeprojeto">Projeto</label>
                            <select class="form-control" name="idProjeto" id="idProjeto">
                                {html_options options=$lista_projeto selected=$registro.idProjeto}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomedafase">Fase</label>
                            <select class="form-control" name="idFase" id="idFase">
                                {html_options options=$lista_fase selected=$registro.idFase}
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
                            <select class="form-control" name="idStatusServico" id="idStatusServico" >
                                {html_options options=$lista_status selected=$registro.idStatusServico}
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
<script src="/files/js/servicoprojeto/servico.js"></script>



{include file="comuns/footer.tpl"}

