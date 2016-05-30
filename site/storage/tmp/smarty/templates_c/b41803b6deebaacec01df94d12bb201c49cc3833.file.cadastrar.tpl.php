<?php /* Smarty version Smarty-3.1.18, created on 2016-01-15 20:22:17
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroOperadora/cadastrar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114248933656997119b92a24-54237966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b41803b6deebaacec01df94d12bb201c49cc3833' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/tiCadastroOperadora/cadastrar.tpl',
      1 => 1452700348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114248933656997119b92a24-54237966',
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
  'unifunc' => 'content_56997119bf9102_98988174',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56997119bf9102_98988174')) {function content_56997119bf9102_98988174($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                                <?php echo $_smarty_tpl->getSubTemplate ("tiCadastroOperadora/dados/dados.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
