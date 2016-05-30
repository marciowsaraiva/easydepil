<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:44:16
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/maquinamudanca/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:20039107135723815058ae70-27003853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd4f49c3de32b63d14fe2d3e43b6087574dae502' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/maquinamudanca/lista.html',
      1 => 1455217835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20039107135723815058ae70-27003853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'maquinamudanca_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572381505e24f0_94116339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572381505e24f0_94116339')) {function content_572381505e24f0_94116339($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Maquinas para Mudança de Status</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-maquinamudanca" action="/maquinamudanca/busca_maquinamudanca" method="POST" enctype="multipart/form-data">
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
<!--        <a class="btn btn-primary" href="/maquinamudanca/novo_maquinamudanca"> Nova Maquina</a>  -->
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Maquina</th>
                    <th>Grupo de Custo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Numero Série</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['maquinamudanca_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/maquinamudanca/novo_maquinamudanca/idMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaquina'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsGrupoCusto'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMarca'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsModelo'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nrSerie'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusMaquina'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/maquinamudanca/novo_maquinamudanca/idMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
">  Mudar</a>  
<!--                        <a class="glyphicon glyphicon-trash" href="/maquinamudanca/delmaquinamudanca/idMaquina/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquina'];?>
">  Excluir</a></td>-->
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
