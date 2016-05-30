<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:27:14
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/colaborador/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:83063543157237d525d4176-31214403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56a90064f928c56095ae74bd089e74729a83a535' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/colaborador/lista.html',
      1 => 1456007992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83063543157237d525d4176-31214403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'colaborador_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57237d526636c8_99902255',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57237d526636c8_99902255')) {function content_57237d526636c8_99902255($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Colaboradores</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-colaborador" action="/colaborador/busca_colaborador" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/colaborador/novo_colaborador"> Novo Colaborador</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Colaborador</th>
                    <th>Setor</th>
                    <th>Cargo</th>
                    <th>Mao de Obra</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['colaborador_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/colaborador/novo_colaborador/idColaborador/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idColaborador'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idColaborador'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsColaborador'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsSetor'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsCargo'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaoObra'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/colaborador/novo_colaborador/idColaborador/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idColaborador'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/colaborador/delcolaborador/idColaborador/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idColaborador'];?>
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
