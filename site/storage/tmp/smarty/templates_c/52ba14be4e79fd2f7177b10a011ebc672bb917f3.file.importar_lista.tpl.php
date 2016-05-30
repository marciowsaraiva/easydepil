<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:30:32
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/importar/importar_lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106681679156966d9859e324-28028150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52ba14be4e79fd2f7177b10a011ebc672bb917f3' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/importar/importar_lista.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106681679156966d9859e324-28028150',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscamensagem' => 0,
    'pre_troca_lista' => 0,
    'linha' => 0,
    'loglista' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56966d985f1a17_14923747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56966d985f1a17_14923747')) {function content_56966d985f1a17_14923747($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->

        <form name    = "frm-busca-importar" 
              action  = "/importar/busca_importar" 
              method  = "POST" 
              enctype = "multipart/form-data">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa"><h3>Lista de Envios</h3></i></h3>
                </div>
                <div class="panel-body">
                    <div class="panel-footer">
                        <label for="buscamensagem">Nome do Arquivo:</label> 
                        <div class="input-group">
                            <input type="text" class="form-control" id="buscamensagem" name="buscamensagem" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscamensagem']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Buscar</button><br><br>
                            </span>          
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-2">                            
                            <a href="/importar/importar_pre" class="form-control btn btn-primary">Enviar Nova Lista</a>                                
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Cod.</th>
                                        <th>Projeto</th>
                                        <th>Arquivo</th>
                                        <th>Itens</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pre_troca_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_pre_troca'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['projeto'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nome_arquivo'];?>
</td>     
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtd_itens'];?>
</td>
                                            <td>                        
                                                <a class="glyphicon glyphicon-trash" href="/importar/delimportar/id_pre_troca/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_pre_troca'];?>
">Excluir</a> 
                                            </td>
                                        </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                        <tr><td colspan="3">Nenhum Registro Encontrado</td></tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['loglista']->value['UC'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!='') {?> 
                        <div class="row">
                            <div class="alert alert-danger">
                                <a class="alert-link">As UCs abaixo contem erros e não serão importadas !!!</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>CPF</th>
                                        <th>UC</th>
                                        <th>Nome</th>
                                        <th>Mensagem</th>                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['loglista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['cpf'];?>
</td>
                                            <td ><?php echo $_smarty_tpl->tpl_vars['linha']->value['UC'];?>
</td>
                                            <td ><?php echo $_smarty_tpl->tpl_vars['linha']->value['nome'];?>
</td>     
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['msg'];?>
</td>                    
                                        </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                        <tr><td colspan="3">Nenhum Registro Encontrado</td></tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                    <?php }?>           

                </div>
            </div>
        </form>
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/log/log_lista.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
