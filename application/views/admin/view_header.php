<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Novaplan - Painel Administrativo</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/uploads/<?php echo $setting['favicon']; ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/summernote.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/bootstrap-toggle.min.css">
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.mobile-1.1.1.min.css">-->
	

	<style>
		.skin-blue .wrapper,
		.skin-blue .main-header .logo,
		.skin-blue .main-header .navbar,
		.skin-blue .main-sidebar,
		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
			background-color: #00a65a!important;
		}

		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
			border-color: #00a65a!important;
		}
		
		.content-header>h1,
		.content-header .content-header-left h1,
		h3 {
			color: #00a65a!important;
		}

		.box.box-info {
			border-top-color: #00a65a!important;
		}

		.nav-tabs-custom>.nav-tabs>li.active {
			border-top-color: #f4f4f4!important;
		}

		.skin-blue .sidebar a {
			color: #fff!important;
		}

		.skin-blue .sidebar-menu>li>.treeview-menu {
			margin: 0!important;
		}
		.skin-blue .sidebar-menu>li>a {
			border-left: 0!important;
		}

		.nav-tabs-custom>.nav-tabs>li {
			border-top-width: 1px!important;
		}

	</style>



</head>

<body class="hold-transition fixed skin-green sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="<?php echo base_url(); ?>admin/dashboard" class="logo hidden-xs" style="background-color: #f6f6f6">
				<span class="logo-lg"><img src="<?php echo base_url(); ?>public/uploads/<?php echo $setting['logo']; ?>" alt="Logo" width="100%"></span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Painel Administrativo</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo base_url(); ?>" target="_blank">Ver Website</a>
						</li>

						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if($this->session->userdata('photo') == ''): ?>
									<img src="<?php echo base_url(); ?>public/img/no-photo.jpg" class="user-image" alt="user photo">
								<?php else: ?>
									<img src="<?php echo base_url(); ?>public/uploads/<?php echo $this->session->userdata('photo'); ?>" class="user-image" alt="user photo">
								<?php endif; ?>
								
								<span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="<?php echo base_url(); ?>admin/profile" class="btn btn-default btn-flat">Editar Perfil</a>
									</div>
									<div>
										<a href="<?php echo base_url(); ?>admin/login/logout" class="btn btn-default btn-flat">Sair</a>
									</div>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>

			</nav>
		</header>

  		<?php
			$class_name = '';
		    $segment_2 = 0;
		    $segment_3 = 0;
		    $class_name = $this->router->fetch_class();
		    $segment_2 = $this->uri->segment('2');
		    $segment_3 = $this->uri->segment('3');
		?>

  		<aside class="main-sidebar">
    		<section class="sidebar">

     
      			<ul class="sidebar-menu">

			        <li class="treeview <?php if($class_name == 'dashboard') {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/dashboard">
			            <i class="fa fa-laptop"></i> <span>Dashboard</span>
			          </a>
			        </li>


					<?php if( $this->session->userdata('role') == 'Admin' ): ?>
			        <li class="treeview <?php if( ($class_name == 'setting') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/setting">
			            <i class="fa fa-cog"></i> <span>Configurações</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'page') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/page">
			            <i class="fa fa-file-text"></i> <span>Páginas</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'language') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/language">
			            <i class="fa fa-language"></i> <span>Linguagem</span>
			          </a>
			        </li>
			      
			        <li class="treeview <?php if( ($class_name == 'category') || ($class_name == 'news') || ($class_name == 'comment') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-newspaper-o"></i>
							<span>Notícia</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>admin/category"><i class="fa fa-circle-o"></i>Categoria</a></li>
							<li><a href="<?php echo base_url(); ?>admin/news"><i class="fa fa-circle-o"></i> Noticías</a></li>
							<li><a href="<?php echo base_url(); ?>admin/comment"><i class="fa fa-circle-o"></i> Comente</a></li>
						</ul>
					</li>

					<li class="treeview <?php if( ($class_name == 'event') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/event">
			            <i class="fa fa-calendar"></i> <span>Eventos</span>
			          </a>
			        </li>

					<li class="treeview <?php if( ($class_name == 'subscriber') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-comment"></i>
							<span>Assinantes</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>admin/subscriber"><i class="fa fa-circle-o"></i>Todos os Assinantes</a></li>
							<li><a href="<?php echo base_url(); ?>admin/subscriber/send_email"><i class="fa fa-circle-o"></i>Enviar E-mail</a></li>
							<li><a href="<?php echo base_url(); ?>admin/subscriber/sent"><i class="fa fa-circle-o"></i>E-mail Enviados</a></li>
							<li><a href="<?php echo base_url(); ?>admin/subscriber/received"><i class="fa fa-circle-o"></i>E-mail Recebidos</a></li>
						</ul>
					</li>

			        <li class="treeview <?php if( ($class_name == 'team_member') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/team_member">
			            <i class="fa fa-users"></i> <span>Menbros da Equipe</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'slider') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/slider">
			            <i class="fa fa-picture-o"></i> <span>Slider</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'testimonial') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/testimonial">
			            <i class="fa fa-user-plus"></i> <span>Depoimento</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'photo') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/photo">
			            <i class="fa fa-camera"></i> <span>Galeria de fotos</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'pricing_table') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/pricing_table">
			            <i class="fa fa-usd"></i> <span>Tabela de Preços</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'portfolio')||($class_name == 'portfolio_category') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-bars"></i>
							<span>Portfólio de Obras</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>admin/portfolio_category"><i class="fa fa-circle-o"></i> Categoria das Obras</a></li>
							<li><a href="<?php echo base_url(); ?>admin/portfolio"><i class="fa fa-circle-o"></i> Obras</a></li>
						</ul>
					</li>

			        <li class="treeview <?php if( ($class_name == 'client') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/client">
			            <i class="fa fa-clone"></i> <span>Cliente</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'service') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-life-ring"></i>
							<span>Produtos</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>admin/service"><i class="fa fa-circle-o"></i> Produtos</a></li>
							<li><a href="<?php echo base_url(); ?>admin/service/service_order"><i class="fa fa-circle-o"></i> Ordena Produtos</a></li>
						</ul>
					</li>
			        
			        <!--<li class="treeview <?php if( ($class_name == 'service') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/service">
			            <i class="fa fa-life-ring"></i> <span>Produtos</span>
			          </a>
			        </li>-->

			        <li class="treeview <?php if( ($class_name == 'feature') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/feature">
			            <i class="fa fa-cube"></i> <span>Característica</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'why_choose') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/why_choose">
			            <i class="fa fa-paper-plane-o"></i> <span>Por Que Nos Escolher</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'faq') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/faq">
			            <i class="fa fa-bolt"></i> <span>Perguntas frequentes</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'social_media') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/social_media">
			            <i class="fa fa-address-book"></i> <span>Mídia social</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($class_name == 'represented') ) {echo 'active';} ?>">
			          <a href="<?php echo base_url(); ?>admin/represented">
			            <i class="fa fa-handshake-o"></i> <span>Representadas</span>
			          </a>
			        </li>

			        <!--<li class="treeview <?php if( ($class_name == 'users')||($class_name == 'portfolio_category') ) {echo 'active';} ?>">
						<a href="#">
							<i class="fa fa-user-circle"></i>
							<span>Lista de Usuários</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>admin/profile_category"><i class="fa fa-circle-o"></i> Categoria</a></li>
							<li><a href="<?php echo base_url(); ?>admin/profile/users"><i class="fa fa-circle-o"></i> Usuários</a></li>
						</ul>
					</li>-->

					<li class="treeview <?php if( ($class_name == 'users')||($class_name == 'portfolio_category') ) {echo 'active';} ?>">
						<li><a href="<?php echo base_url(); ?>admin/profile/users"><i class="fa fa-user-circle"></i> Usuários</a></li>
					</li>

					<li class="treeview <?php if( ($class_name == 'users')||($class_name == 'portfolio_category') ) {echo 'active';} ?>">
						<li><a href="<?php echo base_url(); ?>admin/bkp"><i class="fa fa-cogs"></i> Backup BD</a></li>
					</li>


			        <?php endif; ?>        
      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper">
