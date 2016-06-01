<?php /* Smarty version Smarty-3.1.18, created on 2016-06-01 15:08:16
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/tratamento/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:511417359574f24908bcd23-11562368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c03b1c0459ddfaaa6b7664c3916e790e76b465d' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/tratamento/lista.html',
      1 => 1464300061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '511417359574f24908bcd23-11562368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'tratamento_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574f24908fd6d3_20568408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f24908fd6d3_20568408')) {function content_574f24908fd6d3_20568408($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Tratamentos</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-tratamento" action="/tratamento/busca_tratamento" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/tratamento/novo_tratamento"> Novo Tratamento</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Tratamento</th>
                    <th>Tipo de Tratamento</th>
                    <th>Valor</th>
                    <th>Tempo</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tratamento_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/tratamento/novo_tratamento/idTratamento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTratamento'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idTratamento'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTratamento'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoTratamento'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vlTratamento'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTempo'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/tratamento/novo_tratamento/idTratamento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTratamento'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/tratamento/deltratamento/idTratamento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idTratamento'];?>
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
