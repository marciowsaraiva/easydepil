{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idProjeto}>0} {$registro.dsProjeto|default:''}{else} Mudança do Status da Projeto{/if}</h1></tt>
            </div>          

            <form name="frm-projetomudanca" 
                  action="/projetomudanca/gravar_projeto" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/projeto" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="Gravar" name="btnGravar"/>  
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
                    <div class="col-xs-4">
                        <label for="form-control">Nome do Projeto</label>
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
                            <label for="nomecargo">Colaborador</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                {html_options options=$lista_colaborador selected=$registro.idColaborador}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Projeto:</label>
                                 <input type="text" class="form-control obg data" id="dtAbertura" name="dtAbertura" value="{$registro.dtAbertura|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="status">Escolha o novo Status</label>
                            <select class="form-control" name="idStatusProjeto" id="idStatusProjeto" >
                                {html_options options=$lista_status selected=$registro.idStatusProjeto}
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
<script src="/files/js/projeto/projeto_novo.js"></script>



{include file="comuns/footer.tpl"}

