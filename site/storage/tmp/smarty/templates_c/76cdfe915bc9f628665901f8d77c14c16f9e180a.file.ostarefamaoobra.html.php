<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:40:04
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefamaoobra.html" */ ?>
<?php /*%%SmartyHeaderCode:765917705572380544db435-52887551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76cdfe915bc9f628665901f8d77c14c16f9e180a' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/ostarefa/ostarefamaoobra.html',
      1 => 1458087303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '765917705572380544db435-52887551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_ostarefamaoobra' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_572380544f4ae6_59036984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572380544f4ae6_59036984')) {function content_572380544f4ae6_59036984($_smarty_tpl) {?>                <table class="table">
                    <thead>
                        <tr>
                            <th>Mao de Obra</th>
                            <th>Inicio da Tarefa</th>
                            <th>Fim da Tarefa</th>
                            <th>Observação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_ostarefamaoobra']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsMaoObra'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtInicio'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dtFim'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="ostarefa.delOSTarefaMaoObra(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefa'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['idOSTarefaMaoObra'];?>
);" > Excluir </a>
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>
<?php }} ?>
