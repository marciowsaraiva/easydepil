<?php /* Smarty version Smarty-3.1.18, created on 2016-03-19 16:46:39
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/maquinaparada/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:88761488556edac9ff3b809-98976768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56fbea285a6d10e0b427490acd9986a0a7aeb290' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/maquinaparada/lista.html',
      1 => 1458250360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88761488556edac9ff3b809-98976768',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'maquinaparada_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56edaca00319e5_12558065',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56edaca00319e5_12558065')) {function content_56edaca00319e5_12558065($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Motivo para Maquina Parada</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-maquinaparada" action="/maquinaparada/busca_maquinaparada" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/maquinaparada/novo_maquinaparada"> Novo Motivo</a>
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
 $_from = $_smarty_tpl->tpl_vars['maquinaparada_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/maquinaparada/novo_maquinaparada/idMaquinaParada/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquinaParada'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquinaParada'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaquinaParada'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/maquinaparada/novo_maquinaparada/idMaquinaParada/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquinaParada'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/maquinaparada/delmaquinaparada/idMaquinaParada/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idMaquinaParada'];?>
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
