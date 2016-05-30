<?php /* Smarty version Smarty-3.1.18, created on 2016-03-21 09:34:24
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/listadocumentos.html" */ ?>
<?php /*%%SmartyHeaderCode:146784764656efea50f28639-83775794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b16db06a6a2d641e1195ecbaaca0f4b79fa21b1d' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/servicoprojeto/listadocumentos.html',
      1 => 1456322886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146784764656efea50f28639-83775794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'servicosdocumentos' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56efea5100fd53_60601499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56efea5100fd53_60601499')) {function content_56efea5100fd53_60601499($_smarty_tpl) {?>        <!--Altere daqui pra baixo-->
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
 $_from = $_smarty_tpl->tpl_vars['servicosdocumentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                        <a class="glyphicon glyphicon-pencil" onclick="servicodocumento.editarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Editar</a>  |  
                        <a class="glyphicon glyphicon-floppy-disk" onclick="servicodocumento.alterarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Gravar</a> |  
                        <a class="glyphicon glyphicon-camera" onclick="servicodocumento.alterarfinanceiro(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['nrParcela'];?>
);">Ver</a> |  
                        <a class="glyphicon glyphicon-trash" onclick="servicodocumento.delfinanceiroitem(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idFinanceiroParcela'];?>
);">Excluir</a>
                    </td>
                </tr>
                <?php } ?>        
                
            </tbody>
        </table>
        <!--Altere daqui pra cima-->
<?php }} ?>
