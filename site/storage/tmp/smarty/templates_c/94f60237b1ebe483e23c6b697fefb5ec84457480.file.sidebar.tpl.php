<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:52:18
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/comuns/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:679479275569cb5d2f17a84-94353223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94f60237b1ebe483e23c6b697fefb5ec84457480' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/comuns/sidebar.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '679479275569cb5d2f17a84-94353223',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb5d2f3e9c1_69197102',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb5d2f3e9c1_69197102')) {function content_569cb5d2f3e9c1_69197102($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="/dashboard"><img src="/files/images/logo-fox-menor.png"> <?php echo @constant('NOME_APLICACAO');?>
</a>            
        </div>        
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">   
        
        <?php if (isset($_SESSION['user']['nome'])) {?>
             <ul class="nav navbar-nav side-nav">     
                 <?php echo $_SESSION['user']['menu_sidebar'];?>

                  
             </ul>        
             <ul class="nav navbar-nav navbar-right navbar-user">
                 <li><a href="/dashboard">Dashboard</a></li>
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if (isset($_SESSION['user']['nome'])) {?><?php echo $_SESSION['user']['nome'];?>
<?php }?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/profile"><i class="fa fa-user"></i> Perfil</a></li>                                                
                        <li class="divider"></li>
                        <li><a href="/trocar_senha/troca_senha"><i class="fa fa-user"></i>Trocar Senha</a></li>
                        <li class="divider"></li>
                        <li><a href="/login/logout"><i class="fa fa-power-off"></i> Sair</a></li>
                    </ul>
                </li>
             </ul>
        <?php } else { ?>
             <ul class="nav navbar-nav side-nav">
                <li class="active"><a href="/login"><i class="fa fa-dashboard"></i> Login</a></li>
             </ul>
        <?php }?>
    </div><!-- /.navbar-collapse -->
</nav><?php }} ?>
