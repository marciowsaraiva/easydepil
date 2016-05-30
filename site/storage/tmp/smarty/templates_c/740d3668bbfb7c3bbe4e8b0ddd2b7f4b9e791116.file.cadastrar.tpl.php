<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:40:17
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/cadastrar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:960259327569cb301a82b29-56591000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '740d3668bbfb7c3bbe4e8b0ddd2b7f4b9e791116' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/cadastrar.tpl',
      1 => 1452702902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '960259327569cb301a82b29-56591000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb301a93a12_32066043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb301a93a12_32066043')) {function content_569cb301a93a12_32066043($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-xs-12 main">
                <div class="col-xs-12">
                    <form id       = "frm-cadastrar"
                          name     = "frm-cadastrar"
                          action   = "/telefonia/gravar/" 
                          method   = "POST" 
                          enctype  = "multipart/form-data"
                          onsubmit = "return dados.enviarDados();">

                        <div class="row row-button-top">
                            <div class="col-xs-6">
                                <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>
                            </div>
                            <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                                <a href="/telefonia" class="btn btn-default btn-retornar form-control">RETORNAR</a>
                            </div>
                            <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                                <input type="submit" id="salvar" class="btn btn-default btn-salvar form-control" value="SALVAR" />
                            </div>
                        </div>

                        <ul class="nav nav-tabs">                        
                            <li><a href="/telefonia">BUSCAR</a></li>
                            <li class="active"><a href="#dados" data-toggle="tab">DADOS BASICOS</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="dados">
                                <?php echo $_smarty_tpl->getSubTemplate ("telefonia/dados/dados.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                            
<script type="text/javascript" src="/files/js/telefonia/cadastrar.js"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/util.js" type="text/javascript"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js" type="text/javascript"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
