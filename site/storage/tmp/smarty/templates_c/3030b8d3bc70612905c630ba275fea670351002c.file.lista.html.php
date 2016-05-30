<?php /* Smarty version Smarty-3.1.18, created on 2016-03-16 18:27:54
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/pontopedido/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:76756218556e9cfda057639-43446031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3030b8d3bc70612905c630ba275fea670351002c' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/pontopedido/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76756218556e9cfda057639-43446031',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'pontopedido_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e9cfda0ad075_40445500',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e9cfda0ad075_40445500')) {function content_56e9cfda0ad075_40445500($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Insumos com Ponto de Pedido</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-pontopedido" action="/pontopedido/busca_insumo" method="POST" enctype="multipart/form-data">
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
<!--        <a class="btn btn-primary" href="/pontopedido/novo_insumo"> Novo Insumo</a>-->
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
                    <th>Ponto de Pedido</th>
                    <th>Lote de Reposição</th>
                    <th>Ultima Compra</th>
                    <th>Fornecedor</th>
                    <th>Qtde</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pontopedido_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/pontopedido/novo_insumo/idInsumo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idInsumo'];?>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtMinima'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtLoteReposicao'];?>
</td> 
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtUltimaCompra'],'%d/%m/%Y');?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsFornecedor'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtUltimaCompra'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vlUltimaCompra'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/pontopedido/novo_insumo/idInsumo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idInsumo'];?>
">  Editar</a>                        </td>
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
