<?php /* Smarty version Smarty-3.1.18, created on 2016-03-27 22:38:35
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/projeto/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:3683974256f88b1b8d3861-80811885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4714fe77043f5d72122ab28cdc95a715605d53db' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/projeto/lista.html',
      1 => 1456358492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3683974256f88b1b8d3861-80811885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'projeto_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56f88b1b91ff17_68220210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f88b1b91ff17_68220210')) {function content_56f88b1b91ff17_68220210($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Projetos</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-projeto" action="/projeto/busca_projeto" method="POST" enctype="multipart/form-data">
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
        <a class="btn btn-primary" href="/projeto/novo_projeto"> Novo Projeto</a>
        <br>       
        <br>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Projeto</th>
                    <th>Empresa</th>
                    <th>Colaborador Responsavel</th>
                    <th>Data da Abertura</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projeto_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/projeto/novo_projeto/idProjeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjeto'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjeto'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsProjeto'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsEmpresa'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsColaborador'];?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtAbertura'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusProjeto'];?>
</td> 
                    <td><a title="Editar os dados do Projeto" class="glyphicon glyphicon-pencil" href="/projeto/novo_projeto/idProjeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjeto'];?>
">  A</a> |  
                        <a title="Excluir o Projeto" class="glyphicon glyphicon-trash" href="/projeto/delprojeto/idProjeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjeto'];?>
">  E</a> |
                        <a title="Mudar o status do Projeto" class="glyphicon glyphicon-adjust" href="/projetomudanca/novo_projetomudanca/idProjeto/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjeto'];?>
">  M</a></td>
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
