<?php /* Smarty version Smarty-3.1.18, created on 2016-02-05 12:05:38
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/tipomovimento/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5682470556b4ac32625a12-91555982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01571afbfd2e153c660d74cb85db36048cb86ce8' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/tipomovimento/form_novo.tpl',
      1 => 1454023391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5682470556b4ac32625a12-91555982',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56b4ac326ce601_96478688',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b4ac326ce601_96478688')) {function content_56b4ac326ce601_96478688($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoMovimento'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTipoMovimento'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Tipos de Movimento<?php }?></h1></tt>
            </div>          
            <a href="/tipomovimento" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-tipomovimento" 
                  action="/tipomovimento/gravar_tipomovimento" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario()">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoMovimento'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idTipoMovimento" id="idTipoMovimento" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idTipoMovimento'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idTipoMovimento" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTipoMovimento'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Entrada ou Saída (E/S)</label>
                        <input type="text" class="form-control" name="stDC" id="stDC" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['stDC'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                </div> 
                <br>            
                    <input type="submit" value="Gravar" name="btnGravar" class="btn btn-primary" />         
                <br>
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
<script src="/files/js/tipomovimento/tipomovimento_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
