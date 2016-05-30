<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:40:22
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osmaquinaparada/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2045947695572380668f86d4-26571999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '930f4ee9b0820fc57ba5b67bf1de68f243dcb12a' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osmaquinaparada/form_novo.tpl',
      1 => 1458776127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2045947695572380668f86d4-26571999',
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
    'lista_maquina' => 0,
    'lista_maquinaparada' => 0,
    'lista_tarefas' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723806698f674_86301185',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723806698f674_86301185')) {function content_5723806698f674_86301185($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Informar Maquina Parada</h1></tt>
            </div> 
            <div>
                <br>
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/osmaquinaparada"  onclick="osmaquinaparada.desabilitaid();"> Sair da Tela</a>
                <input class="btn btn-primary" type="button" onclick="osmaquinaparada.novaosmaquinaparada();"  value="  Nova Tarefa" name="btnGravar"/>         
                <input class="btn btn-primary" type="button" onclick="osmaquinaparada.gravarosmaquinaparada();"  value="  Gravar Tarefa" name="btnGravar"/>         
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
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
            </div>           
            <br>
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>Maquinas paradas nesta ordem de serviço:</strong> <h3>
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
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="maquinaparada">Motivo da parada</label>
                                <select class="form-control" name="idMaquinaParada" id="idMaquinaParada"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maquinaparada']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="tarefa">Tarefa</label>
                                <select class="form-control" name="idOSTarefa" id="idOSTarefa">
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tarefas']->value),$_smarty_tpl);?>

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
                              <a class="btn btn-primary" id="btn-adicionamaoobra" title="Adiciona Informações" onclick="osmaquinaparada.gravarosmaquinaparada();"   >Adiciona Informações</a> 
                          </div> 
                        </div> 
                    </div>
                    <br>
                    <div id="mostrarmaquinaparada">
                         <?php echo $_smarty_tpl->getSubTemplate ("osmaquinaparada/osmaquinaparada.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                        
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
<script src="/files/js/osmaquinaparada/osmaquinaparada.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
