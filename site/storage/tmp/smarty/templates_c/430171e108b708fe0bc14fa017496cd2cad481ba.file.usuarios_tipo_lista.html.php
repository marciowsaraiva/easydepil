<?php /* Smarty version Smarty-3.1.18, created on 2016-01-11 11:04:04
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/usuarios_tipo/usuarios_tipo_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:6800070785693a8449efce5-38659978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '430171e108b708fe0bc14fa017496cd2cad481ba' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/usuarios_tipo/usuarios_tipo_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6800070785693a8449efce5-38659978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscamensagem' => 0,
    'usuarios_tipo_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5693a844a55106_10606242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5693a844a55106_10606242')) {function content_5693a844a55106_10606242($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        
                <h1>Lista de Tipos de Usu&aacute;rios</h1>
                
            
                <div class="panel panel-default">
          
            <div class="panel-footer">
                <form name="frm-busca-tipousuarios" action="/usuarios_tipo/busca_usuarios_tipo" method="POST" enctype="multipart/form-data">
                    
                        Descri&ccedil;&atilde;o:
                        <div class="input-group">
                            <input type="text" class="form-control" id="buscamensagem" name="buscamensagem" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscamensagem']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">Buscar</button>
                            </span>          
                        </div><!-- /input-group -->
                  

                </form>
            </div>
            
        </div>



        <a href="/usuarios_tipo/novo_usuarios_tipo" class="btn btn-primary">Novo Tipos de Usu&aacute;rios</a>     

        <br><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Descri&ccedil;&atilde;o</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios_tipo_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                <tr>
                    <td><a href="/usuarios_tipo/novo_usuarios_tipo/idTipoUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['descricao'];?>
</td>
                    <td> <a class="glyphicon glyphicon-pencil" href="/usuarios_tipo/novo_usuarios_tipo/idTipoUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
">Editar</a> |
                    <a class="glyphicon glyphicon-trash" href="/usuarios_tipo/del_usuarios_tipo/idTipoUsuario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTipoUsuario'];?>
">Excluir</a> </td>
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
<script src="/files/js/usuarios_tipo/usuarios_tipo_lista.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
