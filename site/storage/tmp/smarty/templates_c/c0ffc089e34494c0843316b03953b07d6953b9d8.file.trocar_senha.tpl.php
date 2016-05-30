<?php /* Smarty version Smarty-3.1.18, created on 2016-01-21 18:46:22
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/usuarios/trocar_senha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186094481456a1439eaf5153-24187311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0ffc089e34494c0843316b03953b07d6953b9d8' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/usuarios/trocar_senha.tpl',
      1 => 1453221311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186094481456a1439eaf5153-24187311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dados' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56a1439eb334d1_55819665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a1439eb334d1_55819665')) {function content_56a1439eb334d1_55819665($_smarty_tpl) {?><html>
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </head>
    <body>
        <div id="wrapper">
            <!-- Sidebar -->
            <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
            <div id="page-wrapper">
                <!--Altere daqui pra baixo-->

                <h1>Trocar Senha</h1>

                <div class="tab-content">
                    <form name     = "frm_troca_senha" 
                          action   = "/trocar_senha/grava_senha"  
                          method   = "POST" 
                          enctype  = "multipart/form-data"
                          onsubmit = "return validaForm()">


                        <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['IdUsuario'];?>
"/><br>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="nome">NOME DE USUARIO: <?php echo $_smarty_tpl->tpl_vars['dados']->value['Nome'];?>
</label>                           

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

        <?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html><?php }} ?>
