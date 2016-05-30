<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:41:00
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/comprovacoes/comprovacoes_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:7414998115696700c651729-29200921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7e788db3cf5f18cf32a35c469349b44aaa0e37e' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/comprovacoes/comprovacoes_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7414998115696700c651729-29200921',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_projeto' => 0,
    'idProjeto' => 0,
    'ucSelecionada' => 0,
    'trocaSituacaoLista' => 0,
    'statusSelecionado' => 0,
    'lista_estado' => 0,
    'estadoSelecionado' => 0,
    'lista_cidade' => 0,
    'municipioSelecionado' => 0,
    'lista_veiculos' => 0,
    'veiculoSelecionado' => 0,
    'iniSelecionado' => 0,
    'fimSelecionado' => 0,
    'nisSelecionado' => 0,
    'mostrarGerar' => 0,
    'busca' => 0,
    'comprovacoes_lista' => 0,
    'linha' => 0,
    'HTTP_ROOT' => 0,
    'paginacao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5696700c7a6632_81051590',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5696700c7a6632_81051590')) {function content_5696700c7a6632_81051590($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <hr />
        <div class="row">
            <div class="col-xs-12">
                <form action="/comprovacoes/buscar" method="GET" id="form-buscar">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="idProjeto">Projeto:</label>
                                <select class="form-control" name="idProjeto" id="idProjeto">
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projeto']->value,'selected'=>$_smarty_tpl->tpl_vars['idProjeto']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="uc">UC:</label>
                                <input type="text" maxlength="30" class="form-control" id="uc" <?php if ($_smarty_tpl->tpl_vars['ucSelecionada']->value!='') {?> value="<?php echo $_smarty_tpl->tpl_vars['ucSelecionada']->value;?>
" <?php }?> name="uc" />
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="id_municipio">Status da troca:</label>
                                <select class="form-control" name="id_troca_situacao" id="id_troca_situacao">                                
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['trocaSituacaoLista']->value,'selected'=>$_smarty_tpl->tpl_vars['statusSelecionado']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="id_uf">Estado:</label>
                                <select class="form-control" name="id_uf" id="id_uf">
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_estado']->value,'selected'=>$_smarty_tpl->tpl_vars['estadoSelecionado']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="id_municipio">Cidade:</label>
                                <select class="form-control" name="id_municipio" id="id_municipio">
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_cidade']->value,'selected'=>$_smarty_tpl->tpl_vars['municipioSelecionado']->value),$_smarty_tpl);?>
 
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <?php if ($_SESSION['user']['tipousuario']==1||$_SESSION['user']['tipousuario']==3) {?>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="id_veiculos">Sucessos por veiculo:</label>
                                <select class="form-control" name="id_veiculos" id="id_veiculos">                                
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_veiculos']->value,'selected'=>$_smarty_tpl->tpl_vars['veiculoSelecionado']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                        <?php }?>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="data_inicio">Data início:</label>
                                <input type="text" name="data_inicio" id="data_inicio" class="form-control data" value="<?php echo $_smarty_tpl->tpl_vars['iniSelecionado']->value;?>
" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="data_fim">Data fim</label>
                                <input type="text" name="data_fim" id="data_fim" class="form-control data" value="<?php echo $_smarty_tpl->tpl_vars['fimSelecionado']->value;?>
" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="nis">Nis</label>
                                <input type="text" name="nis" id="nis" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nisSelecionado']->value)===null||$tmp==='' ? null : $tmp);?>
" />
                            </div>
                        </div>
                        <div class="col-lg-3" style="margin-top: 24px;">
                            <div class="form-group">
                                <input type="checkbox" id="mostrar_gerar" name="mostrar_gerar" value="sim" <?php if ($_smarty_tpl->tpl_vars['mostrarGerar']->value=='sim') {?> checked="checked"  <?php }?> />
                                       <label for="mostrar_gerar">Comprovacoes Pendentes</label>
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-xs-2 pull-right">
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" id="buscar" value="Buscar" />
                            </div>
                        </div>

                        <?php if (isset($_smarty_tpl->tpl_vars['busca']->value)&&$_smarty_tpl->tpl_vars['busca']->value!='') {?>
                        <div class="col-xs-2 pull-right">
                            <a href="/comprovacoes" class="form-control btn btn-info">Limpar busca</a>
                        </div>
                        <?php }?>
                    </div>
                </form>
            </div>
        </div>
        <div id="painel">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Troca</th>
                        <th>UC</th>
                        <th>NIS</th>
                        <th>Nome</th>
                        <th>Projeto</th>
                        <th>Status da Troca</th>                        
                        <th>Nota</th>
                        <th>Data Envio</th>
                        <th>Data Conclusão</th>
                        <th>Comprovações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comprovacoes_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                    <tr>
                        <?php if ($_SESSION['user']['tipousuario']==1||$_SESSION['user']['tipousuario']==3) {?>
                        <td><a href="/troca/nova_troca/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
</a></td>
                        <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
</td>
                        <?php }?>
                        <td><a href="/buscatroca_uc/index_action/uc/<?php echo $_smarty_tpl->tpl_vars['linha']->value['UC'];?>
/projeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjeto'];?>
"> <?php echo $_smarty_tpl->tpl_vars['linha']->value['UC'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['NIS'];?>
</td>
                        <td class="text-upper"><?php echo $_smarty_tpl->tpl_vars['linha']->value['nomeCliente'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nome'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['fat_nf'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['data_envio'],'%d/%m/%Y');?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['data_conclusao'],'%d/%m/%Y');?>
</td>


                        <?php if ($_smarty_tpl->tpl_vars['linha']->value['qtdFoto']!=0) {?>
                        <?php if ($_smarty_tpl->tpl_vars['linha']->value['descricao']!="NAO INICIADA"&&$_smarty_tpl->tpl_vars['linha']->value['descricao']!="EM ROTA") {?>
                        <?php if ($_smarty_tpl->tpl_vars['linha']->value['arquivo_zip']==1) {?>
                        <td><a class="glyphicon glyphicon-download-alt" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_ROOT']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['linha']->value['caminho_arquivo'];?>
">Download</a></td>
                        <?php } else { ?>                           
                        <?php if ($_SESSION['user']['tipousuario']==1||$_SESSION['user']['tipousuario']==3) {?>
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value==''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value=='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_uf/<?php echo $_smarty_tpl->tpl_vars['estadoSelecionado']->value;?>
">Gerar</a></td>
                        <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value==''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value=='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_municipio/<?php echo $_smarty_tpl->tpl_vars['municipioSelecionado']->value;?>
">Gerar</a></td>
                        <?php } else { ?>    
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value==''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value==''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value!='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_troca_situacao/<?php echo $_smarty_tpl->tpl_vars['statusSelecionado']->value;?>
">Gerar</a></td>
                        <?php } else { ?>    
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value==''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value!='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_municipio/<?php echo $_smarty_tpl->tpl_vars['municipioSelecionado']->value;?>
/id_troca_situacao/<?php echo $_smarty_tpl->tpl_vars['statusSelecionado']->value;?>
">Gerar</a></td>                                            
                        <?php } else { ?>                                                
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value==''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value!='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_uf/<?php echo $_smarty_tpl->tpl_vars['estadoSelecionado']->value;?>
/id_troca_situacao/<?php echo $_smarty_tpl->tpl_vars['statusSelecionado']->value;?>
">Gerar</a></td>                                            
                        <?php } else { ?>                                                                                                    
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value=='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_uf/<?php echo $_smarty_tpl->tpl_vars['estadoSelecionado']->value;?>
/id_municipio/<?php echo $_smarty_tpl->tpl_vars['municipioSelecionado']->value;?>
">Gerar</a></td>                                            
                        <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value!='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_uf/<?php echo $_smarty_tpl->tpl_vars['estadoSelecionado']->value;?>
/id_municipio/<?php echo $_smarty_tpl->tpl_vars['municipioSelecionado']->value;?>
/id_troca_situacao/<?php echo $_smarty_tpl->tpl_vars['statusSelecionado']->value;?>
">Gerar</a></td>                                            
                        <?php } else { ?>
                        <?php if (!isset($_smarty_tpl->tpl_vars['estadoSelecionado'])) $_smarty_tpl->tpl_vars['estadoSelecionado'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value = ''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value!='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_municipio/<?php echo $_smarty_tpl->tpl_vars['municipioSelecionado']->value;?>
/id_troca_situacao/<?php echo $_smarty_tpl->tpl_vars['statusSelecionado']->value;?>
">Gerar</a></td>                                            
                        <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['estadoSelecionado']->value!=''&&$_smarty_tpl->tpl_vars['municipioSelecionado']->value==''&&$_smarty_tpl->tpl_vars['statusSelecionado']->value!='') {?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
/id_uf/<?php echo $_smarty_tpl->tpl_vars['estadoSelecionado']->value;?>
/id_troca_situacao/<?php echo $_smarty_tpl->tpl_vars['statusSelecionado']->value;?>
">Gerar</a></td>                                            
                        <?php } else { ?>
                        <td><a class="glyphicon glyphicon-cog" href="/comprovacoes/gera_comprovacoes/id_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_troca'];?>
">Gerar</a></td>                                            
                        <?php }?>
                        <?php }?>
                        <?php }?>
                        <?php }?> 
                        <?php }?> 
                        <?php }?>                                                                                                   
                        <?php }?>
                        <?php }?>
                        <?php }?>    
                        <?php }?>
                        <?php }?>
                        <?php } else { ?>
                        <td></td>
                        <?php }?>
                        <?php } else { ?>
                        <td></td>
                        <?php }?>

                    </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                    <tr><td colspan="6">Nenhum registro encontrado</td></tr>
                    <?php } ?>        
                </tbody>
            </table>

            <div class="row">
                <div class="col-xs-12">
                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacao']->value)===null||$tmp==='' ? '' : $tmp);?>

                </div>
            </div>

        </div>



        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/bootbox.min.js"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<script src="/files/js/util.js"></script>
<script src="/files/js/comprovacoes/comprovacoes.js" type="text/javascript"></script>

<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
