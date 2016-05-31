<?php /* Smarty version Smarty-3.1.18, created on 2016-05-31 07:58:49
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/tipoagenda/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:216811746574d6e697737c8-65232173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e9a1dec5ed0a4db761fb29da7373f0c10b2f10e' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/tipoagenda/form_novo.tpl',
      1 => 1464357703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '216811746574d6e697737c8-65232173',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574d6e69832451_30995199',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574d6e69832451_30995199')) {function content_574d6e69832451_30995199($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoAgenda'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTipoAgenda'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Tipo de Agenda<?php }?></h1></tt>
            </div>          

            <form name="frm-tipoagenda" 
                  action="/tipoagenda/gravar_tipoagenda" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <a href="/tipoagenda" class="btn btn-primary"> Voltar</a>
                <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoAgenda'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                            <label for="form-control">Código</label>
                            <input type="text" class="form-control" name="idTipoAgenda" id="idTipoAgenda" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoAgenda'];?>
" READONLY>           
                        <?php } else { ?>
                            <label for="form-control">Código</label>
                            <input type="text" class="form-control" name="idTipoAgenda" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Status da Agenda</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTipoAgenda'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div>    
                    <div class="col-xs-2">
                        <label for="form-control">Código Resumido</label>
                        <input type="text" class="form-control" maxlength="3"  name="dsResumida" id="dsResumida" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsResumida'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div>    
                    <div class="col-xs-2">
                        <label for="form-control">Cor para Diferenciar</label>
                        <input type="text" class="form-control" name="dsCor" id="dsCor" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCor'])===null||$tmp==='' ? '' : $tmp);?>
" >           
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
<script src="/files/js/tipoagenda/tipoagenda_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
