<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:29:52
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/agendahorario/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160738990157237df0e0b7e7-50425109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e98c2906dae3228fe9efe657762c610e8b572e53' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/agendahorario/form_novo.tpl',
      1 => 1457902591,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160738990157237df0e0b7e7-50425109',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_ano' => 0,
    'ano' => 0,
    'lista_colaborador' => 0,
    'valores' => 0,
    'lista_statusagendas' => 0,
    'lista_status' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57237df0ec9fd3_41662230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57237df0ec9fd3_41662230')) {function content_57237df0ec9fd3_41662230($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsAgendaHorario'])===null||$tmp==='' ? '' : $tmp);?>
<?php } else { ?> Inclus&atilde;o de Agenda / Horarios<?php }?></h1></tt>
            </div>          
            <form name="frm-agendahorario" 
                  action="/agendahorario/gravar_agendahorario" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/agendahorario" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Criar Agenda" name="btnGravar" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario']>0) {?> disabled <?php }?> />         
                <br>
                <br>
                <input type="hidden" class="form-control" name="idColaboradorEscolhido" id="idColaboradorEscolhido" value="" />           
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idAgendaHorario" id="idAgendaHorario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'])===null||$tmp==='' ? '' : $tmp);?>
" READONLY />           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idAgendaHorario" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="unidade">Ano</label>
                            <select class="form-control" name="idAno" id="idAno">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_ano']->value,'selected'=>$_smarty_tpl->tpl_vars['ano']->value),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>                                         
                    <div class="col-xs-3">
                        <label for="form-control">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsAgendaHorario'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                </div> 
            </form>
            <div class="row" >
                <h3> &nbsp; Colaboradores para esta agenda</h3>
                <br>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="colaborador">Colaborador </label>
                        <select class="form-control" name="idColaborador" id="idColaborador"> 
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_colaborador']->value,'selected'=>null),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>
                <br>
                <div class="col-xs-1">
                  <div class="row">
                      <a class="btn btn-primary" id="btnGravarColaborador" title="Adiciona Colaborador" onclick="gravarcolaborador();" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario']=='') {?> disabled <?php }?>  >Adiciona Colaborador</a> 
                  </div> 
                </div> 
            </div>
            <div id="mostrarcolaboradores">
                 <?php echo $_smarty_tpl->getSubTemplate ("agendahorario/agendahorariocolaborador.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="row">
                <h3> &nbsp; Use as setas para mudar de mês dentro do ano - <?php echo $_smarty_tpl->tpl_vars['valores']->value['mesextenso'];?>
 - </h3>
                <div class="col-xs-1">
                     <label for="Voltar"></label>                    
                     <a class="btn btn-primary" id="btnVoltar" title="Voltar" href="/agendahorario/voltar/idAgendaHorario/<?php echo $_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'];?>
/dtInicio/<?php echo $_smarty_tpl->tpl_vars['valores']->value['datainicio'];?>
/dtFim/<?php echo $_smarty_tpl->tpl_vars['valores']->value['datafinal'];?>
" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario']=='') {?> disabled <?php }?>  >Mês Anterior</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="Avançar"></label>                    
                     <a class="btn btn-primary" id="btnAvancar" title="Avançar" href="/agendahorario/avancar/idAgendaHorario/<?php echo $_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario'];?>
/dtInicio/<?php echo $_smarty_tpl->tpl_vars['valores']->value['datainicio'];?>
/dtFim/<?php echo $_smarty_tpl->tpl_vars['valores']->value['datafinal'];?>
" <?php if ($_smarty_tpl->tpl_vars['registro']->value['idAgendaHorario']=='') {?> disabled <?php }?>  >Próximo Mês</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="datainicio"></label>                    
                    <input type="text" class="form-control" name="datainicio" id="datainicio" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['valores']->value['datainicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" READONLY />           
                </div>
                <div class="col-xs-1">
                     <label for="datafinal"></label>                    
                    <input type="text" class="form-control" name="datafinal" id="datafinal" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['valores']->value['datafinal'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" READONLY />           
                </div>                        
                <div class="col-xs-1">
                </div>                        
                <div class="col-xs-1">
                    <label for="dtinicial">Data inicial </label>                    
                    <input type="text" class="form-control" name="datainicion" id="datainicion" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['valores']->value['datainicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" readonly="true"/>           
                </div>
                <div class="col-xs-1">
                    <label for="dtfinal">Data final </label>                    
                    <input type="text" class="form-control" name="datafinaln" id="datafinaln" value="<?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['valores']->value['datafinal'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
" readonly="true" />           
                </div>                        
                <div class="col-xs-4">
                    <div class="form-group">
                        <label for="statusagenda">Status da Agenda</label>
                        <select class="form-control" name="idTipoAgenda" id="idTipoAgenda" readonly="true"> 
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_statusagendas']->value,'selected'=>null),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div> 
                <br>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="atualizar"></label>                    
                        <a class="btn btn-primary" id="btnAtualizar" title="Atualizar" onclick="atualizarColaborador();" disabled >Atualizar</a> 
                    </div>
                </div>                         
            </div>
            <div id="labelcolaborador">
                <label for="statusagenda"></label>
            </div> 
            <br>
            <div id="mostraragendacompleta">
                 <?php echo $_smarty_tpl->getSubTemplate ("agendahorario/agendaanalitica.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="row">
                <div class="col-xs-1">                
                    <h3> &nbsp; Legenda:</h3>
                    <br>
                    <table class="table" border="0">
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                                <tr>
                                    <td <span  style="background-color: <?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCor'];?>
"> </span> </td> 
                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoAgenda'];?>
</td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                    <td></td> 
                                </tr>
                            <?php } ?>        
                        </tbody>
                    </table>
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
<script src="/files/js/agendahorario/agendahorario.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
