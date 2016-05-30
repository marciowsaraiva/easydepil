<?php /* Smarty version Smarty-3.1.18, created on 2016-02-29 21:10:43
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/servicomudanca.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77806828056d4de036d15b9-02990151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83599aca89a7faaa4d7bf85ac109df0ced8f1d2a' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/servicomudanca.tpl',
      1 => 1456787300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77806828056d4de036d15b9-02990151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo' => 0,
    'registro' => 0,
    'lista_projeto' => 0,
    'lista_fase' => 0,
    'lista_status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56d4de03717f44_62045867',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d4de03717f44_62045867')) {function content_56d4de03717f44_62045867($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1></tt>
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
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjetoServico'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProjetoServico" id="idProjetoServico" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjetoServico'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProjetoServico" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Nome do Servico</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsServicoProjeto'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomeprojeto">Projeto</label>
                            <select class="form-control" name="idProjeto" id="idProjeto">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projeto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idProjeto']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomeprojeto">Projeto</label>
                            <select class="form-control" name="idProjeto" id="idProjeto">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projeto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idProjeto']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomedafase">Fase</label>
                            <select class="form-control" name="idFase" id="idFase">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_fase']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idFase']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Fase:</label>
                                 <input type="text" class="form-control obg data" id="dtAbertura" name="dtAbertura" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtAbertura'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="status">Escolha o novo Status</label>
                            <select class="form-control" name="idStatusServico" id="idStatusServico" >
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_status']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idStatusServico']),$_smarty_tpl);?>

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



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
