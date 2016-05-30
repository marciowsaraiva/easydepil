<?php /* Smarty version Smarty-3.1.18, created on 2016-05-29 20:29:29
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/agendahorario/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:581858761574b7b595f7761-49265479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb240120bf7b23ad3b5ca1f174e25a96ead04915' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/agendahorario/lista.html',
      1 => 1464360442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '581858761574b7b595f7761-49265479',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'agendahorario_lista' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574b7b5964e834_50841717',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574b7b5964e834_50841717')) {function content_574b7b5964e834_50841717($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h1>Lista de Agenda Anual</h1>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-agendahorario" action="/agendahorario/busca_agendahorario" method="POST" enctype="multipart/form-data">
                    Descrição:
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscadescricao" name="buscadescricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscadescricao']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                            <br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>
        <a class="btn btn-primary" href="/agendahorario/novo_agendahorario"> Nova Agenda Anual</a>
        <br>       
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Ano</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['agendahorario_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><a href="/agendahorario/novo_agendahorario/idAgendaHorario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idAgendaHorario'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['idAgendaHorario'];?>
</a></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['soano'];?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsAgendaHorario'];?>
</td> 
                    <td ><a class="glyphicon glyphicon-pencil" href="/agendahorario/novo_agendahorario/idAgendaHorario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idAgendaHorario'];?>
">  Editar</a> |  
                        <a class="glyphicon glyphicon-trash" href="/agendahorario/delagendahorario/idAgendaHorario/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idAgendaHorario'];?>
"> Excluir</a> </td>
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
