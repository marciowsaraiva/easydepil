<?php /* Smarty version Smarty-3.1.18, created on 2016-01-31 09:02:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/profile/index.html" */ ?>
<?php /*%%SmartyHeaderCode:135060835856ade9b564fc75-48581983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '001885cfd9958ecdd2892d3981965df6cd556404' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/profile/index.html',
      1 => 1453409141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135060835856ade9b564fc75-48581983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'fone1' => 0,
    'fone2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56ade9b567d6e3_66628512',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ade9b567d6e3_66628512')) {function content_56ade9b567d6e3_66628512($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!-- Sidebar -->
        <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
        
        <!--Altere daqui pra baixo-->


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Perfil</h1>          
                    <hr>
                    <ol class="breadcrumb">
                    <?php if ($_SESSION['user']['tipousuario']!=1&&$_SESSION['user']['tipousuario']!=3) {?>
                    <b>Projeto:</b> <?php echo $_SESSION['user']['projeto']['nome'];?>
 <br>
                    <?php }?>                                   
                    <b>Nome:</b> <?php echo $_SESSION['user']['nome'];?>
<br>
                    <b>Email:</b> <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
 <br>
                    <b>Telefone 1:</b> <?php echo $_smarty_tpl->tpl_vars['fone1']->value;?>
 <br>
                    <b>Telefone 2:</b> <?php echo $_smarty_tpl->tpl_vars['fone2']->value;?>
             <br>                         
                    
                    </ol>                    
                </div>
            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<!-- Toast Message -->
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<!-- Utils -->
<script src="/files/js/util.js"></script>
<!-- Blank JS -->
<!--<script src="/files/js/blank/blank.js"></script> -->
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
