<?php /* Smarty version Smarty-3.1.18, created on 2016-05-27 10:54:07
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/statuscliente/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:7899255375748517f05d9d3-01002175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ebbf459ae2d1ddf003451fb9918abdefbd443c2' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/statuscliente/lista.html',
      1 => 1464302001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7899255375748517f05d9d3-01002175',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'statuscliente_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5748517f0adac9_33975998',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5748517f0adac9_33975998')) {function content_5748517f0adac9_33975998($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Status de Clientes</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-statuscliente" action="/statuscliente/busca_statuscliente" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/statuscliente/novo_statuscliente">Novo Status</a>
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
 $_from = $_smarty_tpl->tpl_vars['statuscliente_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/statuscliente/novo_statuscliente/idStatusCliente/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusCliente'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusCliente'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusCliente'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/statuscliente/novo_statuscliente/idStatusCliente/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusCliente'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/statuscliente/delstatuscliente/idStatusCliente/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusCliente'];?>
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
