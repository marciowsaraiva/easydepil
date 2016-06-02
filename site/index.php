<?php 
	include("includes.php");
	//DIRETORIO PADRAO PARA PAGINAS
	$dir = "_paginas/";
	//extencao PHP
	$ext = ".php";
	//variavel pagina que abrira o conteudo
	$pag = "home";
	/*SE ESTIVER SETADA A VARIAVEL GLOBAL 'GET'
	ELE ENTRA PARA SABER A PAGINA CHAMADA*/
	if(isset($_GET['pag'])){
		$pag = $_GET['pag'];
	}
	$pagina = $dir.$pag.$ext;
	
	if (!is_file($pagina)){
		header("Location:".Cfg_http."home/");
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--METAS-->
    <meta name="resource-types" content="document" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="classification" content="Internet" />
    <meta name="title" content="<?php print Cfg_Titulo; ?>">
    <meta name="url" content="<?php print Cfg_Url; ?>">
    <meta name="description" content="<?php print Cfg_Description; ?>">
    <meta name="keywords" content="<?php print Cfg_Keywords; ?>">
    <meta name="charset" content="utf-8">
    <meta name="robots" content="ALL" />
    <meta name="distribution" content="Global" />
    <meta name="rating" content="General" />
    <meta name="language" content="pt-br" />
    <meta name="doc-class" content="Completed" />
    <meta name="doc-rights" content="Public" />
    <meta name="revisit-after" content="5">
    <meta name="autor" content="<?php print Cfg_TitAgencia; ?>">
    <meta name="company" content="<?php print Cfg_TitAgencia; ?>">
    <link rev=made href="mailto:<?php print Cfg_EmailAgencia; ?>">
    <link rel="shortcut icon" href="_img/favicon.ico" type "image/x-icon/">
	<base href="<?php print Cfg_http; ?>" />
	<title><?php print Cfg_TitlePag; ?></title>
    
	<script src="_js/funcoes.js" type="text/javascript"></script>
	<script src="_js/jquery-1.6.1.js" type="text/javascript"></script>
	<script src="_js/menu.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="_js/jquery-fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="_js/jquery-fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="_js/jquery-fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function(){
			$("a[rel=fancybox]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Imagem ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
	</script>
	
	<? if ($pag == "home"){ ?>
	<link rel="stylesheet" type="text/css" href="css/slide.css" />
	<script language="javascript" type="text/javascript" src="_js/slider/js/jquery.easing.js"></script>
	<script language="javascript" type="text/javascript" src="_js/slider/js/script.js"></script>
	<script type="text/javascript">
		$(document).ready( function(){	
			// buttons for next and previous item						 
			var buttons = { previous:$('#slidecontent .button-previous') ,
							next:$('#slidecontent .button-next') };			
			$('#slidecontent').lofJSidernews( { interval : 5000,
												direction		: 'opacitys',	
												easing			: 'easeInOutExpo',
												duration		: 2200,
												auto		 	: true,
												maxItemDisplay  : 4,
												navPosition     : 'horizontal', // horizontal
												navigatorHeight : 32,
												navigatorWidth  : 80,
												mainWidth		: 900,
												buttons			: buttons } );	
		});
	</script>
	<? } ?>
	    
    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #999999}
.style5 {
	color: #FFFFFF;
	font-family: Tahoma;
	font-size: 10px;
}
-->
    </style>
</head>
<body>
	<div id="Geral">
		<div id="Topo">
			<div id="Topo-Logo"><a href="home/" title="<?php print Cfg_Titulo; ?>"><img src="_img/logotipo-easy-depil.png" border="0" /></a></div>
		</div>
		        
		<div id="Conteudo">
			<div id="Conteudo-Menu">
				<ul id="menu">
					<li><a href="home/">Home</a></li>
					<li><a href="javascript:void(0);">Institucional</a>
						<ul class="submenu">
							<?php
								$sql_i = "SELECT * FROM paginas WHERE pag_tipo='institucional' AND pag_ativo = 'S' ORDER BY pag_ordem, pag_titulo";
								$query_i = mysql_query($sql_i);
								$rows_i = mysql_num_rows($query_i);
	
								if ($rows_i > 0){
									while($rs_i = mysql_fetch_array($query_i)){
										$UrlManage = new UrlManage();
										$link = $UrlManage->getUrl("institucional", $rs_i['pag_id'], $rs_i['pag_titulo']);
							?>
							<li><a href="<?php print $link; ?>"><?php print $rs_i['pag_titulo']; ?></a></li>
							<?php
									}
								}
							?>
							<li><a href="depoimentos/">Depoimentos</a>
							<ul>
								<li>teste</li>
								<li>teste</li>
							</ul>
							</li>
							<li><a href="trabalhe-conosco/">Trabalhe Conosco</a></li>
						</ul>
					</li>
					<li><a href="javascript:void(0);">Tratamentos</a>
						<ul class="submenu">
							<?php
								$sql_t = "SELECT * FROM tratamentos_tipos WHERE tti_ativo = 'S' ORDER BY tti_ordem, tti_titulo";
								$query_t = mysql_query($sql_t);
								$rows_t = mysql_num_rows($query_t);
	
								if ($rows_t > 0){
									while($rs_t = mysql_fetch_array($query_t)){
										$UrlManage = new UrlManage();
										$link = "tratamentos/" . $rs_t['tti_id'] . "/" . $UrlManage->convertStringByUrlString($rs_t['tti_titulo']) . "/";
							?>
							<li><a href="<?php print $link; ?>"><?php print $rs_t['tti_titulo']; ?></a></li>
							<?php
									}
								}
							?>
						</ul>
					</li>
					<li><a href="equipamentos/">Equipamentos</a></li>
					<li><a href="produtos/">Produtos</a></li>
					<li><a href="dicas/">Dicas</a></li>
					<li><a href="contato/">Contato</a></li>
				</ul>
			</div>
		
			<div id="Conteudo-Pagina">
				<?php include($pagina); ?>
			</div>
		</div>
        
        <div id="Rodape">

			<div id="Rodape-Left">
				<b><span class="style5">Horário de Funcionamento: Seg a Sexta das 08:00 as 21:00</span><span class="style3"> |</span> <span class="style5">Sábado das 08:00 as 16:00</span></b><br />
				<span class="style5">Rua Convenção, 609 - Vila Nova - Itu/SP - Fone: (11) 4025-0575</span><br />
				<span class="style5">2012</span> <span class="style5">&copy; Clinica de Fisioterapia e Est&eacute;tica Easy Depil Ltda - Todos os direitos reservados. </span></div>
<div id="Rodape-Right">
				<a href="http://www.twitter.com/easydepil" target="_blank" title="Twitter"><img src="_img/ico-twitter.png" border="0" /></a>
				<a href="http://www.facebook.com/easydepil" target="_blank" title="Facebook"><img src="_img/ico-facebook.png" border="0" /></a>
				<a href="http://www.orkut.com/easydepil" target="_blank" title="Orkut"><img src="_img/ico-orkut.png" border="0" /></a>
				<a href="http://www.linkedin.com/easydepil" target="_blank" title="Linkedin"><img src="_img/ico-linkedin.png" border="0" /></a>
				<a href="http://www.youtube.com/easydepil" target="_blank" title="Youtube"><img src="_img/ico-youtube.png" border="0" /></a>
				<a href="http://www.flickr.com/easydepil" target="_blank" title="Flickr"><img src="_img/ico-flickr.png" border="0" /></a>
				<p>produzido por <a href="http://<?php print Cfg_httpAgencia; ?>" target="_blank"><?php print Cfg_TitAgencia; ?></a></p>
			</div>
			<div style="clear:both;"></div>
		</div>
        
    </div>
	
	<!-- ANALYTICS -->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29509503-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<!-- ANALYTICS -->
</body>
</html>