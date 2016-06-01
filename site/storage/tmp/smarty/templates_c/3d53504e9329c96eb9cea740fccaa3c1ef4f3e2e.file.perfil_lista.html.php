<?php /* Smarty version Smarty-3.1.18, created on 2016-06-01 13:14:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/perfil/perfil_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:1661186944574f09d5375d99-62720640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d53504e9329c96eb9cea740fccaa3c1ef4f3e2e' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/perfil/perfil_lista.html',
      1 => 1456684448,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1661186944574f09d5375d99-62720640',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'perfil_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574f09d53a3350_21134577',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f09d53a3350_21134577')) {function content_574f09d53a3350_21134577($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <br>
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <h1>Lista de Perfis</h1>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-perfil" action="/perfil/busca_perfil" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/perfil/novo_perfil"> Novo Perfil</a>
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
 $_from = $_smarty_tpl->tpl_vars['perfil_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/perfil/novo_perfil/idPerfil/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPerfil'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idPerfil'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsPerfil'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/perfil/novo_perfil/idPerfil/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPerfil'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/perfil/delperfil/idPerfil/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idPerfil'];?>
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
