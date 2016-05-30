<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:46:36
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/localestoque/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:705634837572381dc21df61-70854396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daf4b4deea08001038d9f5c180a736ec3df59c82' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/localestoque/lista.html',
      1 => 1455413060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '705634837572381dc21df61-70854396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'localestoque_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572381dc29a463_60208422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572381dc29a463_60208422')) {function content_572381dc29a463_60208422($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Local de Estoque</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-localestoque" action="/localestoque/busca_localestoque" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/localestoque/novo_localestoque"> Novo LocalEstoque</a>
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
 $_from = $_smarty_tpl->tpl_vars['localestoque_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/localestoque/novo_localestoque/idLocalEstoque/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idLocalEstoque'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idLocalEstoque'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsLocalEstoque'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/localestoque/novo_localestoque/idLocalEstoque/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idLocalEstoque'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/localestoque/dellocalestoque/idLocalEstoque/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idLocalEstoque'];?>
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
