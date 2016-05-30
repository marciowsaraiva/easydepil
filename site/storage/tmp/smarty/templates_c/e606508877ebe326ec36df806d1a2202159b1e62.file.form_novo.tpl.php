<?php /* Smarty version Smarty-3.1.18, created on 2016-03-13 13:39:12
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osaprovar/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4863239456e597b0c39378-04546370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e606508877ebe326ec36df806d1a2202159b1e62' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osaprovar/form_novo.tpl',
      1 => 1457791103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4863239456e597b0c39378-04546370',
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
    'lista_colaboradorresponsavel' => 0,
    'lista_tipomanutencao' => 0,
    'lista_tipofalha' => 0,
    'lista_colaboradoraprovado' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e597b0ccdaa8_32681013',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e597b0ccdaa8_32681013')) {function content_56e597b0ccdaa8_32681013($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>Ordem de Serviço - Informar a Analise</h1></tt>
            </div> 
            <form name="frm-grava-os" action="/osaprovar/gravar_os" method="POST" enctype="multipart/form-data">
                <br>
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
                <div class="row">
                    <div class="col-xs-12">
                        <label for="form-control">Descrição do problema</label>
                        <textarea type="text" class="form-control" name="dsProblema" READONLY  id="dsProblema" > <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProblema'])===null||$tmp==='' ? '' : $tmp);?>
 </textarea>
                    </div> 
                </div> 
                </br>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="responsavel">Responsável</label>
                            <select class="form-control" name="idColaboradorResponsavel" disabled id="idColaboradorResponsavel">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaboradorresponsavel']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorResponsavel']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Inicio</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtInicio" onblur="os.verhoras();" id="dtInicio" READONLY value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Previsão p/ Termino</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtFim" id="dtFim" onblur="os.verhoras();" READONLY value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtFim'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="manutencao">Tipo de Manutenção</label>
                            <select class="form-control" name="idTipoManutencao" disabled    id="idTipoManutencao">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipomanutencao']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoManutencao']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>        
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="falha">Tipo de Falha</label>
                            <select class="form-control" name="idTipoFalha" disabled id="idTipoFalha">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tipofalha']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idTipoFalha']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                     
                </div> 
                <br>
                <div class="row" >
                    <h3> &nbsp; Informe os dados da aprovação:</h3>
                    <br>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <label for="form-control">Aprovado em</label>
                        <input type="text" class="form-control obg standard-mask-date standard-form-date standard-form-require" name="dtAprovacao" id="dtAprovacao" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtAprovacao'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                    </div>                             
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="aprovadopor">Aprovado por</label>
                            <select class="form-control" name="idColaboradorAprovado" id="idColaboradorAprovado">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaboradoraprovado']->value),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                                            
                </div> 
                <br>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
            </form>
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
<script src="/files/js/osaprovar/aprovaros.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
