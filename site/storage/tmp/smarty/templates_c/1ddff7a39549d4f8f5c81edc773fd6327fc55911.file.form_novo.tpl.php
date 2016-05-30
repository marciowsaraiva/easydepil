<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 10:24:57
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/maquina/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12650749495741b329746da9-19269085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ddff7a39549d4f8f5c81edc773fd6327fc55911' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/maquina/form_novo.tpl',
      1 => 1458597976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12650749495741b329746da9-19269085',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_maquina' => 0,
    'lista_modelo' => 0,
    'lista_marca' => 0,
    'lista_grupocusto' => 0,
    'lista_setor' => 0,
    'lista_unidade' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741b329803b38_29922223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741b329803b38_29922223')) {function content_5741b329803b38_29922223($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idMaquina'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsMaquina'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Maquinas<?php }?></h1></tt>
            </div>          
            <a href="/maquina" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-maquina" 
                  action="/maquina/gravar_maquina" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idMaquina'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idMaquina" id="idMaquina" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idMaquina'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idMaquina" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Maquina</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsMaquina'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="maquinapai">Máquina mãe</label>
                            <select class="form-control" name="idMaquinaPai" id="idMaquinaPai">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquina']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idMaquinaPai']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
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
                    <div class="col-xs-2">
                        <label for="form-control">Número de série</label>
                        <input type="text" class="form-control" name="nrSerie" id="nrSerie" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrSerie'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                </div>    
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <label for="form-control">Código do Fabricante</label>
                        <input type="text" class="form-control" name="dsCodigoDoFabricante" id="dsCodigoDoFabricante" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCodigoDoFabricante'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Caracteristicas</label>
                        <input type="text" class="form-control" name="dsCaracteristicas" id="dsCaracteristicas" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCaracteristicas'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="grupocusto">Grupo de Custo</label>
                            <select class="form-control" name="idGrupoCusto" id="idGrupoCusto">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_grupocusto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idGrupoCusto']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                            
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Setor</label>
                            <select class="form-control" name="idSetor" id="idSetor">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setor']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetor']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="unidade">Unidade</label>
                            <select class="form-control" name="idUnidade" id="idUnidade">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_unidade']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idUnidade']),$_smarty_tpl);?>

                            </select>                      
                        </div>
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
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da Máquina:</h3>
                <br>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("maquina/listaocorrencias.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
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
<script src="/files/js/maquina/maquina_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
