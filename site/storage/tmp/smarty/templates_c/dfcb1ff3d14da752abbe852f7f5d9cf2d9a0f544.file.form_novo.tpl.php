<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:40:04
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/ostarefa/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1384182597572380543ffb46-96528470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfcb1ff3d14da752abbe852f7f5d9cf2d9a0f544' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/ostarefa/form_novo.tpl',
      1 => 1458771296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1384182597572380543ffb46-96528470',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idOS' => 0,
    'registrotarefa' => 0,
    'registro' => 0,
    'lista_colaboradorsolicitante' => 0,
    'lista_setorsolicitante' => 0,
    'lista_setoros' => 0,
    'lista_tarefa' => 0,
    'lista_insumo' => 0,
    'lista_maoobra' => 0,
    'lista_maquina' => 0,
    'lista_maquinaparada' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723805448bbd4_85631046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723805448bbd4_85631046')) {function content_5723805448bbd4_85631046($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Informar a Tarefa</h1></tt>
            </div> 
            <div>
                <br>
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/ostarefa"  onclick="ostarefa.desabilitaid();"> Sair da Tela</a>
                <input class="btn btn-primary" type="button" onclick="ostarefa.novaostarefa();"  value="  Nova Tarefa" name="btnGravar"/>         
                <input class="btn btn-primary" type="button" onclick="ostarefa.gravarostarefa();"  value="  Gravar Tarefa" name="btnGravar"/>         
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="text" class="form-control" name="idOS" id="idOS" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['idOS']->value)===null||$tmp==='' ? '' : $tmp);?>
" READONLY>           
                            <input type="hidden" class="form-control" name="idOSTarefa" id="idOSTarefa" disabled value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registrotarefa']->value['idOSTarefa'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                        </div>
                    </div>                     
                    <div class="col-xs-1">
                        <label for="form-control">Data</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" READONLY name="dtOS" id="dtOS" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtOS'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <select class="form-control" name="idColaboradorSolicitante" disabled id="idColaboradorSolicitante">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaboradorsolicitante']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorSolicitante']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="setor">Setor do Solicitante</label>
                            <select class="form-control" name="idSetorSolicitante" disabled id="idSetorSolicitante">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setorsolicitante']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetorSolicitante']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Número da O.S.</label>
                         <strong> <input type="text" class="form-control" name="nrOS" id="nrOS" READONLY value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrOS'])===null||$tmp==='' ? '' : $tmp);?>
"> </strong>           
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="setor">Local do Serviço</label>
                            <select class="form-control" name="idSetor" disabled id="idSetor">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setoros']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetor']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                </div> 
                <br>
                <div class="row" >
                    <h3> &nbsp; Informe a Tarefa Realizada:</h3>
                    <br>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="falha">Tarefa</label>
                            <select class="form-control" name="idTarefa" id="idTarefa">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tarefa']->value),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-5">
                        <label for="form-control">Descrição da Tarefa</label>
                        <textarea type="text" class="form-control" name="dsObservacaoTarefa" id="dsObservacaoTarefa"> <?php echo '';?>
</textarea>           
                    </div>   
                    <div class="col-xs-2">
                        <label for="form-control">Tarefa iniciada em</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicioTarefa" id="dtInicioTarefa" value="<?php echo Date("d/m/Y h:i:s");?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Tarefa finalizada em</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFimTarefa" id="dtFimTarefa" value="<?php echo Date("d/m/Y h:i:s");?>
