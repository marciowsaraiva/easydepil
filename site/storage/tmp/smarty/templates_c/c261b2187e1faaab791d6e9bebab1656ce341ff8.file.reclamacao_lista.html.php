<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:44:09
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/reclamacao/reclamacao_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:1396375007569670c9aac361-01278517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c261b2187e1faaab791d6e9bebab1656ce341ff8' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/reclamacao/reclamacao_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1396375007569670c9aac361-01278517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mostra_combo' => 0,
    'lista_projetos' => 0,
    'reclamacao_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569670c9b0d481_22955716',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569670c9b0d481_22955716')) {function content_569670c9b0d481_22955716($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->        
        <div class="alert alert-info" >
            <tt><h1>Lista de Reclama&ccedil;&otilde;es</h1></tt>
        </div>          
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-reclamacao" action="/reclamacao/busca_reclamacao" method="POST" enctype="multipart/form-data">                    
                    <div class="input-group <?php if ($_smarty_tpl->tpl_vars['mostra_combo']->value!=true) {?>col-lg-5<?php } else { ?>col-lg-12<?php }?>">
                        <div class="input-group col-lg-6">
                            <span class="input-group-addon btn-outline btn-primary">Status</span>                         
                            <select class="form-control col-lg-4" name="status" id="status">
                                <option>Todos</option>
                                <option>Abertos</option>
                                <option>Aguardando Cliente</option>
                                <option>Aguardando Fox</option>
                                <option>Concluído</option>
                            </select>
                            <?php if ($_smarty_tpl->tpl_vars['mostra_combo']->value==true) {?>
                            <span class="input-group-addon">Projeto</span>
                            <select name="lista_projeto" class="form-control">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['lista_projetos']->value),$_smarty_tpl);?>

                            </select>
                            <?php }?>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Buscar</button><br><br>
                            </span>          
                        </div><!-- /input-group -->
                    </div>                
                </form>
            </div>
        </div>        
        <a href="/reclamacao/novo_reclamacao" class="btn btn-primary">Nova Reclamação</a>     
        <br><br>
        <?php if ($_smarty_tpl->tpl_vars['reclamacao_lista']->value!=null) {?>
        <table class="table table-hover" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Usuário</th>
                    <th>Data Criação</th>
                    <th>Data Update</th>
                    <th>Data Fechamento</th>
                    <th>Data Limite</th>
                    <th>Status</th>
                    <th>UC</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reclamacao_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                <tr>
                    <td><a href="/reclamacao/carrega_detalhe/id_reclamacao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_reclamacao'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_reclamacao'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['usuario'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['data_criacao'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['data_update'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['data_fechamento'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['data_limite'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['statusDesc'];?>
</td>                    
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['uc'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nome'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['telefone'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao'];?>
</td>
                    <td><?php if ($_SESSION['user']['usuario']==1||$_SESSION['user']['usuario']==3) {?> 
                        <a href="/reclamacao/novo_reclamacao/id_reclamacao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_reclamacao'];?>
">Editar</a> |
                        <a  href="/reclamacao/delreclamacao/id_reclamacao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_reclamacao'];?>
">Excluir</a>|  
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['linha']->value['status']!=2) {?>
                        <a  href="/reclamacao/carrega_detalhe/id_reclamacao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_reclamacao'];?>
">Detalhes</a> 
                        <?php }?>

                    </td>
                </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                <tr><td colspan="6">Nenhum Registro Encontrado</td></tr>
                <?php } ?>        
            </tbody>
        </table>
        <?php } else { ?>
        <tr><td colspan="6">Nenhum Registro Encontrado</td></tr>
        <?php }?>

        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/reclamacao/reclamacao_lista.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
