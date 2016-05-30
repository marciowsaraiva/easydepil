<?php /* Smarty version Smarty-3.1.18, created on 2016-02-11 17:17:19
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/grupocusto/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:174198358756bcde3f782b57-90541093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54262dddfd72619a5ffb643a634b6649ba23e397' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/grupocusto/lista.html',
      1 => 1455218221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174198358756bcde3f782b57-90541093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'grupocusto_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56bcde3f7af628_35655853',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56bcde3f7af628_35655853')) {function content_56bcde3f7af628_35655853($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Grupo de Custos</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-grupocusto" action="/grupocusto/busca_grupocusto" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/grupocusto/novo_grupocusto"> Novo Grupo de Custo</a>
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
 $_from = $_smarty_tpl->tpl_vars['grupocusto_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/grupocusto/novo_grupocusto/idGrupoCusto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idGrupoCusto'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idGrupoCusto'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsGrupoCusto'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/grupocusto/novo_grupocusto/idGrupoCusto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idGrupoCusto'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/grupocusto/delgrupocusto/idGrupoCusto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idGrupoCusto'];?>
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
