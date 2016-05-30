<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 18:14:50
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/centrocusto/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:9123241756f0644aecf954-89753705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cfb3a5fb5959db983952ac5c4ad5b425d465c2d' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/centrocusto/lista.html',
      1 => 1455217885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9123241756f0644aecf954-89753705',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'centrocusto_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56f0644af105f3_03551254',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f0644af105f3_03551254')) {function content_56f0644af105f3_03551254($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <br>
        <!--Altere daqui pra baixo-->
        <h1>Lista de CentroCustos</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-centrocusto" action="/centrocusto/busca_centrocusto" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/centrocusto/novo_centrocusto"> Novo Centro de Custo</a>
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
 $_from = $_smarty_tpl->tpl_vars['centrocusto_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/centrocusto/novo_centrocusto/idCentroCusto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idCentroCusto'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idCentroCusto'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCentroCusto'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/centrocusto/novo_centrocusto/idCentroCusto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idCentroCusto'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/centrocusto/delcentrocusto/idCentroCusto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idCentroCusto'];?>
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
