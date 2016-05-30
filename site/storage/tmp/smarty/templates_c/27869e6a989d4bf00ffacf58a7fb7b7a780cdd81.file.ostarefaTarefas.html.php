<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:40:04
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefaTarefas.html" */ ?>
<?php /*%%SmartyHeaderCode:1186439400572380545464c2-18806736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27869e6a989d4bf00ffacf58a7fb7b7a780cdd81' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefaTarefas.html',
      1 => 1458084573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1186439400572380545464c2-18806736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listatarefasdatarefa' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723805456adc9_14930330',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723805456adc9_14930330')) {function content_5723805456adc9_14930330($_smarty_tpl) {?>                <table class="table">
                    <thead>
                        <tr>
                            <th>Tarefa</th>
                            <th>Detalhes</th>
                            <th>Digitado em</th>
                            <th>Digitado por</th>
                            <th>Inicio da Tarefa</th>
                            <th>Fim da Tarefa</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listatarefasdatarefa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsTarefa'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacaoTarefa'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtDigitado'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsUsuario'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtInicio'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtFim'];?>
</td> 
                                <td> 
                                    <a class="glyphicon glyphicon-edit" title ="Mostrar os insumos da tarefa" onclick="ostarefa.editaOSTarefa(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefa'];?>
);"> Mostrar </a> |
                                    <a class="glyphicon glyphicon-trash" title ="Excluir esta tarefa" onclick="ostarefa.delOSTarefa(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefa'];?>
);"> Excluir </a> 
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
<?php }} ?>
