<?php /* Smarty version Smarty-3.1.18, created on 2016-03-27 22:38:39
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/fase/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:129195127456f88b1fa6aab8-48830788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '139be69dde4f96863662ce3af3f8a172220a458f' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/fase/lista.html',
      1 => 1456784575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129195127456f88b1fa6aab8-48830788',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscaprojeto' => 0,
    'buscafase' => 0,
    'fase_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56f88b1fb08619_59955480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f88b1fb08619_59955480')) {function content_56f88b1fb08619_59955480($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Fases</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-fase" action="/fase/busca_fase" method="POST" enctype="multipart/form-data">
                    <div class="col-xs-4">
                        <label for="form-control">Digite o Nome do Projeto para Pesquisa</label>
                        <input type="text" class="form-control" name="buscaprojeto" id="buscaprojeto" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscaprojeto']->value)===null||$tmp==='' ? '' : $tmp);?>
">           
                    </div> 
                    <div class="col-xs-4">
                        <label for="form-control">Digite o Nome da Fase para Pesquisa</label>
                        <input type="text" class="form-control" name="buscafase" id="buscafase" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscafase']->value)===null||$tmp==='' ? '' : $tmp);?>
">           
                    </div>  
                    <br>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <a class="btn btn-primary" href='/fase' >Limpar </a>
                </form>
                    <br>
            </div>
        </div>
        <br>
        <a class="btn btn-primary" href="/fase/novo_fase"> Nova Fase</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Projeto</th>
                    <th>Nome do Fase</th>
                    <th>Colaborador Responsavel</th>
                    <th>Data da Abertura</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fase_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/fase/novo_fase/idFase/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFase'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idFase'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsProjeto'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsFase'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsColaborador'];?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtAbertura'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusProjeto'];?>
</td> 
                    <td ><a title="Editar os dados da Fase" class="glyphicon glyphicon-pencil" href="/fase/novo_fase/idFase/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFase'];?>
/idProjeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['cprojeto'];?>
">  A</a> |  
                        <a title="Excluir a Fase" class="glyphicon glyphicon-trash" href="/fase/delfase/idFase/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFase'];?>
/idProjeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['cprojeto'];?>
"> E</a> 
                        <a title="Mudar o status da Fase" class="glyphicon glyphicon-adjust" href="/fase/mudancadestatus/idFase/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFase'];?>
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
