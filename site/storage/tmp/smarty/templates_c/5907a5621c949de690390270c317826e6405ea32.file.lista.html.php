<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:43:08
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servico/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:17268218825723810c283374-55716230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5907a5621c949de690390270c317826e6405ea32' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servico/lista.html',
      1 => 1456686248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17268218825723810c283374-55716230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'servico_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723810c305d23_21355113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723810c305d23_21355113')) {function content_5723810c305d23_21355113($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Servicos</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-servico" action="/servico/busca_servico" method="POST" enctype="multipart/form-data">
                    Descrição:
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscadescricao" name="buscadescricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscadescricao']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                            <br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>
        <a class="btn btn-primary" href="/servico/novo_servico"> Novo Servico</a>
        <br>       
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Servico</th>
                    <th>Tipo de Serviço</th>
                    <th>Observação</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servico_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/servico/novo_servico/idServico/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idServico'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idServico'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsServico'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoServico'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vlOrcado'];?>
</td> 
                    <td ><a class="glyphicon glyphicon-pencil" href="/servico/novo_servico/idServico/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idServico'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/servico/delservico/idServico/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idServico'];?>
"> Excluir</a> </td>
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
