<?php /* Smarty version Smarty-3.1.18, created on 2016-01-30 19:33:23
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/origemrateio/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:145396836356ad2c23dfa675-44453401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2029737687a42d732bc009300bacbecedd0eb121' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/origemrateio/lista.html',
      1 => 1454106931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145396836356ad2c23dfa675-44453401',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'origemrateio_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56ad2c23e4bac9_65783546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ad2c23e4bac9_65783546')) {function content_56ad2c23e4bac9_65783546($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <h1>Lista de Origem de Rateios</h1>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-origemrateio" action="/origemrateio/busca_origemrateio" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/origemrateio/novo_origemrateio">Novo OrigemRateio</a>
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
 $_from = $_smarty_tpl->tpl_vars['origemrateio_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/origemrateio/novo_origemrateio/idOrigemRateio/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemRateio'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemRateio'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsOrigemRateio'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/origemrateio/novo_origemrateio/idOrigemRateio/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemRateio'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/origemrateio/delorigemrateio/idOrigemRateio/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOrigemRateio'];?>
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
