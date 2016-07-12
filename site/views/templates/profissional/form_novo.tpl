{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idProfissional}>0} {$registro.dsProfissional|default:''} {else} Inclus&atilde;o de Profissionales{/if}</h1></tt>
            </div>          

            <form name="frm-profissional" 
                  action="/profissional/gravar_profissional" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/profissional" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idProfissional}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProfissional" id="idProfissional" value="{$registro.idProfissional}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProfissional" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Nome do Profissional</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsProfissional|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Celular:</label>
                                 <input type="text" class="form-control" id="dsCelular" name="dsCelular" value="{$registro.dsCelular|default:''}" >           
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">EMail:</label>
                                 <input type="text" class="form-control" id="dsEmail" name="dsEmail" value="{$registro.dsEmail|default:''}" >           
                        </div>
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="fazparteagenda">Faz Parte de Agenda de Serviços</label>
                            <select class="form-control" name="stFazParteAgenda" id="stFazParteAgenda">
                                {html_options options=$lista_fazparte selected=$registro.stFazParteAgenda}
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Quantidade de Horas/Dia</label>
                                 <input type="text" class="form-control" id="qtHorasDia" name="qtHorasDia" value="{$registro.qtHorasDia|default:''}" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="form-control">Cargo/Especialização</label>
                        <input type="text" class="form-control" name="dsCargo" id="dsCargo" value="{$registro.dsCargo|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="usuario">Usuário</label>
                            <select class="form-control" name="idUsuario" id="idUsuario">
                                {html_options options=$lista_usuarios selected=$registro.idUsuario}
                            </select>                      
                        </div>
                    </div>
                </div>    
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
<script src="/files/js/profissional/profissional_novo.js"></script>



{include file="comuns/footer.tpl"}

