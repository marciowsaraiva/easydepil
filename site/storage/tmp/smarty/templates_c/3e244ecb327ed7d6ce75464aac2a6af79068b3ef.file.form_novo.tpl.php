<?php /* Smarty version Smarty-3.1.18, created on 2016-03-31 20:16:32
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/manutprevincluir/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109355424656fdafd039fb52-26924447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e244ecb327ed7d6ce75464aac2a6af79068b3ef' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/manutprevincluir/form_novo.tpl',
      1 => 1459466110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109355424656fdafd039fb52-26924447',
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
  'unifunc' => 'content_56fdafd0427d51_08278603',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56fdafd0427d51_08278603')) {function content_56fdafd0427d51_08278603($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Inclusão de Agenda para Manutenção Preventiva</h1></tt>
            </div>          
            <a href="/maquina" class="btn btn-primary"> Voltar</a>

            <br>
            <div class="row">
                <div class="col-xs-1">
                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idMaquina'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?>
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
" READONLY>           
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="maquinapai">Máquina mãe</label>
                        <select class="form-control" name="idMaquinaPai" id="idMaquinaPai" READONLY>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquina']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idMaquinaPai']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <select class="form-control" name="idModelo" id="idModelo" READONLY>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_modelo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idModelo']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <select class="form-control" name="idMarca" id="idMarca" READONLY>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_marca']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idMarca']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div> 
                <div class="col-xs-2">
                    <label for="form-control">Número de série</label>
                    <input type="text" class="form-control" name="nrSerie" id="nrSerie" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrSerie'])===null||$tmp==='' ? '' : $tmp);?>
" READONLY >           
                </div> 
            </div>    
            <br>
            <div class="row">
                <div class="col-xs-2">
                    <label for="form-control">Código do Fabricante</label>
                    <input type="text" class="form-control" name="dsCodigoDoFabricante" id="dsCodigoDoFabricante" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCodigoDoFabricante'])===null||$tmp==='' ? '' : $tmp);?>
" READONLY >           
                </div> 
                <div class="col-xs-2">
                    <label for="form-control">Caracteristicas</label>
                    <input type="text" class="form-control" name="dsCaracteristicas" id="dsCaracteristicas" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsCaracteristicas'])===null||$tmp==='' ? '' : $tmp);?>
" READONLY >           
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="grupocusto">Grupo de Custo</label>
                        <select class="form-control" name="idGrupoCusto" id="idGrupoCusto" READONLY>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_grupocusto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idGrupoCusto']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div> 

                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="setor">Setor</label>
                        <select class="form-control" name="idSetor" id="idSetor" READONLY>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setor']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetor']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div> 
                <div class="col-xs-2">
                    <div class="form-group">
                        <label for="unidade">Unidade</label>
                        <select class="form-control" name="idUnidade" id="idUnidade" READONLY>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_unidade']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idUnidade']),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>                     
                <div class="col-xs-2">
                    <label for="form-control">Valor Unitário</label>
                    <input type="text" class="form-control" name="vlUnitario" id="vlUnitario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vlUnitario'])===null||$tmp==='' ? '' : $tmp);?>
" READONLY >           
                </div>                             
            </div> 
            <br>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="form-control">Horário</label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"> Semana &nbsp <input type="checkbox" name="todasSemanas" value="ON" /></label>
                            </div>
                            <div class="col-xs-4">
                                <label for="form-control"> Dias &nbsp <input type="checkbox" name="todasSemanas" value="ON" /></label>
                            </div>
                            <div class="col-xs-1">
                                <label for="form-control"> Mêses &nbsp <input type="checkbox" name="todasSemanas" value="ON" /></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0" value="ON" /> &nbsp 00:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 06:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 12:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 18:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp Segunda </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 01 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 09 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 17 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 25 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Janeiro </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" />&nbsp Maio </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Setembro </label>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0" value="ON" /> &nbsp 00:30 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 07:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 13:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp 19:00 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="hora0630" value="ON" /> &nbsp Terça </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 02 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 10 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 18 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="dia01" value="ON" /> &nbsp 26 </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" />  &nbsp Fevereiro </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Junho </label>
                            </div>                             
                            <div class="col-xs-1">
                                <label for="form-control"><input type="checkbox" name="janeiro" value="ON" /> &nbsp Outubro  </label>
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da Máquina:</h3>
                <br>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("manutprevincluir/listaocorrencias.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
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
<script src="/files/js/manutprevincluir/maquina_novo.js"></script>


<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
