<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 09:23:57
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/projeto/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174266167356efe7dd33fa75-36887751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01318d0c4a949601043f4410b140e13e057ca390' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/projeto/form_novo.tpl',
      1 => 1456680410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174266167356efe7dd33fa75-36887751',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_empresa' => 0,
    'lista_colaborador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56efe7dd3deb79_88288384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56efe7dd3deb79_88288384')) {function content_56efe7dd3deb79_88288384($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjeto'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProjeto'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Projetos<?php }?></h1></tt>
            </div>          
            
            <form name="frm-projeto" 
                  action="/projeto/gravar_projeto" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <a href="/projeto" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>

                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjeto'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idProjeto" id="idProjeto" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idProjeto'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idProjeto" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-5">
                        <label for="form-control">Objetivo do Projeto (Descrição resumida)</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsProjeto'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomesetor">Empresa</label>
                            <select class="form-control" name="idEmpresa" id="idEmpresa">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_empresa']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idEmpresa']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Responsável pelo Projeto</label>
                            <select class="form-control" name="idColaborador" id="idColaborador">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaborador']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idColaborador']),$_smarty_tpl);?>

                            </select>                      
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
                            <label for="form-control">Detalhes do Projeto</label>
                            <textarea class="form-control" name="dsTermoAbertura" id="dsTermoAbertura"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsTermoAbertura'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>           
                        </div>
                    </div>                         
                </div> 
                <div class="row">
                    <h3> &nbsp; Documentos ou imagens que fazem parte do Projeto:</h3>
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
                    <a class="btn btn-primary" id="btn-seleciona" title="Clique aqui para selecionar um arquivo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idProjeto']=='') {?>  disabled <?php }?> onclick="projeto.lerdoc();">Procurar.....</a> 
                    <a class="btn btn-primary" id="btn-adicionaitem" title="Clique aqui para adicionar este arquivo na lista abaixo" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idProjeto']=='') {?>  disabled <?php }?> onclick="projeto.gravardoc();">Adicionar</a> 
                </div> 
            </form>
            <br>
            <?php echo $_smarty_tpl->getSubTemplate ("projeto/listadocumentos.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <br>
            <div class="row" >
                <h3> &nbsp; Mudanças de Status do Projeto:</h3>
                <br>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("projeto/listaocorrencias.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
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
<script src="/files/js/projeto/projeto_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
