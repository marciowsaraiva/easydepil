<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:43:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servico/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181874238157238111d7e2c7-48524837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b77b7b814e37fb207f61e54ca5ba4a5ccce434a' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servico/form_novo.tpl',
      1 => 1456687094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181874238157238111d7e2c7-48524837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_unidade' => 0,
    'lista_tiposervico' => 0,
    'totalservico' => 0,
    'lista_insumo' => 0,
    'lista_maoobra' => 0,
    'lista_maquina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57238111e15f49_58877220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57238111e15f49_58877220')) {function content_57238111e15f49_58877220($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idServico'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsServico'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Servicos<?php }?></h1></tt>
            </div>          
            <form name="frm-servico" 
                  action="/servico/gravar_servico" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/servico" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idServico'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idServico" id="idServico" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idServico'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idServico" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Servico</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsServico'])===null||$tmp==='' ? '' : $tmp);?>
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
                            <label for="tiposervico">Tipo de Servico</label>
                            <select class="form-control" name="idTipoServico" id="idTipoServico">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tiposervico']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoServico']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <label for="form-control">Observacao</label>
                        <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsObservacao'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Valor do Serviço</label>
                        <input type="text" class="form-control" name="vlOrcado" id="vlOrcado" value="R$ <?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalservico']->value)===null||$tmp==='' ? '' : $tmp);?>
" disabled >           
                    </div> 
                </div> 
            </form>
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>INSUMOS / PRODUTOS</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_insumo">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Insumos para este Serviço</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="insumo">Insumo/Produto </label>
                                <select class="form-control" name="idInsumo" id="idInsumo"  onchange="lerunidade();"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_insumo']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Unidade</label>
                            <input type="text" class="form-control" name="dsUnidadeInsumo" id="dsUnidadeInsumo" disabled='disabled' value="">       
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtInsumo" id="qtInsumo" onchange="calcularvalor();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Unitário</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioInsumo" readonly  id="vlUnitarioInsumo" value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalInsumo" id="vlTotalInsumo" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoInsumo" id="dsObservacaoInsumo" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionainsumo" title="Adiciona Insumo" onclick="gravarinsumo();" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idServico']=='') {?> disabled <?php }?>  >Adiciona Insumo</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarinsumos">
                         <?php echo $_smarty_tpl->getSubTemplate ("servico/servicoinsumo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                </div>
            </div>    
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>MÃO DE OBRA</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Mão de Obra para este Serviço</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Mão de Obra </label>
                                <select class="form-control" name="idMaoObra" id="idMaoObra"  onchange="lerunidademo();"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maoobra']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Unidade</label>
                            <input type="text" class="form-control" name="dsUnidadeMaoObra" id="dsUnidadeMaoObra" disabled='disabled' value="">       
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtMaoObra" id="qtMaoObra" onchange="calcularvalormo();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Unitário</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioMaoObra" readonly  id="vlUnitarioMaoObra" value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalMaoObra" id="vlTotalMaoObra" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaoObra" id="dsObservacaoMaoObra" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaoobra" title="Adiciona Mão de Obra" onclick="gravarmaoobra();" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idServico']=='') {?> disabled <?php }?>  >Adiciona Mão de Obra</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaodeobra">
                        <?php echo $_smarty_tpl->getSubTemplate ("servico/servicomaoobra.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                </div>
            </div>   
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>MAQUINAS / EQUIPAMENTOS</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Maquinas / Equipamentos para este Serviço</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Maquina </label>
                                <select class="form-control" name="idMaquina" id="idMaquina"  onchange="lerunidademaquina();"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquina']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Unidade</label>
                            <input type="text" class="form-control" name="dsUnidadeMaquina" id="dsUnidadeMaquina" disabled='disabled' value="">       
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtMaquina" id="qtMaquina" onchange="calcularvalormaquina();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Unitário</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioMaquina" readonly  id="vlUnitarioMaquina" value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalMaquina" id="vlTotalMaquina" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaquina" id="dsObservacaoMaquina" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaquina" title="Adiciona Maquina" onclick="gravarmaquina();" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idServico']=='') {?> disabled <?php }?>>Adiciona Maquina</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaquina">
                        <?php echo $_smarty_tpl->getSubTemplate ("servico/servicomaquina.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                </div>
            </div>   

                
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
<script src="/files/js/servico/servico.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
