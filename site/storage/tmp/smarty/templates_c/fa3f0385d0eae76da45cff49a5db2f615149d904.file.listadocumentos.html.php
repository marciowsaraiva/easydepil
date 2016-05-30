<?php /* Smarty version Smarty-3.1.18, created on 2016-03-27 22:38:44
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/fase/listadocumentos.html" */ ?>
<?php /*%%SmartyHeaderCode:67945633356f88b24a96781-51449175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa3f0385d0eae76da45cff49a5db2f615149d904' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/fase/listadocumentos.html',
      1 => 1455636031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67945633356f88b24a96781-51449175',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fasesdocumentos' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56f88b24ac4a06_60552939',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f88b24ac4a06_60552939')) {function content_56f88b24ac4a06_60552939($_smarty_tpl) {?>        <!--Altere daqui pra baixo-->
        <h3>Documentos selecionados:</h3>
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Caminho</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fasesdocumentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td> <input type="text" disabled id="dsDocumento-<?php echo $_smarty_tpl->tpl_vars['linha']->value['idDocumento'];?>
" name="dsDocumento" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsDocumento'])===null||$tmp==='' ? '' : $tmp);?>
"></td> 
                    <td> <input type="text" disabled id="dsCaminho-<?php echo $_smarty_tpl->tpl_vars['linha']->value['idDocumento'];?>
" name="dsCaminho" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsCaminho'])===null||$tmp==='' ? '' : $tmp);?>
"></td> 
                    <td>
                        <a class="glyphicon glyphicon-pencil" onclick="fase.editarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Editar</a>  |  
                        <a class="glyphicon glyphicon-floppy-disk" onclick="fase.alterarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Gravar</a> |  
                        <a class="glyphicon glyphicon-camera" onclick="fase.alterarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Ver</a> |  
                        <a class="glyphicon glyphicon-trash" onclick="fase.delfinanceiroitem(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
);">Excluir</a>
                    </td>
                </tr>
                <?php } ?>        
                
            </tbody>
        </table>
        <!--Altere daqui pra cima-->
<?php }} ?>
