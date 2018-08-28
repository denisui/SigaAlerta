<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- view social media -->
	<meta property='og:title' content="Sigalerta" />
	<meta property='og:description' content='' />
	<meta property='og:url' content="" />
	<meta property='og:image' content="" />
	<meta property="og:image:width" content="800">
	<meta property="og:image:height" content="600">
	<meta property='og:type' content='website' />
	<meta property='og:site_name' content='Sigalerta' />

	<!-- Configurações para celular -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="GOOGLEBOT" content="index follow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!--title-->
	<title>Sigalerta .: Serviços | Agência de Seguros :.</title>

	<?php $this->load->view('public/include/styles.php'); ?>

	<!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="<?php echo base_url();  ?>assets/public/images/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/public/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
	<div id="main-wrapper" class="homepage">

		<?php $this->load->view('public/include/menu.php'); ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="widget" style="margin-bottom: 0;">
						<div class="add">
							<a href="#">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add2.jpg"
								 alt="" />
							</a>
						</div>
					</div>
					<!--/#widget-->
				</div>
			</div>
			<div class="page-breadcrumbs page-breadcrumbs-custom">
				<h1 class="section-title">Serviços</h1>
				<div class="world-nav cat-menu">
					<ul class="list-inline">
						<li class="active">
							<a href="#">Agência de Seguros</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="section  section-custom">
				<div class="row">
					<div class="col-sm-9">
						<div id="site-content" class="site-content">
							<div class="row">
								<?php 
                                if (empty($data)) :
                                ?>
								<h4 class="text-center">Nenhum serviço encontrado</h4>
								<?php
                                    else :
                                    $n = new ArrayIterator($data);
                                    while ($n->valid()):
                                ?>
								<!-- col-sm-4 -->
								<div class="col-sm-4" data-mh="group-name">
									<div class="post medium-post">
										<div class="entry-header">
											<div class="entry-thumbnail">
												<a href="<?php echo base_url(); ?>services/agency/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->serv_name); ?>">
													<img class="img-responsive h-150" src="<?php echo base_url(); ?>assets/public/images/services/<?php echo $n->current()->serv_img ?>" alt="" />
												</a>
											</div>
										</div>
										<div class="post-content">											
											<h2 class="entry-title">
												<a href="<?php echo base_url(); ?>services/agency/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->serv_name); ?>">
													<?php echo $n->current()->serv_name ?>
												</a>
											</h2>
										</div>
									</div>
									<!--/post-->
								</div>
								<!-- /.col-sm-4 -->
								<?php
                                $n->next();
                                endwhile;
                            endif;
                            ?>
							</div>
							<!--/.section -->
						</div>
						<!--/#site-content-->

						<div class="col-sm-12 gap-30">
							<div class="google-add">
								<div class="add inner-add text-center">
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/google-add.jpg"
										 alt="" />
									</a>
								</div>
								<!--/.section-->
							</div>
							<!--/.google-add-->
						</div>

						<div class="pagination-wrapper">
							<?php 
                                if (!empty($data)) {
                                    echo $pagination;
                                }
                            ?>
						</div>
					</div>
					<!--/.col-sm-9 -->

					<div class="col-md-3 col-sm-4">
						<div id="sitebar">
							<div class="widget follow-us">
								<h1 class="section-title title">Mídias Sociais</h1>
								<ul class="list-inline social-icons">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google-plus"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-linkedin"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-youtube"></i>
										</a>
									</li>
								</ul>
							</div>
							<!--/#widget-->

							<div class="widget">
								<div class="add">
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add3.jpg"
										 alt="" />
									</a>
								</div>
							</div>
							<!--/#widget-->

							<div class="widget">
								<h1 class="section-title title">Siga com Eduardo</h1>
								<ul class="post-list">
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/1.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">World</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/2.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Business</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/3.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Sports</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/4.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Technology</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/5.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Politics</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/6.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Health</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/7.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Lifestyle</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/rising/8.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Entertainment</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/7.jpg"
													 alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory">
													<a href="#">Business</a>
												</div>
												<h2 class="entry-title">
													<a href="service-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div>
										<!--/post-->
									</li>
								</ul>
							</div>
							<!--/#widget-->

							<div class="widget">
								<div class="add">
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add6.jpg" alt="" />
									</a>
								</div>
							</div>
							<!--/#widget-->

						</div>
						<!--/#sitebar-->
					</div>

				</div>
			</div>
			<!--/.section-->
		</div>
		<!--/.container-->
		<?php $this->load->view("public/include/pre-footer"); ?>
	</div>
	<!--/#main-wrapper-->

	<?php $this->load->view("public/include/footer"); ?>

	<!--/#scripts-->
	<?php $this->load->view('public/include/scripts'); ?>
</body>

</html>