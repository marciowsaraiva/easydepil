<?php /* Smarty version Smarty-3.1.18, created on 2016-01-13 13:35:34
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/ajudante/ajudante_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:182278955256966ec6bebb71-11032628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6b6af38145c948f737ad57f043fd31112dc7e14' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/ajudante/ajudante_lista.html',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182278955256966ec6bebb71-11032628',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscaajudante' => 0,
    'ajudante_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56966ec6c5a324_17424744',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56966ec6c5a324_17424744')) {function content_56966ec6c5a324_17424744($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">

        <div class="panel panel-default">
            <div class="panel-body">
                <h1>Lista de Ajudantes</h1>
                <div class="panel-footer">
                    <form name="frm-busca-ajudante" action="/ajudante/busca_ajudante" method="POST" enctype="multipart/form-data">
                        Nome:
                        <div class="input-group">
                            <input type="text" class="form-control" id="buscaajudante" name="buscaajudante" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscaajudante']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="submit">Buscar</button>
                            </span>          
                        </div><!-- /input-group -->
                        <div class="input-group">
                            <div id="msg"></div>                                       
                        </div><!-- /input-group -->                    
                    </form>
                </div>
            </div>  
        </div>
        <a href="/ajudante/novo_ajudante" class="btn btn-primary">Novo Ajudante</a>
        <br>
        <br>
        <!--        <div class="btn-group">
                    <button type="button" class="btn btn-default" id="btn1">Mostra</button>
                    <button type="button" class="btn btn-default" id="btn2">Oculta</button>
                    <button type="button" class="btn btn-default" id="btn3">Oculta</button>
                    <button type="button" class="btn btn-default" id="btn4">+</button>
                    <button type="button" class="btn btn-default" id="btn5">-</button>
                    <button type="button" class="btn btn-default" id="btn6">Timer</button>
                    <button type="button" class="btn btn-default" id="btn7">Para Timer</button>
                    <button type="button" class="btn btn-default" id="btn8">Focus</button>
                    <button type="button" class="btn btn-default" id="btn9">Focus</button>
                    <button type="button" class="btn btn-default" id="btn10">Focus</button>
                    <button type="button" class="btn btn-default" id="btn11">Processamento Servidor</button>
                </div>-->
        <!--        <br><br>
                <div class="row">
                    <div class="progress">
                        <div id="progressbar" class="progress-bar" role="progressbar" aria-valuemax="100" style="width: 0%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>-->

        <div id="painel">      
            <table border="1" class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone 1</th>
                        <th>Telefone 2</th>
                        <th>Email</th>
                        <!--            <th>Status</th>-->
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ajudante_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                    <tr>
                        <td><a href="/ajudante/novo_ajudante/id_ajudante/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_ajudante'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['id_ajudante'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nome'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['telefone1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['telefone2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['email'];?>
</td>
                        <!--            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['status'];?>
</td>-->
                        <td><a href="/ajudante/novo_ajudante/id_ajudante/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_ajudante'];?>
">Editar</a> |
                            <a href="#" onclick="confirma_excluir_item(<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_ajudante'];?>
)">Excluir</a> </td>
                    </tr>
                    <?php } ?>        
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script src="/files/js/ajudante/ajudante_lista.js" type="text/javascript"></script>
<script src="/files/js/bootbox.min.js" type="text/javascript"></script>

<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
