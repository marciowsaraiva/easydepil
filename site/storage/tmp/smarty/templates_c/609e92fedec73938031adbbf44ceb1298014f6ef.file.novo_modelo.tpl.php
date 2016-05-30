<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:23:41
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroModelo/novo_modelo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5604170945699716d52f735-24705978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '609e92fedec73938031adbbf44ceb1298014f6ef' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroModelo/novo_modelo.tpl',
      1 => 1452700868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5604170945699716d52f735-24705978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
    'aba' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5699716d54b4d0_65065148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5699716d54b4d0_65065148')) {function content_5699716d54b4d0_65065148($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-xs-12 main">
                <div class="col-xs-12">
                    <form name="frm_modelo" 
                          action="/tiCadastroModelo/gravar_modelo" 
                          method="POST" 
                          enctype="multipart/form-data"
                          onsubmit="return validaFormGeral();">

                        <div class="row row-button-top">
                            <div class="col-xs-6">
                                <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>
                            </div>

                            <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                                <a href="/tiCadastroModelo" class="btn btn-default btn-retornar form-control">RETORNAR</a>
                            </div>

                            <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                                <input type="button" id="salvar" class="btn btn-default btn-salvar form-control" value="SALVAR" onClick="enviarDados();"/>
                            </div>
                        </div>

                        <ul class="nav nav-tabs">                        
                            <li><a href="/tiCadastroModelo">BUSCAR</a></li>
                            <li id="li_novo_modelo" class="active"><a href="#novo_modelo" data-toggle="tab">DADOS BASICOS</a></li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade <?php if ($_smarty_tpl->tpl_vars['aba']->value<2) {?>active in<?php }?>" id="novo_modelo">
                                <?php echo $_smarty_tpl->getSubTemplate ("tiCadastroModelo/novo_modelo_geral.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            </div>                            
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>                            
<script type="text/javascript" src="/files/js/jquery.price/jquery.price_format.1.3.js"></script>
<script type="text/javascript" src="/files/js/tiCadastroModelo/modelo_novo.js"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/util.js" type="text/javascript"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js" type="text/javascript"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
