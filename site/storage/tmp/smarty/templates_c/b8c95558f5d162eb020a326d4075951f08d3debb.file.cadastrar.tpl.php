<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:23:56
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroMarca/cadastrar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2512927965699717c8730c3-02886747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8c95558f5d162eb020a326d4075951f08d3debb' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroMarca/cadastrar.tpl',
      1 => 1452700187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2512927965699717c8730c3-02886747',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller' => 0,
    'tituloPagina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5699717c89c128_72542682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5699717c89c128_72542682')) {function content_5699717c89c128_72542682($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="col-xs-12 main">

                <div class="col-xs-12">

                    <form id       = "frm-cadastrar"
                          name     = "frm-cadastrar"
                          action   = "<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/gravar/" 
                          method   = "POST" 
                          enctype  = "multipart/form-data"
                          onsubmit = "return cadastrar.enviarDados();">

                        <div class="row row-button-top">
                            <div class="col-xs-6">
                                <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>
                            </div>
                            <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
" class="btn btn-default btn-retornar form-control">RETORNAR</a>
                            </div>
                            <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                                <input type="submit" id="salvar" class="btn btn-default btn-salvar form-control" value="SALVAR" />
                            </div>
                        </div>

                        <ul class="nav nav-tabs">                        
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
">BUSCAR</a></li>
                            <li class="active"><a href="#dados" data-toggle="tab">DADOS BASICOS</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="dados">
                                <?php echo $_smarty_tpl->getSubTemplate ("tiCadastroMarca/dados/dados.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                          
<script type="text/javascript" src="/files/js<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/cadastrar.js"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/util.js" type="text/javascript"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js" type="text/javascript"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
