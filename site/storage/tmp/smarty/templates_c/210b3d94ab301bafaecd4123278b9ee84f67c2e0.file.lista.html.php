<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 09:34:23
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:100652383356efea4f41b8b9-15379211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '210b3d94ab301bafaecd4123278b9ee84f67c2e0' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/lista.html',
      1 => 1456786381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100652383356efea4f41b8b9-15379211',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscaprojeto' => 0,
    'buscafase' => 0,
    'buscaservico' => 0,
    'servicoprojeto_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56efea4f463582_69652845',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56efea4f463582_69652845')) {function content_56efea4f463582_69652845($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Serviços do Projeto</h1>
        <br>
        <a class="btn btn-primary" href="/servicoprojeto/novo_servicoprojeto"> Novo Serviço</a>
        <br>       
        <br>       
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-servicoprojeto" action="/servicoprojeto/busca_servicoprojeto" method="POST" enctype="multipart/form-data">
                    <div class="col-xs-3">
                        <label for="form-control">Digite o Nome do Projeto para Pesquisa</label>
                        <input type="text" class="form-control" name="buscaprojeto" id="buscaprojeto" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscaprojeto']->value)===null||$tmp==='' ? '' : $tmp);?>
">           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Digite o Nome da Fase para Pesquisa</label>
                        <input type="text" class="form-control" name="buscafase" id="buscafase" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscafase']->value)===null||$tmp==='' ? '' : $tmp);?>
">           
                    </div>  
                    <div class="col-xs-3">
                        <label for="form-control">Digite o Nome do Serviço para Pesquisa</label>
                        <input type="text" class="form-control" name="buscaservico" id="buscaservico" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscaservico']->value)===null||$tmp==='' ? '' : $tmp);?>
">           
                    </div>  
                    <br>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <a class="btn btn-primary" href='/servicoprojeto' >Limpar </a>
                </form>
                <br>
            </div>
        </div>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Projeto</th>
                    <th>Fase</th>
                    <th>Serviço</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['servicoprojeto_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/servicoprojeto/novo_servicoprojeto/idProjetoServico/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjetoServico'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjetoServico'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nomeprojeto'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nomefase'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsServicoProjeto'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusProjeto'];?>
</td> 
                    <td><a class="glyphicon glyphicon-pencil" href="/servicoprojeto/novo_servicoprojeto/idProjetoServico/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjetoServico'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/servicoprojeto/delservicogeral/idProjetoServico/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjetoServico'];?>
">  Excluir</a>
                        <a title="Mudar o status do Serviço" class="glyphicon glyphicon-adjust" href="/servicoprojeto/mudancastatus/idProjetoServico/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjetoServico'];?>
">  M</a></td>
                    </td>
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
