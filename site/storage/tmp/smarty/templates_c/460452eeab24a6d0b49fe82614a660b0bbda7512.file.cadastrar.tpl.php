<?php /* Smarty version Smarty-3.1.18, created on 2016-01-21 19:13:31
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/statusos/cadastrar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8392456856a149fba44036-01731341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '460452eeab24a6d0b49fe82614a660b0bbda7512' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/statusos/cadastrar.tpl',
      1 => 1453410498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8392456856a149fba44036-01731341',
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
  'unifunc' => 'content_56a149fba84b85_82068335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a149fba84b85_82068335')) {function content_56a149fba84b85_82068335($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                                <?php echo $_smarty_tpl->getSubTemplate ("statusos/dados/dados.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
