<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 16:59:21
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/laudo/laudo_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:23739094256969e893697c4-43590275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '692a4933dd208f2efe3dc16564f7efce95e7fe89' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/laudo/laudo_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23739094256969e893697c4-43590275',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscaLote' => 0,
    'laudo_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56969e893fe256_54015720',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56969e893fe256_54015720')) {function content_56969e893fe256_54015720($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->        
        <h1>Lista de Laudos</h1>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-laudo" action="/laudo/busca_laudo" method="POST" enctype="multipart/form-data">
                    Lote :
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscaLote" name="buscaLote" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscaLote']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button><br><br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>        

        <?php if ($_SESSION['user']['tipousuario']==1||$_SESSION['user']['tipousuario']==3) {?>
        <a href="/laudo/novo_laudo" class="btn btn-primary">Novo Laudo</a>     
        <?php }?>

        <br><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Data</th>
                    <th>Lote</th>
                    <th>Parceiro</th>
                    <th>Usuário</th>
                    <th>Nota Fiscal</th>
                    <th>Documento</th>
                    <th>Quantidade</th>
                    <!--                    <th>status</th>                    -->
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['laudo_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                <tr>
                    <td>
                        <?php if ($_SESSION['user']['tipousuario']==1||$_SESSION['user']['tipousuario']==3) {?>
                            <a href="/laudo/novo_laudo/id_laudo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_laudo'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_laudo'];?>
</a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['linha']->value['id_laudo'];?>

                        <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['data_laudo'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['num_lote'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['razao_social'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['usuario'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['num_nota_fiscal'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['documento'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['quantidade'];?>
</td>
                    <!--                    <td> <?php if ($_smarty_tpl->tpl_vars['linha']->value['status']==1) {?>ATIVO<?php } else { ?>$linha.status<?php }?></td>-->
                    <td> <?php if ($_SESSION['user']['tipousuario']==1||$_SESSION['user']['tipousuario']==3) {?>
                        <!--                         <a class="glyphicon glyphicon-pencil" href="/laudo/novo_laudo/id_laudo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_laudo'];?>
">Editar</a> |-->
                        <a class="glyphicon glyphicon-trash"  href="/laudo/dellaudo/id_laudo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_laudo'];?>
">Excluir</a> |                         
                        <?php }?>
                        <a class="glyphicon glyphicon-save"   href="<?php echo $_smarty_tpl->tpl_vars['linha']->value['caminho_arquivo'];?>
">Visualizar</a></td>
                    </td>
                </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                <tr><td colspan="6">Nenhum registro encontrado</td></tr>
                <?php } ?>        
            </tbody>
        </table>


        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/log/log_lista.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
