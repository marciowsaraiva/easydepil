<?php /* Smarty version Smarty-3.1.18, created on 2016-01-28 21:30:10
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/empresa/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:208966472356aaa48252e959-98372829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3cb514348400c500a212e0a64070df6cda68017' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/empresa/lista.html',
      1 => 1453713475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208966472356aaa48252e959-98372829',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'empresa_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56aaa482567c08_79571069',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56aaa482567c08_79571069')) {function content_56aaa482567c08_79571069($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <h1>Lista de Empresas</h1>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-empresa" action="/empresa/busca_empresa" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/empresa/novo_empresa"> Nova Empresa</a>
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
 $_from = $_smarty_tpl->tpl_vars['empresa_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/empresa/novo_empresa/idEmpresa/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idEmpresa'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idEmpresa'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsEmpresa'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/empresa/novo_empresa/idEmpresa/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idEmpresa'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/empresa/delempresa/idEmpresa/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idEmpresa'];?>
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
