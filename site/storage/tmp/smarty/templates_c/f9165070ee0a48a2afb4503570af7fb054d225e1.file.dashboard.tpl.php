<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 20:21:23
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/dashboard/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43377954957423ef33645c6-90902028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9165070ee0a48a2afb4503570af7fb054d225e1' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/dashboard/dashboard.tpl',
      1 => 1463959274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43377954957423ef33645c6-90902028',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'totalos' => 0,
    'totalemandamento' => 0,
    'totalpausada' => 0,
    'totalparaaprovar' => 0,
    'registrosfinanceiro' => 0,
    'linha' => 0,
    'registrosfinanceiromes' => 0,
    'classea' => 0,
    'os' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57423ef3459b60_44125908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57423ef3459b60_44125908')) {function content_57423ef3459b60_44125908($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_number_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.number_format.php';
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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-dollar fa-fw"></i> Financeiro
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pedido/Parcela</th>
                                                    <th>Vencimento</th>
                                                    <th>Fornecedor</th>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registrosfinanceiro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>                                                  
                                                <tr>
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['nrPedido'])===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['nrParcela'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                    <td><?php echo (($tmp = @(($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtVencimento'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp))===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsFornecedor'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsObservacao'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                    <td>R$ <?php echo (($tmp = @smarty_modifier_number_format($_smarty_tpl->tpl_vars['linha']->value['vlParcela'],2,",","."))===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                    <td>
                                                        <a class="glyphicon glyphicon-pencil" href="/pedido/novo_pedido/idPedido/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPedido'];?>
"> Ver</a>
                                                    </td>                                                    
                                                </tr>
                                                <?php } ?>        
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <div class="col-lg-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Mes</th>
                                                    <th>Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registrosfinanceiromes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>                                                  
                                                <tr>
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['datavencimento'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                    <td>R$ <?php echo (($tmp = @smarty_modifier_number_format($_smarty_tpl->tpl_vars['linha']->value['total'],2,",","."))===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                </tr>
                                                <?php } ?>        
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                            
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa <?php echo $_smarty_tpl->tpl_vars['classea']->value;?>
 fa-fw"></i> Detalhes das O.S
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sequencia</th>
                                                    <th>O.S.</th>
                                                    <th>Data</th>
                                                    <th>Solicitante</th>
                                                    <th>Setor</th>
                                                    <th>Tipo de Manutenção</th>
                                                    <th>Status</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['os']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['idOS'];?>
</td>
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['nrOS'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                                                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtOS'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsSolicitante'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsSetor'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsTipoManutencao'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsStatusOS'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                                                    <td>
                                                        <a class="glyphicon glyphicon-pencil" href="/os/novo_os/idOS/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOS'];?>
"> Ver</a>
                                                       <?php if ($_smarty_tpl->tpl_vars['linha']->value['idStatusOS']==1) {?> 
                                                        <a class="glyphicon glyphicon-trash" onclick="os.delOS('<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOS'];?>
');">  Excluir</a>
                                                        <?php }?>
                                                    </td>                                                    
                                                </tr>
                                                <?php } ?>        
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
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
