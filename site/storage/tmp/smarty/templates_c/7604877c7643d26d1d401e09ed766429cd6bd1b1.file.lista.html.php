<?php /* Smarty version Smarty-3.1.18, created on 2016-05-26 19:57:15
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/formapagamento/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:204667286657477f4b33f122-00097578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7604877c7643d26d1d401e09ed766429cd6bd1b1' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/formapagamento/lista.html',
      1 => 1464303093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204667286657477f4b33f122-00097578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'formapagamento_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57477f4b376f55_38978236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57477f4b376f55_38978236')) {function content_57477f4b376f55_38978236($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Forma de Pagamento</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-formapagamento" action="/formapagamento/busca_formapagamento" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/formapagamento/novo_formapagamento">Nova Forma</a>
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
 $_from = $_smarty_tpl->tpl_vars['formapagamento_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/formapagamento/novo_formapagamento/idFormaPagamento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFormaPagamento'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idFormaPagamento'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsFormaPagamento'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/formapagamento/novo_formapagamento/idFormaPagamento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFormaPagamento'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/formapagamento/delformapagamento/idFormaPagamento/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFormaPagamento'];?>
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
