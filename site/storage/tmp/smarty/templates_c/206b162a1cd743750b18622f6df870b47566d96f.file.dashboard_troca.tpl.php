<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:40:05
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/dashboard/troca/dashboard_troca.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1806582542569cb2f5cb9735-06660404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '206b162a1cd743750b18622f6df870b47566d96f' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/dashboard/troca/dashboard_troca.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1806582542569cb2f5cb9735-06660404',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_projetos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb2f5cc48c1_58137595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb2f5cc48c1_58137595')) {function content_569cb2f5cc48c1_58137595($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><div class="panel panel-default">
    <div class="panel-heading">
        <h3><i class="fa">Trocas de Produtos</i></h3>
    </div> 
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="idProjeto_troca">Projeto:</label>
                    <select class="form-control" id="idProjeto_troca" name="select_projeto"/>                                      
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projetos']->value),$_smarty_tpl);?>

                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="data_inicial">Data Inicial:</label>
                    <input name="data_inicial" id="data_inicial" class="form-control data"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="data_final">Data Final:</label>
                    <input name="data_final" id="data_final" class="form-control data"/>
                </div>
            </div>
            <div class="col-md-2" style="margin-top: 25px;">
                <div class="form-group">
                    <input type="button" name="btn_filtro" class="btn btn-primary form-control" value="Filtrar" onclick="dashboard.troca.reload();" />
                </div>
            </div> 
            <div class="col-md-2" style="margin-top: 25px;">
                <div class="form-group">
                    <a href="/dashboard" class="btn btn-default form-control">Limpar</a>
                </div>
            </div> 
        </div>  
        <div id="data_troca">
            <?php echo $_smarty_tpl->getSubTemplate ("dashboard/troca/dashboard_troca_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </div>
</div><?php }} ?>
