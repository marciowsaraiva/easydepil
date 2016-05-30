<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:27:18
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/colaborador/form_novo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112856078357237d561342e3-42813281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4cc991667257c5d54cac8f0b63270b72a9e0c2f' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/colaborador/form_novo.tpl',
      1 => 1457789067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112856078357237d561342e3-42813281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'registro' => 0,
    'lista_maoobra' => 0,
    'lista_setor' => 0,
    'lista_cargo' => 0,
    'lista_fazparte' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57237d56226306_18581096',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57237d56226306_18581096')) {function content_57237d56226306_18581096($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idColaborador'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1>0) {?> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsColaborador'])===null||$tmp==='' ? '' : $tmp);?>
 <?php } else { ?> Inclus&atilde;o de Colaboradores<?php }?></h1></tt>
            </div>          

            <form name="frm-colaborador" 
                  action="/colaborador/gravar_colaborador" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <a href="/colaborador" class="btn btn-primary"> Voltar</a>
                <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['registro']->value['idColaborador'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>0) {?>
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idColaborador" id="idColaborador" value="<?php echo $_smarty_tpl->tpl_vars['registro']->value['idColaborador'];?>
" READONLY>           
                        <?php } else { ?>
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idColaborador" value="" READONLY>           
                        <?php }?>                     
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Nome do Colaborador</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsColaborador'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomemaoobra">Mão de Obra</label>
                            <select class="form-control" name="idMaoObra" id="idMaoObra">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_maoobra']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idMaoObra']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomesetor">Setor</label>
                            <select class="form-control" name="idSetor" id="idSetor">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_setor']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idSetor']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomecargo">Cargo</label>
                            <select class="form-control" name="idCargo" id="idCargo">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_cargo']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['idCargo']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-3">
                        <div class="form-group">
                                 <label for="form-control">EMail:</label>
                                 <input type="text" class="form-control" id="dsEmail" name="dsEmail" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['dsEmail'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                        </div>
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="fazparteagenda">Faz Parte de Agenda de Serviços</label>
                            <select class="form-control" name="stFazParteAgenda" id="stFazParteAgenda">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_fazparte']->value,'selected'=>$_smarty_tpl->tpl_vars['registro']->value['stFazParteAgenda']),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                                 <label for="form-control">Quantidade de Horas/Dia</label>
                                 <input type="text" class="form-control" id="qtHorasDia" name="qtHorasDia" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['registro']->value['qtHorasDia'])===null||$tmp==='' ? '' : $tmp);?>
" >           
                        </div>
                    </div> 
                </div> 
                <br>
                  <div class="col-xs-3">
                    <div class="row">
                    </div> 
                  </div> 
                <br>
            </form>
            
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
<script src="/files/js/colaborador/colaborador_novo.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
