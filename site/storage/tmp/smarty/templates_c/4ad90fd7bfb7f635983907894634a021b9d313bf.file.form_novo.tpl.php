<?php /* Smarty version Smarty-3.1.18, created on 2016-02-21 13:56:18
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/conversao/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140547854656c9ec32c3e644-91687692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ad90fd7bfb7f635983907894634a021b9d313bf' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/conversao/form_novo.tpl',
      1 => 1456010214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140547854656c9ec32c3e644-91687692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_unidadeorigem' => 0,
    'lista_unidadedestino' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56c9ec32cc20f0_12018859',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c9ec32cc20f0_12018859')) {function content_56c9ec32cc20f0_12018859($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idConversao'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsConversao'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Fator de Conversao<?php }?></h1></tt>
            </div>          
            <a href="/conversao" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-conversao" 
                  action="/conversao/gravar_conversao" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idConversao'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idConversao" id="idConversao" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idConversao'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idConversao" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome desta Conversao</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsConversao'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="unidadeorigem">Unidade Origem</label>
                            <select class="form-control" name="idUnidadeOrigem" id="idUnidadeOrigem">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_unidadeorigem']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idUnidadeOrigem']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="unidadedestino">Unidade Destino para Conversão</label>
                            <select class="form-control" name="idUnidadeDestino" id="idUnidadeDestino">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_unidadedestino']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idUnidadeDestino']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-1">
                        <label for="form-control">Sinal</label>
                        <input type="text" class="form-control" name="sinal" id="sinal" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['sinal'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Valor</label>
                        <input type="text" class="form-control" name="valordaconversao" id="valordaconversao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['valordaconversao'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                </div>    
                <br>
                  <div class="col-xs-3">
                    <div class="row">
                        <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
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
<script src="/files/js/conversao/conversao_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
