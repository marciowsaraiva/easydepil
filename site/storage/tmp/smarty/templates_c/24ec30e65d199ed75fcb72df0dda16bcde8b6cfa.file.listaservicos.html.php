<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 09:34:24
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/listaservicos.html" */ ?>
<?php /*%%SmartyHeaderCode:109451320756efea51012c31-43763326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24ec30e65d199ed75fcb72df0dda16bcde8b6cfa' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/listaservicos.html',
      1 => 1456672190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109451320756efea51012c31-43763326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista_servicosprojeto' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56efea51029903_81402502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56efea51029903_81402502')) {function content_56efea51029903_81402502($_smarty_tpl) {?>                <table class="table">
                    <thead>
                        <tr>
                            <th>Serviço</th>
                            <th>Quantidade</th>
                            <th>Valor Total</th>
                            <th>Observacao</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista_servicosprojeto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsServico'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qtServico'];?>
</td> 
                                <td>R$ <?php echo $_smarty_tpl->tpl_vars['linha']->value['vlTotal'];?>
</td> 
                                <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsObservacao'];?>
</td> 
                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="delservico(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idProjetoServicosServico'];?>
);"   > Excluir </a>
                                </td>
                            </tr>
                        <?php } ?>        
                    </tbody>
                </table>

<?php }} ?>
