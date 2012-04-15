<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<title>Pitagoras</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/css/modal-window.css">
		<link rel="stylesheet" type="text/css" href="/css/upload/styles.css">
		<link rel="stylesheet" type="text/css" href="/js/upload/plupload.queue/css/jquery.plupload.queue.css">
		<script src="/js/jquery-1.7.2.min.js"></script>
		<script src="/js/modal-window.js"></script>
		<script src="/js/base.js"></script>
		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
			.sidebar-nav {
				padding: 9px 0;
			}
		</style>
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le fav and touch icons -->
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="#">Pitagoras</a>
					<div class="nav-collapse">
						<ul class="nav">
							<li >
								<a id="menu_home" href="#">Home</a>
							</li>
							<li <?PHP if ($page == 'usuario') echo 'class="active"'; ?> >
								<a href="<?PHP echo _LINK_;?>usuario/formulario/">Usuario</a>
							</li>
							<li <?PHP if ($page == 'evento') echo 'class="active"'; ?> >
								<a href="<?PHP echo _LINK_;?>evento/">Eventos</a>
							</li>
							<li <?PHP if ($page == 'curso') echo 'class="active"'; ?>>
								<a href="<?PHP echo _LINK_;?>curso/formulario/">Cursos</a>
							</li>
							<li <?PHP if ($page == 'edicao') echo 'class="active"'; ?>>
								<a href="<?PHP echo _LINK_;?>edicao/formulario/">Edições</a>
							</li>
							<li <?PHP if ($page == 'noticia') echo 'class="active"'; ?>>
								<a href="<?PHP echo _LINK_;?>noticia/">Noticias</a>
							</li>
		<!-- 					<li <?PHP if ($page == 'parceiro') echo 'class="active"'; ?>>
								<a href="<?PHP echo _LINK_;?>parceiro/">Parceiros</a>
							</li> -->
							<!-- <li <?PHP if ($page == 'config') echo 'class="active"'; ?>>
								<a href="<?PHP echo _LINK_;?>config/">Configurações</a>
							 --></li>							<li>
								<a href="<?PHP echo _LINK_;?>logoff/">Sair</a>
							</li>
						</ul>
						<p class="navbar-text pull-right">
							<i class="icon-user icon-white"></i> <a href="#">MarcusP</a>
						</p>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>