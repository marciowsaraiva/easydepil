<?php /* Smarty version Smarty-3.1.18, created on 2016-06-01 15:21:05
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/tipousuario/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:1525072319574f2792001047-65856152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '999fef85a7ec46ec9daafe8abc77ff3fade34bcf' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/tipousuario/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1525072319574f2792001047-65856152',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'tipousuario_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574f279202c248_21093357',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f279202c248_21093357')) {function content_574f279202c248_21093357($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Tipos de Usuários</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-tipousuario" action="/tipousuario/busca_tipousuario" method="POST" enctype="multipart/form-data">
                    Descrição:
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscadescricao" name="buscadescricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscadescricao']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                            <br>
                            <br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>
        <br>
        <a class="btn btn-primary" href="/tipousuario/novo_tipousuario"> Novo Tipo</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipousuario_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/tipousuario/novo_tipousuario/idTipoUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoUsuario'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/tipousuario/novo_tipousuario/idTipoUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/tipousuario/deltipousuario/idTipoUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
">  Excluir</a></td>
                </tr>
                <?php } ?>        
            </tbody>
        </table>
        <!--Altere daqui pra cima-->
    </div>
</div>
<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
