<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 19:27:35
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/insumo/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:189100599556f07557233d52-42290035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4fc177dca3f0e96870346531313ef74b1ea865a' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/insumo/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189100599556f07557233d52-42290035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'insumo_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56f075572817b8_37179532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f075572817b8_37179532')) {function content_56f075572817b8_37179532($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Insumos</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-insumo" action="/insumo/busca_insumo" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/insumo/novo_insumo"> Novo Insumo</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Insumo</th>
                    <th>Grupo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Numero Série</th>
                    <th>Qtde Estoque</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['insumo_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/insumo/novo_insumo/idInsumo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idInsumo'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idInsumo'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsInsumo'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsGrupo'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMarca'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsModelo'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nrSerie'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtEstoque'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/insumo/novo_insumo/idInsumo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idInsumo'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/insumo/delinsumo/idInsumo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idInsumo'];?>
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
