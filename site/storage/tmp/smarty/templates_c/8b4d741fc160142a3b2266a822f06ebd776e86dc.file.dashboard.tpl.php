<?php /* Smarty version Smarty-3.1.18, created on 2016-05-30 07:35:31
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1973852485574c17730dcd59-75802425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b4d741fc160142a3b2266a822f06ebd776e86dc' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/dashboard.tpl',
      1 => 1464489683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1973852485574c17730dcd59-75802425',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'totalos' => 0,
    'totalemandamento' => 0,
    'totalpausada' => 0,
    'totalparaaprovar' => 0,
    'lista_profissional' => 0,
    'profissional_padrao' => 0,
    'lista_cliente' => 0,
    'lista_tratamento' => 0,
    'lista_formapagamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574c177315c827_55244072',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574c177315c827_55244072')) {function content_574c177315c827_55244072($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <script type="text/javascript" src="/files/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/files/js/bootstrap.js"></script>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalos']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>
                                    <div>TOTAL DE O.S</div>
                                </div>
                            </div>
                        </div>
                        <a href="/dashboard/index_action/tipoos/1">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalemandamento']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>
                                    <div>EM EXECUÇÃO</div>
                                </div>
                            </div>
                        </div>
                        <a href="/dashboard/index_action/tipoos/2">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pause fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalpausada']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>
                                    <div>PAUSADOS</div>
                                </div>
                            </div>
                        </div>
                        <a href="/dashboard/index_action/tipoos/3">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['totalparaaprovar']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>
                                    <div>PARA APROVAR</div>
                                </div>
                            </div>
                        </div>
                        <a href="/dashboard/index_action/tipoos/4">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3> &nbsp; Escolha o Profissional para esta agenda</h3>
                <br>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="profissional">Profissional </label>
                        <select class="form-control" name="idProfissional" id="idProfissional" onchange="dashboard.agendaprofissional();"> 
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_profissional']->value,'selected'=>$_smarty_tpl->tpl_vars['profissional_padrao']->value),$_smarty_tpl);?>

                        </select>                      
                    </div>
                </div>
            </div>
            <div id="mostrarprofissionales">
                 <?php echo $_smarty_tpl->getSubTemplate ("dashboard/agendahorarioprofissional.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
          
            <div class="row">
                <div id="mostrarperiodos">
                   <?php echo $_smarty_tpl->getSubTemplate ("dashboard/periodos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div> 
            </div>
            </br>
                
            <div id="mostraragendacompleta">
                 <?php echo $_smarty_tpl->getSubTemplate ("dashboard/agendaanalitica.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
      
            <div id="listaagendadia">
                 <?php echo $_smarty_tpl->getSubTemplate ("dashboard/agendadia.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>

            <div class="row">
                <div id="agendar">                
                    <h3> &nbsp; Novo Agendamento</h3>
                    <br>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="cliente">Cliente </label>
                            <select class="form-control" name="idCliente" id="idCliente"> 
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_cliente']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="tratamento">Tratamento </label>
                            <select class="form-control" name="idTratamento" id="idTratamento" onchange='dashboard.lertratamento();'> 
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_tratamento']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="observacao">Observação</label>
                            <input type="text" id="observacao" class="form-control" nome="observacao"/>
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="hora">Hora </label>
                            <input type="text" id="hora" class="form-control" nome="hora" maxlength="5" placeholder="HH:MM"/>
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="hora">Duração</label>
                            <input type="text" id="duracao" class="form-control" nome="duracao"  disabled/>
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <div class="form-group">
                            <label for="hora">Valor</label>
                            <input type="text" id="valor" class="form-control" nome="valor"  disabled/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="atender">                
                    <h3> &nbsp; Atendimento</h3>
                    <br>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="hora">Valor Pago </label>
                            <input type="text" id="valorpago" class="form-control" nome="valorpago"/>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="formapagamento">Forma de Pagamento </label>
                            <select class="form-control" name="idFormaPagamento" id="idFormaPagamento"> 
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_formapagamento']->value,'selected'=>null),$_smarty_tpl);?>

                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-1">
                    </div>
                </div>
            </div>
                            
            <!-- /.row -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        
</div>

<!-- JavaScript -->
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<script type="text/javascript" src="/files/js/jquery.price/jquery.price_format.1.3.js"></script>
<script type="text/javascript" src="/files/js/tablesorter/jquery.tablesorter.js"></script>
<script type="text/javascript" src="/files/js/tablesorter/tables.js"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script type="text/javascript" src="/files/js/util.js"></script>
<script type="text/javascript" src="/files/js/dashboard/dashboard.js"></script>



<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>