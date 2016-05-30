<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:42:41
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/geolocalizacao/mapacheio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20198732655696707187a0c9-42416831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf717a71d3b9d5c0b6de8fa02c89dd450fd683b1' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/geolocalizacao/mapacheio.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20198732655696707187a0c9-42416831',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_projetos' => 0,
    'lista_cidade_completa' => 0,
    'situacao_troca' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5696707189e642_85058529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5696707189e642_85058529')) {function content_5696707189e642_85058529($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!-- Sidebar -->
        <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!--Altere daqui pra baixo-->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Geolocalização de Trocas</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="idProjeto">Projetos</label>             
                                    <select class="form-control" name="idProjeto" id="idProjeto">
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projetos']->value),$_smarty_tpl);?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_municipio">Cidade</label>             
                                    <select class="form-control" name="id_municipio" id="id_municipio">
                                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['lista_cidade_completa']->value)===null||$tmp==='' ? '<option>NENHUMA CIDADE CADASTRADA</option>' : $tmp);?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_troca_situacao">Situação</label>
                                    <select class="form-control" id="id_troca_situacao"  name="id_troca_situacao">
                                        <option value="0">TODOS</option>
                                        <option value="3" <?php if ($_smarty_tpl->tpl_vars['situacao_troca']->value==3) {?>selected<?php }?>>SUCESSO</option>
                                        <option value="4" <?php if ($_smarty_tpl->tpl_vars['situacao_troca']->value==4) {?>selected<?php }?>>INSUCESSO</option>
                                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['situacao_troca']->value==2) {?>selected<?php }?>>EM ROTA</option>
                                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['situacao_troca']->value==1) {?>selected<?php }?>>NÃO INICIADOS</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="lbl_aviso" class="hidden">
                            <div class="col-md-12">
                                <div class="alert alert-info"> AGUARDE, CARREGANDO MAPA... <img src="/files/images/loading.gif"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div id="mapa" style="width:100%;height:550px;"></div> 
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <ul class="legenda-geo">
                                    <li><small>Legenda:</small></li>
                                    <li><img src="/files/images/icones-geolocalizacao/geladeira/troca-em-rota.png" /> <img src="/files/images/icones-geolocalizacao/lampada/troca-em-rota.png" /><br />Troca em rota</li>
                                    <li><img src="/files/images/icones-geolocalizacao/geladeira/troca-nao-iniciada.png" /> <img src="/files/images/icones-geolocalizacao/lampada/troca-nao-iniciada.png" /><br />Troca não iniciada</li>
                                    <li><img src="/files/images/icones-geolocalizacao/geladeira/troca-sucesso.png" /> <img src="/files/images/icones-geolocalizacao/lampada/troca-sucesso.png" /><br />Troca sucesso</li>
                                    <li><img src="/files/images/icones-geolocalizacao/geladeira/troca-insucesso.png" /> <img src="/files/images/icones-geolocalizacao/lampada/troca-insucesso.png" /><br />Troca insucesso</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script src="/files/js/bootbox.min.js"></script>
<script src="/files/js/util.js"></script>
<script src="/files/js/geolocalizacao/mapacheio.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
