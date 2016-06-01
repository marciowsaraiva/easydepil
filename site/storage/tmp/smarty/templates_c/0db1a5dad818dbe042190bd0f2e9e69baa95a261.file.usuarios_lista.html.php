<?php /* Smarty version Smarty-3.1.18, created on 2016-06-01 15:21:09
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/usuarios/usuarios_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:1964795548574f27952d2d55-03878851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0db1a5dad818dbe042190bd0f2e9e69baa95a261' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/usuarios/usuarios_lista.html',
      1 => 1453411235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1964795548574f27952d2d55-03878851',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscamensagem' => 0,
    'usuarios_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574f2795352cd8_21775970',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f2795352cd8_21775970')) {function content_574f2795352cd8_21775970($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
      <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel panel-default">
         
            <h1>Lista de Usu&aacute;rios</h1>
            <div id="mensagem-dock"></div>
            <!-- //Dock das mensagens -->
                <div id="box-mensagem-usuario" class="alert alert-info alert-dismissable hidden">
                    <div class="bs-example">
                        <h3 id="progress-animated">Por favor aguarde enquanto estou excluindo os logs pra você :)</h3>
                        <div class="progress progress-striped active">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    </div>   
                </div>       
                
            <div class="panel-default">   
                <div class="panel-footer">
                    <form name="frm-busca-usuario" action="/usuarios/busca_usuario" method="POST" enctype="multipart/form-data">
                        Nome:
                        <div class="input-group">
                            <input type="text" class="form-control" id="buscamensagem" name="buscamensagem" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscamensagem']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">Buscar</button>
                            </span>          
                        </div><!-- /input-group -->
                        <div class="input-group">
                            <div id="msg_helper"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>  
            
        <a href="/usuarios/novo_usuario" id="btnNovoUsuario" class="btn btn-primary">Novo Usu&aacute;rio</a>             
<!--        <a href="#" id="btnZeraUsuarios" class="btn btn-danger" onclick="confirma_zeratudo()">Excluir Todos os Usu&aacute;rios</a> 
        <a href="/usuarios/usuario_navegacao" id="btnNovoUsuario" class="btn btn-primary">Exemplo de Navega&ccedil;&otilde;o</a> -->
        
<!--        <a href="/usuarios/novo_usuario" class="btn btn-primary">Novo Usu&aacute;rio</a>-->
        <br><br>
<!--        <div class="progress">
            <div id="progressbar1" class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                
            </div>
        </div>

        <br>
        <div id="flip2">Mostra a Tabela</div>
        
        <div class="btn-group">
          <button type="button" class="btn btn-default" id="btn1" >Mostra a Tabela</button>
          <button type="button" class="btn btn-default" id="btn2">Ocuta a Tabela</button>
          <button type="button" class="btn btn-default" id="btn3">Oculta</button>
          <button type="button" class="btn btn-default" id="btn4">(+)</button>
          <button type="button" class="btn btn-default" id="btn5">(-)</button>
          <button type="button" class="btn btn-default" id="btn6">Liga Timer</button>
          <button type="button" class="btn btn-default" id="btn7">Clear Timer</button>
          <button type="button" class="btn btn-default" id="btn8">Foco na Mensagem</button>
          
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" id="btn9">Ajax Get</button>
                    <button type="button" class="btn btn-default" id="btn10">Ajax Contador</button>                   
                    <button type="button" class="btn btn-default" id="btn11">Ajax Processamento no Servidor</button>
                </div>
                <div id="panel2">
                    
                </div>
            </div>
        </div>-->
        
        <div id="painel">
            <table border="1" class="table table-striped" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>email</th>
                        <th>Tipo</th>
                        <th>Telefone 1</th>
                        <th>Telefone 2</th>
                        <th>A&ccedil;&otilde;es</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                    <tr>
                        <td><a href="/usuarios/novo_usuario/idUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idUsuario'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idUsuario'];?>
</a></td>
                        <td><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['linha']->value['dsUsuario'], 'UTF-8');?>
</td>
                        <td><?php echo mb_strtolower($_smarty_tpl->tpl_vars['linha']->value['email'], 'UTF-8');?>
</td>
                        <td><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['linha']->value['descricao'], 'UTF-8');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['telefone1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['telefone2'];?>
</td>

                        <td> <a class="glyphicon glyphicon-pencil" href="/usuarios/novo_usuario/idUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idUsuario'];?>
">Editar</a> |
                            <a class="glyphicon glyphicon-trash" href="/usuarios/del_usuario/idUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idUsuario'];?>
">Excluir</a> </td>
                    </tr>
                    <?php } ?>        
                </tbody>
            </table>
        </div>

<!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/usuarios/usuario_lista.js"></script>
<script src="/files/js/bootbox.min.js"></script>
<script src="/files/js/util.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
