<?php /* Smarty version Smarty-3.1.18, created on 2016-01-11 11:12:53
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/motorista/relatorioMotoristaTrocas_pre.html" */ ?>
<?php /*%%SmartyHeaderCode:20370143155693aa55cfd150-90771432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c5f9fc0abdcd145b2ddfda28d8bc24183a93c6b' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/motorista/relatorioMotoristaTrocas_pre.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20370143155693aa55cfd150-90771432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaMotoristas' => 0,
    'listaTrocaSituacao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5693aa55d25e11_53690602',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5693aa55d25e11_53690602')) {function content_5693aa55d25e11_53690602($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <h1>Relatório de trocas por motorista</h1>
      
        <form name="frm_relatorio_pre" action="/motorista/relatorioMotoristaTrocas" method="POST" enctype="multipart/form-data" onsubmit="return formValidator()">            
            
            <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="data_inicio">Data inicial:</label>
                                <input type="text" name="data_inicio" class="form-control data datepicker" id="data_inicio" />
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="data_fim">Data final:</label>
                                <input type="text" name="data_fim" class="form-control data datepicker" id="data_fim" />
                            </div>
                        </div>
            </div>
            
             <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="motorista">Motorista:</label>
                                <select class="form-control" name="motorista" id="motorista">
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['listaMotoristas']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
            </div>
            <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="situacao">Situação:</label>
                                <select class="form-control" name="situacao" id="situacao">
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['listaTrocaSituacao']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                    </div>
            
            
            <input type="submit" class="btn btn-primary" value="Gerar Relatório" name="btnGerar" />            
        </form>   

        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/jquery_ui/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script type="text/javascript" src="/files/js/util.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<script type="text/javascript" src="/files/js/motorista/rel_motorista_pre.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
