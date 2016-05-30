<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:42:55
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/maoobra/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:673182820572380ffd9e034-31753629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41ee885a351ad2c17b9f442b67e4aa16eca15ff3' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/maoobra/form_novo.tpl',
      1 => 1458597976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '673182820572380ffd9e034-31753629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_unidade' => 0,
    'lista_tipomaodeobra' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572380ffe143a1_94308369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572380ffe143a1_94308369')) {function content_572380ffe143a1_94308369($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idMaoObra'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsMaoObra'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de MaoObras<?php }?></h1></tt>
            </div>          
            <a href="/maoobra" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-maoobra" 
                  action="/maoobra/gravar_maoobra" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idMaoObra'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idMaoObra" id="idMaoObra" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idMaoObra'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idMaoObra" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome da Mao de Obra</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsMaoObra'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="unidade">Unidade</label>
                            <select class="form-control" name="idUnidade" id="idUnidade">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_unidade']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idUnidade']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>     
                            
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="tipomaoobra">Tipo de Mao de Obra</label>
                            <select class="form-control" name="idTipoMaoObra" id="idTipoMaoObra">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipomaodeobra']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoMaoObra']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <label for="form-control">Valor da Unidade da Mao de Obra</label>
                        <input type="text" class="form-control" name="vlUnitario" id="vlUnitario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vlUnitario'])===null||$tmp==='' ? '' : $tmp);?>
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
<script src="/files/js/maoobra/maoobra_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
