<?php /* Smarty version Smarty-3.1.18, created on 2016-02-21 13:56:22
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/conversao/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:139460036156c9ec367d4509-15305531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '549544cab1bb5cfed6a0ffb6be25da6981738c57' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/conversao/lista.html',
      1 => 1456010300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139460036156c9ec367d4509-15305531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'conversao_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56c9ec36816248_87261101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56c9ec36816248_87261101')) {function content_56c9ec36816248_87261101($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Conversão de Unidade</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-conversao" action="/conversao/busca_conversao" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/conversao/novo_conversao"> Novo Fator de Conversao</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Fator de Conversao</th>
                    <th>Unidade Origem</th>
                    <th>Unidade Destino</th>
                    <th>Sinal</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['conversao_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/conversao/novo_conversao/idConversao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idConversao'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idConversao'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsConversao'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUnidadeOrigem'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUnidadeDestino'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['sinal'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['valordaconversao'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/conversao/novo_conversao/idConversao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idConversao'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/conversao/delconversao/idConversao/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idConversao'];?>
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
