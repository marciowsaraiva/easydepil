<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:41:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10471576895723809905cc07-10461233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aaeb15d0643fe052bc64cca798673145b6ee1c45' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osfinalizadas/form_novo.tpl',
      1 => 1459129737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10471576895723809905cc07-10461233',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idOS' => 0,
    'registro' => 0,
    'lista_colaboradorsolicitante' => 0,
    'lista_setorsolicitante' => 0,
    'lista_setoros' => 0,
    'lista_centrocusto' => 0,
    'lista_colaboradorresponsavel' => 0,
    'lista_tipomanutencao' => 0,
    'lista_tipofalha' => 0,
    'lista_osgrupo' => 0,
    'lista_motivo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572380991643a8_18151954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572380991643a8_18151954')) {function content_572380991643a8_18151954($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Finalizada</h1></tt>
            </div> 
            <div>
                <br>
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/osfinalizadas"  onclick="osfinalizadas.desabilitaid();"> Sair da Tela</a>
                <br>
                <div class="row">
                    <h3> &nbsp; Informações da Ordem de Serviço: </h3>
                    <br>
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="text" class="form-control" name="idOS" id="idOS" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['idOS']->value)===null||$tmp==='' ? '' : $tmp);?>
" READONLY>           
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
                            <select class="form-control" name="idColaboradorSolicitante" READONLY id="idColaboradorSolicitante">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaboradorsolicitante']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorSolicitante']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Setor do Solicitante</label>
                            <select class="form-control" name="idSetorSolicitante" READONLY id="idSetorSolicitante">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setorsolicitante']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetorSolicitante']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Número da O.S.</label>
                         <strong> <input type="text" class="form-control" name="nrOS" READONLY id="nrOS" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrOS'])===null||$tmp==='' ? '' : $tmp);?>
"> </strong>           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Local do Serviço</label>
                            <select class="form-control" name="idSetor" READONLY id="idSetor">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setoros']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetor']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Centro de Custo</label>
                            <select class="form-control" name="idCentroCusto" READONLY id="idCentroCusto">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_centrocusto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idCentroCusto']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>     
                </div> 
                <div class="row">
                    <div class="col-xs-12">
                        <label for="form-control">Descrição do problema</label>
                        <textarea type="text" class="form-control" name="dsProblema"  READONLY id="dsProblema" > <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProblema'])===null||$tmp==='' ? '' : $tmp);?>
 </textarea>
                    </div> 
                </div> 
                </br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Responsável</label>
                            <select class="form-control" name="idColaboradorResponsavel" READONLY id="idColaboradorResponsavel">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaboradorresponsavel']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorResponsavel']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Inicio</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" READONLY name="dtInicio" onblur="os.verhoras();" id="dtInicio" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Termino</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" READONLY name="dtFim" id="dtFim" onblur="os.verhoras();" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtFim'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="manutencao">Tipo de Manutenção</label>
                            <select class="form-control" name="idTipoManutencao" READONLY id="idTipoManutencao">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipomanutencao']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoManutencao']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>        
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="falha">Tipo de Falha</label>
                            <select class="form-control" name="idTipoFalha" READONLY id="idTipoFalha">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipofalha']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoFalha']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Grupo</label>
                            <select class="form-control" name="idOSGrupo" READONLY id="idOSGrupo">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_osgrupo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idOSGrupo']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                </div> 
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="falha">Motivo</label>
                            <select class="form-control" name="idMotivo" READONLY id="idMotivo">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_motivo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idMotivo']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-9">
                        <label for="form-control">Analise da Causa</label>
                        <textarea type="text" class="form-control" name="dsAnaliseCausa" READONLY id="dsAnaliseCausa" > <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsAnaliseCausa'])===null||$tmp==='' ? '' : $tmp);?>
 </textarea>
                    </div> 
                </div>
                <br>
            </div>           
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Informações do Encerramento:</strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_maoobra">
                    <br>
                    <div class="row" >
                        <div class="col-xs-2">
                            <label for="form-control">Data do Encerramento</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtEncerramento" id="dtEncerramento" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtEncerramento'],'%d/%m/%Y h:i:s'))===null||$tmp==='' ? Date("d/m/Y h:i:s") : $tmp);?>
" >           
                        </div> 
                    </div> 
                    <br>
                    <div class="row" >
                        <div class="col-xs-12">
                            <label for="form-control">Recomendações para Manutenção Preventiva (Descrever intervalo sugerido, avaliação a ser feita, etc)</label>
                            <textarea type="text" class="form-control" name="dsRecomendacaoMP" id="dsRecomendacaoMP" > <?php echo $_smarty_tpl->tpl_vars['registro']->value['dsRecomendacaoMP'];?>
  </textarea>
                        </div> 
                    </div> 
                    <br>
                    <div class="row" >
                        <div class="col-xs-10">
                            <label for="form-control">Recomendações para Próxima Manutenção</label>
                            <textarea type="text" class="form-control" name="dsRecomendacaoPM" id="dsRecomendacaoPM" > <?php echo $_smarty_tpl->tpl_vars['registro']->value['dsRecomendacaoPM'];?>
 </textarea>
                        </div> 
                        <div class="col-xs-2">
                            <label for="form-control">Número da OS</label>
                            <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="nrProximaOS" id="nrProximaOS" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['nrProximaOS'];?>
" >           
                        </div> 
                    </div> 
                    <br>
                    <a class="btn btn-primary" id="btn-adicionamaoobra" title="Gravar Informações" onclick="osfinalizadas.gravarosfinalizadas();">Re-Abrir</a> 
                </div>
            </div>   
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da O.S.:</h3>
                <br>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("os/listaocorrencias.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <br>                        
            <div class="row" >
                <h3> &nbsp; Tarefas realizadas nesta Ordem de Serviço<h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("osfinalizadas/ostarefaTarefas.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
     
            <br>                        
            <div class="row" >
                <h3> &nbsp; Maquinas paradas<h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("osfinalizadas/osmaquinaparada.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
            <div class="row" >
                <h3> &nbsp; Insumos utilizados<h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("osfinalizadas/osinsumo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
            <div class="row" >
                <h3> &nbsp; Mão de Obra utilizada<h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("osfinalizadas/osmaoobra.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
            <div class="row" >
                <h3> &nbsp; Maquinas/equipamentos utilizados<h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("osfinalizadas/osmaquina.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
            
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
<script src="/files/js/osfinalizadas/osfinalizadas.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
