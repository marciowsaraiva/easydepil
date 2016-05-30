<?php /* Smarty version Smarty-3.1.18, created on 2016-03-03 18:37:34
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/origeminformacao/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:126643256756d8ae9ea9bc54-39860722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98042669a6721fe39376d07da7c0e30aaf49d574' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/origeminformacao/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126643256756d8ae9ea9bc54-39860722',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'origeminformacao_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56d8ae9eb0efc8_51411065',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d8ae9eb0efc8_51411065')) {function content_56d8ae9eb0efc8_51411065($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Origem da Informação</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-origeminformacao" action="/origeminformacao/busca_origeminformacao" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/origeminformacao/novo_origeminformacao">Novo Origem da Informação</a>
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
 $_from = $_smarty_tpl->tpl_vars['origeminformacao_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/origeminformacao/novo_origeminformacao/idOrigemInformacao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemInformacao'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemInformacao'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsOrigemInformacao'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/origeminformacao/novo_origeminformacao/idOrigemInformacao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemInformacao'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/origeminformacao/delorigeminformacao/idOrigemInformacao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemInformacao'];?>
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
