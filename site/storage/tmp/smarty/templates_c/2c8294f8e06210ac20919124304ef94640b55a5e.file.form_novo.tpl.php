<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 19:27:31
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/insumo/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124395800456f0755392c1f8-06102376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c8294f8e06210ac20919124304ef94640b55a5e' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/insumo/form_novo.tpl',
      1 => 1458599165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124395800456f0755392c1f8-06102376',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_unidade' => 0,
    'lista_grupo' => 0,
    'lista_modelo' => 0,
    'lista_marca' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56f0755399b243_35470016',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f0755399b243_35470016')) {function content_56f0755399b243_35470016($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idInsumo'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsInsumo'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Insumos<?php }?></h1></tt>
            </div>          
            <a href="/insumo" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-insumo" 
                  action="/insumo/gravar_insumo" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idInsumo'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idInsumo" id="idInsumo" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idInsumo'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idInsumo" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Insumo</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsInsumo'])===null||$tmp==='' ? '' : $tmp);?>
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
                            <label for="grupoinsumo">Grupo do Insumo</label>
                            <select class="form-control" name="idGrupo" id="idGrupo">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_grupo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idGrupo']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <select class="form-control" name="idModelo" id="idModelo">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_modelo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idModelo']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <select class="form-control" name="idMarca" id="idMarca">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_marca']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idMarca']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                </div>    
                <br>
                <div class="row">
                    <div class="col-xs-4">
                        <label for="form-control">Número de série</label>
                        <input type="text" class="form-control" name="nrSerie" id="nrSerie" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrSerie'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Código do Fabricante</label>
                        <input type="text" class="form-control" name="dsCodigoDoFabricante" id="dsCodigoDoFabricante" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCodigoDoFabricante'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Estoque mínimo</label>
                        <input type="text" class="form-control" name="qtMinima" id="qtMinima" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['qtMinima'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Lote de Reposição</label>
                        <input type="text" class="form-control" name="qtLoteReposicao" id="qtLoteReposicao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['qtLoteReposicao'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Valor Unitário</label>
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
<script src="/files/js/insumo/insumo_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
