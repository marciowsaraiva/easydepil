{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->



        <div class="row">
            <div class="col-lg-12">
                <h1>Novo Log <small></small></h1>
                <a href="/log" class="btn btn-primary" id="btnVoltar"> Voltar</a><br>
            </div>
        </div><!-- /.row -->


        <div class="row">
            <div class="col-lg-6">

                <form name="frm-log" action="/log/gravar_log" method="POST" enctype="multipart/form-data" onsubmit="return validaFormulario()" role="form">
                    <div class="row">
                        <div class="form-group  col-lg-6">
                            <label  class="control-label" for="disabledInput">Código</label>
                            {if {$registro.idLog}>0}                        
                                <input class="form-control" id="disabledInput" type="text" value="{$registro.idLog}" disabled>
                            {else}
                                <input class="form-control" id="disabledInput" type="text" value="Novo Registro" disabled>
                            {/if}
                        </div>          
                        <input type="hidden" name="idLog" value="{$registro.idLog}" />
                        <div class="form-group col-lg-6">
                            <label  class="control-label" for="idUsuario">Usuário</label>
                            {html_options name=idUsuario options=$lista_usuarios class="form-control"}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="idLogTipo">Tipo</label>
                        {html_options name=idLogTipo options=$lista_tipos_log class="form-control" id=idLogTipo}
                    </div>
                    <div class="form-group">
                        <label  class="control-label" for="mensagem">Mensagem</label>
                        <textarea class="form-control" name="mensagem" id="mensagem" rows="3">{$registro.mensagem}</textarea>
                    </div>


                    <input type="hidden" name="stStatus" value="{$registro.stStatus}" />
                    <!-- //Dock das mensagens -->
                    <div id="mensagem-dock"></div>                    
                    <input type="submit" value="Gravar" name="btnGravar" id="btnGravar" class="btn btn-success btn-lg"/>       
                </form>
            </div>     
        </div>
























        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script type="text/javascript" src="/files/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script type="text/javascript" src="/files/js/util.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<script src="/files/js/ion.sound.js"></script>
<!-- JS Especifico do Controller -->
<script src="/files/js/log/log_novo.js"></script>

{include file="comuns/footer.tpl"}

