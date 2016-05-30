<?php /* Smarty version Smarty-3.1.18, created on 2016-01-14 20:48:19
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroPlano/listagem_plano.tpl" */ ?>
<?php /*%%SmartyHeaderCode:344415707569825b3ed0761-94736473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cec790c45df8d0e7eeb3a9a450faa8f592c76d6' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroPlano/listagem_plano.tpl',
      1 => 1452811390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '344415707569825b3ed0761-94736473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
    'registro' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569825b3ef9da8_49831174',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569825b3ef9da8_49831174')) {function content_569825b3ef9da8_49831174($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
                <h1 style="margin-top: 0"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>            
        </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-xs-12">
                        <p><small>Impresso por: <?php echo $_SESSION['user']['nome'];?>
 - em: <?php echo date('d/m/Y H:i:s');?>
</small></p>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-xs-12">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>DESCRICAO DO PLANO</th>
                                        <th>OPERADORA</th>
                                        <th>VALOR</th>
                                        <th>MINUTOS OU TAMANHO</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                        <tr>                            
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['des'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['nomeoperadora'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['vl_mensal'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['qt_minutos'];?>
</td>
                                        </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                        <tr>
                                            <td colspan="100%">NENHUM REGISTRO ENCONTRADO</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>

<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
         <?php }} ?>
