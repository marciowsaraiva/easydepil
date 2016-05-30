<?php /* Smarty version Smarty-3.1.18, created on 2016-05-25 22:31:38
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/login/login.html" */ ?>
<?php /*%%SmartyHeaderCode:377290073574651fa5107d9-29369757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90bd8583ce50b2d50fc835e987b16efa1b7a8907' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/login/login.html',
      1 => 1454720191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '377290073574651fa5107d9-29369757',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensagem' => 0,
    'site_easydepil' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574651fa5fc283_19232054',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574651fa5fc283_19232054')) {function content_574651fa5fc283_19232054($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/files/images/EasyDepil.ico">

        <title>Produção - login</title>

        <!-- Bootstrap core CSS -->
        <link href="/files/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="/files/css/signin.css" rel="stylesheet">
        <script src="/files/js/jquery-1.10.2.js"></script>
        <script src="/files/js/login/login.js"></script>

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>        

        <div class="container">

            <div id="div-aviso" hidden>
                <div class="alert alert-danger alert-dismissable">
                    <br>Seu navegador <b><span id="navegador">'não detectado'</span></b> não é indicado para acesso ao Portal. 
                    Por favor, utilize Google Chrome ou FireFox para melhor visualização.<br><br>
                </div>
            </div>  

            <form class="form-signin" role="form" action="/login/logar/" method="POST" enctype="multipart/form-data">

                <h4 class="form-signin-heading">Entre com seus dados de acesso:</h4>

                <input type="email" class="form-control" placeholder="email" name="email" required autofocus>
                <input type="password" class="form-control" placeholder="password" name="password"  required>

                <?php if (isset($_smarty_tpl->tpl_vars['mensagem']->value)&&$_smarty_tpl->tpl_vars['mensagem']->value!='') {?>
                <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['mensagem']->value;?>
</div>
                <?php }?>

                <label class="checkbox">
                    <input type="checkbox" value="lembrar senha" />
                    Lembrar senha
                </label>

                <button class="btn btn-lg btn-success-outline btn-block" type="submit">Entrar</button>
<!--                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>-->

            </form>

        </div> <!-- /container -->

        <?php if ($_smarty_tpl->tpl_vars['site_easydepil']->value) {?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-65346259-3', 'auto');
            ga('send', 'pageview');

        </script>
        <?php }?>

    </body>
</html>
<?php }} ?>
