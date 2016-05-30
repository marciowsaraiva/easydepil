<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 09:34:24
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97410852456efea50e202f8-44461600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'deae43a2560d6f83db7806882030d820b2f63538' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/form_novo.tpl',
      1 => 1456790665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97410852456efea50e202f8-44461600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_colaborador' => 0,
    'lista_projeto' => 0,
    'lista_servicos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56efea50ee3cd8_32236302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56efea50ee3cd8_32236302')) {function content_56efea50ee3cd8_32236302($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php if ($_smarty_tpl->tpl_vars['registro']->value['idProjetoServico']>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsServicoProjeto'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Serviços na Fase do Projeto<?php }?></h1></tt>
            </div>          

            <form name="frm-servicoprojeto" 
                  action="/servicoprojeto/gravar_servicoprojeto" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <a href="/servicoprojeto" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <input type="hidden" class="form-control" name="idFase" id="idFase" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idFase'];?>
" READONLY>           
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjetoServico'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProjetoServico" id="idProjetoServico" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjetoServico'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProjetoServico" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Objetivo do Serviço</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsServicoProjeto'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Responsável pelo Serviço</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaborador']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorResponsavel']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomeprojeto">Projeto</label>
                            <select class="form-control" name="idProjeto" id="idProjeto" onclick="lerfasedoprojeto();">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projeto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idProjeto']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div id="listarfase" class="form-group">
                            <?php echo $_smarty_tpl->getSubTemplate ("servicoprojeto/fases.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
                            
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Valor do Orçamento:</label>
                                 <input type="text" class="form-control obg data" id="vlOrcado" name="vlOrcado" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vlOrcado'])===null||$tmp==='' ? '0' : $tmp);?>
" disabled >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Prevista para Inicio:</label>
                                 <input type="text" class="form-control obg data" id="dtPrevisaoInicio" name="dtPrevisaoInicio" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtPrevisaoInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Data Prevista para Termino:</label>
                                 <input type="text" class="form-control obg data" id="dtPrevisaoTermino" name="dtPrevisaoTermino" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['registro']->value['dtPrevisaoTermino'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="form-control">Resumo do Serviço</label>
                            <textarea class="form-control" name="dsTermoAbertura" id="dsTermoAbertura"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTermoAbertura'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>           
                        </div>
                    </div>                         
                </div> 
                <div class="row">
                    <h3> &nbsp; Documentos ou imagens que fazem parte deste Serviço:</h3>
                    <br>
                    <div class="col-xs-4">
                        <div class="form-group">
                                 <label for="form-control">Descrição do documento</label>
                                 <input type="text" class="form-control obg data" id="dsDocumento" name="dsDocumento" value="" >           
                        </div>
                    </div> 
                    <div class="col-xs-4">
                        <div class="form-group">
                                 <label for="form-control">Nome do documento ou imagem</label>
                                 <input type="text" class="form-control obg data" id="dsLocal" name="dsLocal" value="" >           
                        </div>
                    </div> 
                    <br>
                    <a class="btn btn-primary" id="btn-seleciona" title="Clique aqui para selecionar um arquivo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idProjetoServico']=='') {?>  disabled <?php }?> onclick="servico.lerdoc();">Procurar.....</a> 
                    <a class="btn btn-primary" id="btn-adicionaitem" title="Clique aqui para adicionar este arquivo na lista abaixo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idProjetoServico']=='') {?>  disabled <?php }?> onclick="servico.gravardoc();">Adicionar</a> 
                </div> 
            </form>
            <?php echo $_smarty_tpl->getSubTemplate ("servicoprojeto/listadocumentos.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <br>            
            <div class="panel-item panel panel-default"> 
                <div class="panel-heading mostra">
                    <h3> <strong>SERVIÇOS QUE FARÃO PARTE DESTE SERVIÇO </strong> <h3>
                </div> 
                <div class="panel-body esconde" id="painel_insumo">
                    <br>
                    <div class="row" >
                        <h3> &nbsp; ESCOLHA O SERVIÇO:</h3>
                        <br>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="servico">Servico </label>
                                <select class="form-control" name="idServico" id="idServico"  onchange="lerservico();"> 
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_servicos']->value,'selected'=>null),$_smarty_tpl);?>

                                </select>                      
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <label for="form-control">Valor do Serviço</label>
                            <input type="text" class="form-control obg valor" name="vlUnitarioServico" id="vlUnitarioServico" readonly value=""> 
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Quantidade</label>
                            <input type="text" class="form-control obg valor" name="qtServico" id="qtServico"  onchange="calcularvalor();" value="">      
                        </div> 
                        <div class="col-xs-1">
                            <label for="form-control">Valor Total</label>
                            <input type="text" class="form-control obg valor" name="vlTotalServico" id="vlTotalServico" readonly value=""> 
                        </div> 
                        <div class="col-xs-3">
                            <label for="form-control">Observação</label>
                            <input type="text" class="form-control" name="dsObservacaoServico" id="dsObservacaoServico" value=""> 
                        </div> 
                        <br>
                        <div class="col-xs-1">
                          <div class="row">
                              <a class="btn btn-primary" id="btn-adicionaservico" title="Adiciona Serviço" onclick="gravarservicoprojeto();" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idProjetoServico']=='') {?> disabled <?php }?>  >Adiciona Servico</a> 
                          </div> 
                        </div> 
                    </div>
                    <br>
                    <div id="servicosprojeto">
                         <?php echo $_smarty_tpl->getSubTemplate ("servicoprojeto/listaservicos.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                    <br>
                    <div class="row" >
                        <h3> &nbsp; Mudanças de Status do Servico:</h3>
                        <br>
                    </div>
                    <br>
                    <?php echo $_smarty_tpl->getSubTemplate ("servicoprojeto/listaocorrencias.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
<script src="/files/js/servicoprojeto/servico.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
