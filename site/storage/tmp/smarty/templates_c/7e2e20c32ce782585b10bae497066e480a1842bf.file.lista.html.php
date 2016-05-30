<?php /* Smarty version Smarty-3.1.18, created on 2016-05-26 20:08:15
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/cliente/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:366461198574781dfb046d1-54570868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e2e20c32ce782585b10bae497066e480a1842bf' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/cliente/lista.html',
      1 => 1464301339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '366461198574781dfb046d1-54570868',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'cliente_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574781dfb426f2_84445025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574781dfb426f2_84445025')) {function content_574781dfb426f2_84445025($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <br>
        <!--Altere daqui pra baixo-->
        <h1>Lista de Clientes</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-cliente" action="/cliente/busca_cliente" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/cliente/novo_cliente"> Novo Cliente</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Cliente</th>
                    <th>Endereco</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Celular</th>
                    <th>Tipo</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cliente_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/cliente/novo_cliente/idCliente/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idCliente'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idCliente'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCliente'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsEndereco'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCidade'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsBairro'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCelular'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTipoCliente'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/cliente/novo_cliente/idCliente/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idCliente'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/cliente/delcliente/idCliente/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idCliente'];?>
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
