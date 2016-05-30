<?php /* Smarty version Smarty-3.1.18, created on 2016-01-28 19:25:15
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/fornecedor/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24282958256aa873b1da2c7-77885341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd2661c92545dba2334ab8c45dcd868f93095a22' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/fornecedor/form_novo.tpl',
      1 => 1454016003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24282958256aa873b1da2c7-77885341',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_tipo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56aa873b2b3489_19999234',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56aa873b2b3489_19999234')) {function content_56aa873b2b3489_19999234($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idFornecedor'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsFornecedor'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Fornecedores<?php }?></h1></tt>
            </div>          
            <a href="/fornecedor" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-fornecedor" 
                  action="/fornecedor/gravar_fornecedor" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idFornecedor'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idFornecedor" id="idFornecedor" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idFornecedor'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idFornecedor" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Fornecedor</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsFornecedor'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">C.N.P.J</label>
                        <input type="text" class="form-control" name="cdCNPJ" id="cdCNPJ" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['cdCNPJ'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Endereço</label>
                        <input type="text" class="form-control" name="dsEndereco" id="dsEndereco" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsEndereco'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Cidade</label>
                        <input type="text" class="form-control" name="dsCidade" id="dsCidade" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCidade'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                </div>  
                <br>                    
                <div class="row">
                    <div class="col-xs-1">
                        <label for="form-control">C.E.P</label>
                        <input type="text" class="form-control" name="cdCEP" id="cdCEP" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['cdCEP'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">U.F</label>
                        <input type="text" class="form-control" name="cdUF" id="cdUF" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['cdUF'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Contato</label>
                        <input type="text" class="form-control" name="dsContato" id="dsContato" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsContato'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Fone</label>
                        <input type="text" class="form-control" name="dsFone" id="dsFone" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsFone'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Celular</label>
                        <input type="text" class="form-control" name="dsCelular" id="dsCelular" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCelular'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">E-Mail</label>
                        <input type="text" class="form-control" name="dsEmail" id="dsEmail" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsEmail'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                </div>    
                <br>                    
                <div class="row">
                    <div class="col-xs-2">
                        <label for="form-control">Site</label>
                        <input type="text" class="form-control" name="dsSite" id="dsSite" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsSite'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomemaoobra">Tipo de Mão de Obra</label>
                            <select class="form-control" name="idTipoFornecedor" id="idTipoFornecedor">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoFornecedor']),$_smarty_tpl);?>

                            </select>                      
                        </div>
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
<script src="/files/js/fornecedor/fornecedor_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
