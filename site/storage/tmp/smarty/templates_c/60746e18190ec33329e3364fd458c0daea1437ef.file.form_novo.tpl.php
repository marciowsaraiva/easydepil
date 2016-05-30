<?php /* Smarty version Smarty-3.1.18, created on 2016-03-27 22:38:44
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/fase/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2978171956f88b249f7c52-36309188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60746e18190ec33329e3364fd458c0daea1437ef' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/fase/form_novo.tpl',
      1 => 1456706924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2978171956f88b249f7c52-36309188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_colaborador' => 0,
    'lista_projeto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56f88b24a5f9d2_36216157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f88b24a5f9d2_36216157')) {function content_56f88b24a5f9d2_36216157($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idFase'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsFase'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Fases<?php }?></h1></tt>
            </div>          

            <form name="frm-fase" 
                  action="/fase/gravar_fase" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <a href="/fase" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idFase'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idFase" id="idFase" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idFase'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idFase" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-5">
                        <label for="form-control">Objetivo do Fase</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsFase'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Responsável pelo Fase</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaborador']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaboradorResponsavel']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomeprojeto">Projeto</label>
                            <select class="form-control" name="idProjeto" id="idProjeto">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projeto']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idProjeto']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Valor do Orçamento:</label>
                                 <input type="text" class="form-control obg data" id="vlOrcado" name="vlOrcado" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['vlOrcado'])===null||$tmp==='' ? '0' : $tmp);?>
" DISABLED>           
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
                            <label for="form-control">Resumo da Fase</label>
                            <textarea class="form-control" name="dsTermoAbertura" id="dsTermoAbertura"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTermoAbertura'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>           
                        </div>
                    </div>                         
                </div> 
                <div class="row">
                    <h3> &nbsp; Documentos ou imagens que fazem parte da Fase:</h3>
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
                    <a class="btn btn-primary" id="btn-seleciona" title="Clique aqui para selecionar um arquivo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idFase']=='') {?>  disabled <?php }?> onclick="fase.lerdoc();">Procurar.....</a> 
                    <a class="btn btn-primary" id="btn-adicionaitem" title="Clique aqui para adicionar este arquivo na lista abaixo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idFase']=='') {?>  disabled <?php }?> onclick="fase.gravardoc();">Adicionar</a> 
                </div> 
            </form>
            <?php echo $_smarty_tpl->getSubTemplate ("fase/listadocumentos.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status da Fase:</h3>
                <br>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("fase/listaocorrencias.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
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
<script src="/files/js/fase/fase_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
