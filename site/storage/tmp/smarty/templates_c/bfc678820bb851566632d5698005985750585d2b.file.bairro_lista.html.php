<?php /* Smarty version Smarty-3.1.18, created on 2016-01-11 14:14:00
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/bairro/bairro_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:5885668445693d4c8b96981-12538899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfc678820bb851566632d5698005985750585d2b' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/bairro/bairro_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5885668445693d4c8b96981-12538899',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscacpf' => 0,
    'bairro_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5693d4c8c0c459_17677133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5693d4c8c0c459_17677133')) {function content_5693d4c8c0c459_17677133($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
      <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
  

    <div id="page-wrapper">
      <h1>Lista de Bairros</h1>  
      Página <?php echo $_SESSION['paginacao']['atual'];?>
 de <?php echo $_SESSION['paginacao']['total_paginas'];?>
 Paginas. Total de <?php echo $_SESSION['paginacao']['total_registros'];?>
 Registros. 
      <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-bairro" action="/bairro/busca_bairro" method="POST" enctype="multipart/form-data">
                    <b>Nome Bairro:</b>
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscanome" name="buscanome" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscacpf']->value)===null||$tmp==='' ? '' : $tmp);?>
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
<a class="btn btn-primary" href="/bairro/novo_bairro">Novo Bairro</a>
 <a class="btn btn-primary" href="/bairro/relatorio001_pre_bairro">Relatório</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Código</th>
            <th>Bairro</th>
            
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bairro_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
        <tr>
            <td><a href="/bairro/novo_bairro/id_bairro/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_bairro'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_bairro'];?>
</a></td>        
            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nome'];?>
</td>          
            <td> 
                <a class="glyphicon glyphicon-pencil" href="/bairro/novo_bairro/id_bairro/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_bairro'];?>
">Editar</a> |
                <a class="glyphicon glyphicon-trash" onclick="confirma_excluir_item(<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_bairro'];?>
)" href="#" >Excluir</a> 
            </td>
        </tr>
        <?php } ?>        
    </tbody>
</table>
          
<ul class="pagination">
   <li><?php echo $_SESSION['paginacao']['botoes']['primeiro'];?>
</li>
       <?php echo $_SESSION['paginacao']['botoes']['meio'];?>
 
   <li><?php echo $_SESSION['paginacao']['botoes']['ultimo'];?>
</li>
</ul>  

<!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/bootbox.min.js"></script>
<script src="/files/js/util.js"></script>
<script src="/files/js/bairro/bairro_lista.js"></script>


<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
