<html>
    <head>
        {include file="comuns/head.tpl"}
    </head>
    <body>
        <div id="wrapper">
            <!-- Sidebar -->
            {include file="comuns/sidebar.tpl"}    
            <div id="page-wrapper">
                <!--Altere daqui pra baixo-->

                <h1>Trocar Senha</h1>

                <div class="tab-content">
                    <form name     = "frm_troca_senha" 
                          action   = "/trocar_senha/grava_senha"  
                          method   = "POST" 
                          enctype  = "multipart/form-data"
                          onsubmit = "return validaForm()">


                        <input type="hidden" name="idUsuario" id="idUsuario" value="{$dados.IdUsuario}"/><br>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="nome">NOME DE USUARIO: {$dados.Nome}</label>                           

                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="nova_senha">NOVA SENHA:</label>                           
                                    <input class="form-control" type="password" name="nova_senha" id="nova_senha" onblur="validaSenha()" />
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="conf_nova_senha">CONFIRMA NOVA SENHA:</label>                           
                                    <input class="form-control" type="password" name="conf_nova_senha" id="conf_nova_senha" onblur="validaSenha()" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">                     
                                <input type="submit" class="btn btn-primary" value="Gravar" name="btnGravar" />       
                                <a href="/dashboard" class="btn btn-primary"> Voltar</a>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <script src="/files/js/jquery-1.10.2.js"></script>
        <!--<script src="/files/js/jquery-2.1.1.js"></script>-->
        <script src="/files/js/jquery_ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <!--<script src="/files/js/jquery_ui/js/jquery-ui.min.js"></script>-->
        <script src="/files/js/bootstrap.js"></script>
        <!-- Toast Message -->
        <script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
        <!-- Utils -->
        <script src="/files/js/util.js"></script>
        <!-- JS Especifico do Controller -->
        <script src="/files/js/trocar_senha/troca_senha.js"></script>

        {include file="comuns/footer.tpl"}
    </body>
</html>