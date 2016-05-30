<?php /* Smarty version Smarty-3.1.18, created on 2016-05-29 17:24:25
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/profissional/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1268287418574b4ff93a0516-69053718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34e9a1a320a9516a2cd2e3aaddf9d4b2c5f8e805' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/profissional/form_novo.tpl',
      1 => 1464451673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1268287418574b4ff93a0516-69053718',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_fazparte' => 0,
    'lista_usuarios' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574b4ff93f2091_72447234',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574b4ff93f2091_72447234')) {function content_574b4ff93f2091_72447234($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProfissional'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProfissional'])===null||$tmp==='' ? '' : $tmp);?>
 <?php } else { ?> Inclus&atilde;o de Profissionales<?php }?></h1></tt>
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
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProfissional'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProfissional" id="idProfissional" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idProfissional'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProfissional" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Nome do Profissional</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProfissional'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Celular:</label>
                                 <input type="text" class="form-control" id="dsCelular" name="dsCelular" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCelular'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">EMail:</label>
                                 <input type="text" class="form-control" id="dsEmail" name="dsEmail" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsEmail'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                        </div>
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="fazparteagenda">Faz Parte de Agenda de Serviços</label>
                            <select class="form-control" name="stFazParteAgenda" id="stFazParteAgenda">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_fazparte']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['stFazParteAgenda']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Quantidade de Horas/Dia</label>
                                 <input type="text" class="form-control" id="qtHorasDia" name="qtHorasDia" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['qtHorasDia'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="form-control">Cargo/Especialização</label>
                        <input type="text" class="form-control" name="dsCargo" id="dsCargo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCargo'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="usuario">Usuário</label>
                            <select class="form-control" name="idUsuario" id="idUsuario">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_usuarios']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idUsuario']),$_smarty_tpl);?>

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



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
