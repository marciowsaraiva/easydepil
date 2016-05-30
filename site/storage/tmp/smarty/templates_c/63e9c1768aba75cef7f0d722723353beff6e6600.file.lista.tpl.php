<?php /* Smarty version Smarty-3.1.18, created on 2016-01-21 22:13:03
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/statusos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8705365956a1740f845e83-80042431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63e9c1768aba75cef7f0d722723353beff6e6600' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/statusos/lista.tpl',
      1 => 1453410797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8705365956a1740f845e83-80042431',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
    'controller' => 0,
    'registro' => 0,
    'linha' => 0,
    'paginacao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56a1740f8b7a47_87784618',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a1740f8b7a47_87784618')) {function content_56a1740f8b7a47_87784618($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-xs-12 main">
                <div class="col-xs-12">
                    <div class="row row-button-top">
                        <div class="col-xs-10">
                            <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                            <a class="btn btn-default btn-inserir form-control" href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/cadastrar">INSERIR</a>
                        </div>
                    </div>

                    <ul class="nav nav-tabs">                        
                        <li id="buscar_aba" class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
" data-toggle="tab">BUSCAR</a></li>
                        <li class="disabled"><a>DADOS BASICOS</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="buscar_aba">

                            <div class="panel panel-default">    
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>DESCRICAO</th>
                                                        <th class="text-center">ACAO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <form name="frm-busca" action="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/buscar" method="POST" enctype="multipart/form-data" onsubmit="return lista.validarForm();" >

                                                        <tr class="linha_busca">
                                                            <td>
                                                                <input type="text" class="form-control" id="dsStatusOS" maxlength="50" name="dsStatusOS" value="" onkeypress="return semCaracterEspecial(this);" onkeyup="return semCaracterEspecial(this);"/>
                                                            </td>                                                            
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-xs-12"> 
                                                                        <div class="col-xs-4">
                                                                            <input type="submit" id="buscar" class="btn btn-default btn-buscar col-xs-12" value="BUSCAR" />
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                            <a href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
" class="btn btn-default btn-limpar col-xs-12">LIMPAR</a>
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                            <a class="btn btn-default btn-buscar form-control" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/listar">LISTAR</a> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </form>

                                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                                        <tr>
                                                            <td>
                                                                <a title="ALTERAR" href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/cadastrar/idStatusOS/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusOS'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusOS'];?>
</a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="btn btn-default btn-alterar btn-mini" title="ALTERAR" href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/cadastrar/idStatusOS/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusOS'];?>
">A</a>
                                                                <a class="btn btn-default btn-excluir btn-mini" title="EXCLUIR" onclick="lista.excluirRegistro('<?php echo $_smarty_tpl->tpl_vars['linha']->value['idStatusOS'];?>
');">E</a> 
                                                            </td>
                                                        </tr>
                                                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                                        <tr><td colspan="100%">NENHUM REGISTRO CADASTRADO.</td></tr>
                                                    <?php } ?>        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacao']->value)===null||$tmp==='' ? '' : $tmp);?>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>                                        
<script type="text/javascript" src="/files/js<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/lista.js"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/util.js" type="text/javascript"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js" type="text/javascript"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
