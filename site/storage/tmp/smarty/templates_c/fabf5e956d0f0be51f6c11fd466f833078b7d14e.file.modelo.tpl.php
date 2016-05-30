<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:23:50
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroModelo/modelo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85936099956997176481f06-42500820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fabf5e956d0f0be51f6c11fd466f833078b7d14e' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroModelo/modelo.tpl',
      1 => 1452810215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85936099956997176481f06-42500820',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
    'buscadescricao' => 0,
    'modelo_lista' => 0,
    'linha' => 0,
    'paginacao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569971764ad737_09929648',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569971764ad737_09929648')) {function content_569971764ad737_09929648($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                            <a class="btn btn-default btn-inserir form-control" href="/tiCadastroModelo/novo_modelo">INSERIR</a>
                        </div>
                    </div>

                    <ul class="nav nav-tabs">                        
                        <li id="buscar_aba" class="active"><a href="/tiCadastroModelo" data-toggle="tab">BUSCAR</a></li>
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
                                                        <th>DESCRICAO DO MODELO</th>
                                                        <th class="text-center">ACAO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <form name="frm-busca-modelo" action="/tiCadastroModelo/busca_modelo" method="POST" enctype="multipart/form-data" onsubmit="return validaBusca();" >

                                                        <tr class="linha_busca">
                                                            <td>
                                                                <input type="text" id="buscadescricao" name="buscadescricao" class="form-control obg" maxlength="20" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscadescricao']->value)===null||$tmp==='' ? '' : $tmp);?>
" onkeypress="return semCaracterEspecial(this);" onkeyup="return semCaracterEspecial(this);"/>
                                                            </td>                                                            
                                                            
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-xs-12"> 
                                                                        <div class="col-xs-4">
                                                                            <input type="submit" id="buscar" class="btn btn-default btn-buscar col-xs-12" value="BUSCAR" />
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                            <a href="/tiCadastroModelo" class="btn btn-default btn-limpar col-xs-12">LIMPAR</a>
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                            <a href="/tiCadastroModelo/listagem_modelo" target="_blank" class="btn btn-default btn-buscar col-xs-12" >LISTAR</a>                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </form>

                                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modelo_lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                                        <tr>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['des'];?>
</td>
                                                            
                                                            <td class="text-center">
                                                                <a class="btn btn-default btn-alterar btn-mini" title="ALTERAR" href="/tiCadastroModelo/novo_modelo/id_modelo/<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_modelo'];?>
">A</a>
                                                                <a class="btn btn-default btn-excluir btn-mini" title="EXCLUIR" onclick="confirmaExcluirModelo(<?php echo $_smarty_tpl->tpl_vars['linha']->value['id_modelo'];?>
)">E</a> 
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
<script type="text/javascript" src="/files/js/tiCadastroModelo/modelo.js"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/util.js" type="text/javascript"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js" type="text/javascript"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