" >           
                    </div>                     
                </div>
            </div>           
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Insumos/Produtos usados nesta tarefa</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_insumo">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="insumo">Insumo/Produto </label>
                                <select class="form-control" name="idInsumo" id="idInsumo" > 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_insumo']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtInsumo" id="qtInsumo" onchange="ostarefa.calcularvalor();" value="">      
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoInsumo" id="dsObservacaoInsumo" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionainsumo" title="Adiciona Insumo" onclick="ostarefa.gravarinsumo();" <?php if ($_smarty_tpl->tpl_vars['registrotarefa']->value['idOSTarefa']=='') {?> disabled <?php }?>  >Adiciona Insumo</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarinsumos">
                         <?php echo $_smarty_tpl->getSubTemplate ("ostarefa/ostarefainsumo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
                    </div>
                </div>
            </div>    
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Mão de obra utilizada nesta tarefa</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Colaborador / Mão de Obra </label>
                                <select class="form-control" name="idColaboradorMO" id="idColaboradorMO"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maoobra']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label for="form-control">Iniciada em</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicioMOTarefa" id="dtInicioMOTarefa" value="<?php echo Date("d/m/Y h:i:s");?>
" >           
                        </div> 
                        <div class="col-xs-2">
                            <label for="form-control">Finalizada em</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFimMOTarefa" id="dtFimMOTarefa" value="<?php echo Date("d/m/Y h:i:s");?>
" >           
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaoObra" id="dsObservacaoMaoObra" value=""> 
                        </div> 
                                
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaoobra" title="Adiciona Mão de Obra" onclick="ostarefa.gravarmaoobra();" <?php if ($_smarty_tpl->tpl_vars['registrotarefa']->value['idOSTarefa']=='') {?> disabled <?php }?>  >Adiciona Mão de Obra</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaodeobra">
                         <?php echo $_smarty_tpl->getSubTemplate ("ostarefa/ostarefamaoobra.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
                    </div>
                </div>
            </div>   
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Maquinas / equipamentos utilizadas nesta tarefa</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Maquina </label>
                                <select class="form-control" name="idMaquinaP" id="idMaquinaP"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquina']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtMaquina" id="qtMaquina" value="">      
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoMaquina" id="dsObservacaoMaquina" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaquina" title="Adiciona Maquina" onclick="ostarefa.gravarmaquina();" <?php if ($_smarty_tpl->tpl_vars['registrotarefa']->value['idOSTarefa']=='') {?> disabled <?php }?>>Adiciona Maquina</a> 
                          </div> 
                        </div> 
                    </div>
                    <div id="mostrarmaquina">
                         <?php echo $_smarty_tpl->getSubTemplate ("ostarefa/ostarefamaquina.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
                    </div>
                </div>
            </div>   
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Maquinas paradas nesta tarefa:</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maoobra">Maquina </label>
                                <select class="form-control" name="idMaquina" id="idMaquina"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquina']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="maquinaparada">Motivo da parada</label>
                                <select class="form-control" name="idMaquinaParada" id="idMaquinaParada"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquinaparada']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label for="form-control">Parada desde</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicio" id="dtInicio" value="<?php echo Date("d/m/Y h:i:s");?>
" >           
                        </div> 
                        <div class="col-xs-2">
                            <label for="form-control">Até</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFim" id="dtFim" value="<?php echo Date("d/m/Y h:i:s");?>
" >           
                        </div> 
                    </div> 
                    <div class="row" >
                        <div class="col-xs-10">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacao" id="dsObservacao" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-2">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionamaqparada" title="Adiciona Informações" onclick="osmaquinaparada.gravarosmaquinaparada();" <?php if ($_smarty_tpl->tpl_vars['registrotarefa']->value['idOSTarefa']=='') {?> disabled <?php }?> >Adiciona Informações</a> 
                          </div> 
                        </div> 
                    </div>
                    <br>
                    <div id="mostrarmaquinaparada">
                         <?php echo $_smarty_tpl->getSubTemplate ("osmaquinaparada/osmaquinaparada.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
                    </div>
                </div>
            </div>   
            <br>
            <div class="row">
                <h3> <strong>Tarefas já realizadas nesta Ordem de Serviço</strong> <h3>
                <div class="form-control" >
                        <div id="mostrartarefas">
                         <?php echo $_smarty_tpl->getSubTemplate ("ostarefa/ostarefaTarefas.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                                            
                    </div>
                </div>
            </div> 
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery.price_format.1.3"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<!-- Toast Message -->
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<!-- Utils -->
<script src="/files/js/util.js"></script>
<script src="/files/js/ostarefa/ostarefa.js"></script>
<script src="/files/js/osmaquinaparada/osmaquinaparada.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
