<?php /* Smarty version Smarty-3.1.18, created on 2016-02-29 21:13:02
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/projetomudanca/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24326280456d4de8e7b0bc0-75862131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a49648a29f090402747415663379a5cce997edc' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/projetomudanca/form_novo.tpl',
      1 => 1456784575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24326280456d4de8e7b0bc0-75862131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_empresa' => 0,
    'lista_colaborador' => 0,
    'lista_status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56d4de8e835982_43298472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d4de8e835982_43298472')) {function content_56d4de8e835982_43298472($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjeto'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProjeto'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Mudança do Status da Projeto<?php }?></h1></tt>
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
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjeto'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProjeto" id="idProjeto" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjeto'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProjeto" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Nome do Projeto</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProjeto'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomesetor">Empresa</label>
                            <select class="form-control" name="idEmpresa" id="idEmpresa">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_empresa']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idEmpresa']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Colaborador</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaborador']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaborador']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Projeto:</label>
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
                            <select class="form-control" name="idStatusProjeto" id="idStatusProjeto" >
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_status']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idStatusProjeto']),$_smarty_tpl);?>

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



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
