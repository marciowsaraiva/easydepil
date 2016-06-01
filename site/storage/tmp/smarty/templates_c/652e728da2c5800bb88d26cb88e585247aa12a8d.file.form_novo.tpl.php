<?php /* Smarty version Smarty-3.1.18, created on 2016-06-01 15:08:12
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/tratamento/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:330691826574f248c501a46-78942846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '652e728da2c5800bb88d26cb88e585247aa12a8d' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/tratamento/form_novo.tpl',
      1 => 1464785324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '330691826574f248c501a46-78942846',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_tipotratamento' => 0,
    'lista_receita' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574f248c54b6a2_87272905',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f248c54b6a2_87272905')) {function content_574f248c54b6a2_87272905($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTratamento'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTratamento'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Tratamentos<?php }?></h1></tt>
            </div>          
            <a href="/tratamento" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-tratamento" 
                  action="/tratamento/gravar_tratamento" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idTratamento'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idTratamento" id="idTratamento" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idTratamento'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idTratamento" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Tratamento</label>
                        <input type="text" class="form-control" name="dsTratamento" id="dsTratamento" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTratamento'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="grupotratamento">Tipo de Tratamento</label>
                            <select class="form-control" name="idTipoTratamento" id="idTipoTratamento">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipotratamento']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoTratamento']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Valor</label>
                        <input type="text" class="form-control" name="vlTratamento" id="vlTratamento" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vlTratamento'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Tempo por sessão</label>
                        <input type="text" class="form-control" name="dsTempo" id="dsTempo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTempo'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="receita">Codigo Receita</label>
                            <select class="form-control" name="idReceita" id="idReceita">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_receita']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idReceita']),$_smarty_tpl);?>

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
<script src="/files/js/tratamento/tratamento_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
