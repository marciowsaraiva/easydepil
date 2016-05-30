<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:37:28
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/os/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15628180245741d23849ba45-88355947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57d28142b1eff5f4a56e20e2967d65fd5e0c161f' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/os/form_novo.tpl',
      1 => 1459044808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15628180245741d23849ba45-88355947',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5741d23851a149_07424335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741d23851a149_07424335')) {function content_5741d23851a149_07424335($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço</h1></tt>
            </div> 
            <form name="frm-grava-os" action="/os/gravar_os" method="POST" enctype="multipart/form-data">
                <br>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <a class="btn btn-primary" id="btn-novaos" title="Clique aqui para começar uma nova O.S" onclick="os.novaos();">Nova O.S</a> 
                <a class="btn btn-primary" id="btn-sairtela" title="Clique aqui para sair da tela e voltar a lista de O.S." href="/os"  onclick="os.desabilitaid();"> Sair da Tela</a><br>                
                <br>
                <div class="row">
                    <h3> &nbsp; Informações do Cabeçalho: </h3>
                    <br>
                    <input type="hidden" class="form-control" name="idColaboradorEscolhido" id="idColaboradorEscolhido">
                    
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="pedido">Código</label>
                            <input type="text" class="form-control" name="idOS" id="idOS" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['idOS']->value)===null||$tmp==='' ? '' : $tmp);?>
" READONLY>           
                        </div>
                    </div>                     
                    <div class="col-xs-1">
                        <label for="form-control">Data</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtOS" id="dtOS" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtOS'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <select class="form-control" name="idColaboradorSolicitante" id="idColaboradorSolicitante">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaboradorsolicitante']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorSolicitante']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Setor do Solicitante</label>
                            <select class="form-control" name="idSetorSolicitante" id="idSetorSolicitante">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setorsolicitante']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetorSolicitante']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Número da O.S.</label>
                         <strong> <input type="text" class="form-control" name="nrOS" id="nrOS" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['nrOS'])===null||$tmp==='' ? '' : $tmp);?>
"> </strong>           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Local do Serviço</label>
                            <select class="form-control" name="idSetor" id="idSetor">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setoros']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetor']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="setor">Centro de Custo</label>
                            <select class="form-control" name="idCentroCusto" id="idCentroCusto">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_centrocusto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idCentroCusto']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>     
                </div> 
                <div class="row">
                    <div class="col-xs-12">
                        <label for="form-control">Descrição do problema</label>
                        <textarea type="text" class="form-control" name="dsProblema" id="dsProblema" > <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProblema'])===null||$tmp==='' ? '' : $tmp);?>
 </textarea>
                    </div> 
                </div> 
                </br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Responsável</label>
                            <select class="form-control" name="idColaboradorResponsavel" id="idColaboradorResponsavel">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaboradorresponsavel']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorResponsavel']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Inicio</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicio" onblur="os.verhoras();" id="dtInicio" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Termino</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFim" id="dtFim" onblur="os.verhoras();" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtFim'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="manutencao">Tipo de Manutenção</label>
                            <select class="form-control" name="idTipoManutencao" id="idTipoManutencao">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipomanutencao']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoManutencao']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>        
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="falha">Tipo de Falha</label>
                            <select class="form-control" name="idTipoFalha" id="idTipoFalha">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipofalha']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoFalha']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="responsavel">Grupo</label>
                            <select class="form-control" name="idOSGrupo" id="idOSGrupo">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_osgrupo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idOSGrupo']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                </div> 
                </br>
            </form>
            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da O.S.:</h3>
                <br>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("os/listaocorrencias.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <br>
            <div class="row" >
                <div class="col-xs-1">
                    <label for="dtinicial">Data inicial </label>                    
                    <input type="text" class="form-control" name="datainicion" id="datainicion" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" readonly="true"/>           
                </div>
                <div class="col-xs-1">
                    <label for="dtfinal">Data final </label>                    
                    <input type="text" class="form-control" name="datafinaln" id="datafinaln" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtFim'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" readonly="true" />           
                </div>                        
                <br>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="atualizar"></label>                    
                        <a class="btn btn-primary" id="btnReservar" title="Selecionar" onclick="os.selecionaColaborador();" disabled >Selecionar</a> 
                    </div>
                </div>                         
            </div>    
            <div id="labelcolaborador">
                <label for="statusagenda"></label>
            </div> 
            <div class="row" >
                <h3> &nbsp; Mão de Obra Disponível: (em horas) </h3>
                <br>
            </div>    
            <div id="mostraragendacompleta">
                 <?php echo $_smarty_tpl->getSubTemplate ("os/osanalitico.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <br>            
            <div class="row" >
                <h3> &nbsp; Colaboradores comprometidos em ordem de serviço neste período: </h3>
                <br>
            </div>    
            <div id="mostrarcolaboradoresos">
                 <?php echo $_smarty_tpl->getSubTemplate ("os/oscolabanalitico.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
<script src="/files/js/os/os.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
