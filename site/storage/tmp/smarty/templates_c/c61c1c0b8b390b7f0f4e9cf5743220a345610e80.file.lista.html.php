<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 14:12:54
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/receita/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:105991727857545d96cdb135-82726177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c61c1c0b8b390b7f0f4e9cf5743220a345610e80' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/receita/lista.html',
      1 => 1465146772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105991727857545d96cdb135-82726177',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'receita_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57545d96d41e80_29838636',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57545d96d41e80_29838636')) {function content_57545d96d41e80_29838636($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Receitas</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-receita" action="/receita/busca_receita" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/receita/novo_receita"> Novo Receita</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Receita</th>
                    <th>Tipo de Receita</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['receita_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/receita/novo_receita/idReceita/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idReceita'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idReceita'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsReceita'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoReceita'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/receita/novo_receita/idReceita/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idReceita'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/receita/delreceita/idReceita/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idReceita'];?>
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
