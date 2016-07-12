{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idTipoTratamento}>0} {$registro.dsTipoTratamento|default:''} {else} Inclus&atilde;o de Tipos de Tratamentos {/if}</h1></tt>
            </div>          
            <a href="/tipotratamento" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-tipotratamento" 
                  action="/tipotratamento/gravar_tipotratamento" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="input-group col-lg-8">                    
                    {if {$registro.idTipoTratamento}>0}
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                            <input type="text" class="form-control" name="idTipoTratamento" id="idTipoTratamento" value="{$registro.idTipoTratamento}" READONLY>           
                    {else}
                        <span class="input-group-addon btn-outline btn-primary">Código</span>
                              <input type="text" class="form-control" name="idTipoTratamento" value="" READONLY>           
                    {/if}                     
                    <span class="input-group-addon btn-outline btn-primary">Descri&ccedil;&atilde;o</span>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsTipoTratamento|default:''}" >           
                </div> 
                <br>            
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
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
<script src="/files/js/tipotratamento/tipotratamento_novo.js"></script>



{include file="comuns/footer.tpl"}

