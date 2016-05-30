<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:43:57
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/statusmaquina/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:13327350505723813daf9a42-62348296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8be501aca6417a22d1c708752450f002182f2a8c' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/statusmaquina/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13327350505723813daf9a42-62348296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'statusmaquina_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723813db2c499_39623269',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723813db2c499_39623269')) {function content_5723813db2c499_39623269($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Status de Maquinas</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-statusmaquina" action="/statusmaquina/busca_statusmaquina" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/statusmaquina/novo_statusmaquina"> Novo Status de Maquina</a>
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
 $_from = $_smarty_tpl->tpl_vars['statusmaquina_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/statusmaquina/novo_statusmaquina/idStatusMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusMaquina'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusMaquina'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusMaquina'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/statusmaquina/novo_statusmaquina/idStatusMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusMaquina'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/statusmaquina/delstatusmaquina/idStatusMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusMaquina'];?>
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
